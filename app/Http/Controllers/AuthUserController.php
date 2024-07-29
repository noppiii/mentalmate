<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use App\Models\PsikologModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AuthUserController extends Controller
{

    public function showSigninForm()
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        // Validasi input
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ];
        $customMessages = [
            'email.required' => 'Email harus diisi!!!',
            'email.email' => 'Email tidak sesuai format!!!',
            'password.required' => 'Password harus diisi!!!',
        ];
        $this->validate($request, $rules, $customMessages);

        // Mengambil kredensial input
        $credentials = $request->only('email', 'password');
        $guards = ['mahasiswa', 'psikolog', 'admin'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->attempt($credentials)) {
                $user = Auth::guard($guard)->user();

                if ($user->status === 'pending') {
                    Auth::guard($guard)->logout();
                    return redirect()->back()->with('error_message', 'Data anda belum terverifikasi.');
                }

                if ($user->status === 'suspend') {
                    Auth::guard($guard)->logout();
                    return redirect()->back()->with('error_message', 'Maaf data anda terblokir.');
                }

                Session::flash('success_message', 'Berhasil Masuk');

                switch ($guard) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'mahasiswa':
                        return redirect()->route('mahasiswa.dashboard');
                    case 'psikolog':
                        return redirect()->route('psikolog.dashboard');
                    default:
                        Session::flash('error_message', 'Anda tidak memiliki akses.');
                        return redirect()->back();
                }
            }
        }

        return redirect()->back()->with("error_message", "Email atau Password tidak sesuai. Silahkan masukan data dengan benar!!!!!");
    }


    public function showMahasiswaSignupForm(){
        return view('auth.mahasiswa-register');
    }

    public function mahasiswaSignup(Request $request)
    {
        $data = $request->all();

        // Define validation rules and custom messages
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nama_universitas' => 'required',
            'fakultas' => 'required',
            'program_studi' => 'required',
            'nomor_induk_mahasiswa' => 'required|numeric',
            'tahun_masuk' => 'required|numeric',
            'semester' => 'required|numeric',
            'dokumen_ktm' => 'required|mimes:pdf',
            'dokumen_transkip_nilai' => 'required|mimes:pdf',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $customMessages = [
            'email.required' => 'Email harus diisi!!!',
            'email.email' => 'Email tidak sesuai format!!!',
            'password.required' => 'Password harus diisi!!!',
            'nama.required' => 'Nama harus diisi!!!',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi!!!',
            'tempat_lahir.required' => 'Tempat lahir harus diisi!!!',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi!!!',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid!!!',
            'nama_universitas.required' => 'Nama universitas harus diisi!!!',
            'fakultas.required' => 'Fakultas harus diisi!!!',
            'program_studi.required' => 'Program studi harus diisi!!!',
            'nomor_induk_mahasiswa.required' => 'Nomor induk mahasiswa harus diisi!!!',
            'nomor_induk_mahasiswa.numeric' => 'Nomor induk mahasiswa harus berupa angka!!!',
            'tahun_masuk.required' => 'Tahun masuk harus diisi!!!',
            'tahun_masuk.numeric' => 'Tahun masuk harus berupa angka!!!',
            'semester.required' => 'Semester harus diisi!!!',
            'semester.numeric' => 'Semester harus berupa angka!!!',
            'dokumen_ktm.required' => 'Dokumen KTM harus diunggah!!!',
            'dokumen_ktm.mimes' => 'Dokumen KTM harus berupa file PDF!!!',
            'dokumen_transkip_nilai.required' => 'Dokumen transkip nilai harus diunggah!!!',
            'dokumen_transkip_nilai.mimes' => 'Dokumen transkip nilai harus berupa file PDF!!!',
            'profile_photo_path.image' => 'Foto profil harus berupa gambar!!!',
            'profile_photo_path.mimes' => 'Foto profil harus berupa file JPEG, PNG, JPG, atau GIF!!!',
            'profile_photo_path.max' => 'Foto profil tidak boleh lebih dari 2MB!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $mahasiswa = new MahasiswaModel();
            $mahasiswa->fill([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nama' => $data['nama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'nama_universitas' => $data['nama_universitas'],
                'program_studi' => $data['program_studi'],
                'fakultas' => $data['fakultas'],
                'nomor_induk_mahasiswa' => $data['nomor_induk_mahasiswa'],
                'tahun_masuk' => $data['tahun_masuk'],
                'semester' => $data['semester'],
                'status' => 'pending',
            ]);

            // Handle profile photo upload
            if ($request->hasFile('profile_photo_path')) {
                $mahasiswa->profile_photo_path = $this->uploadFile($request->file('profile_photo_path'), 'store/user/photo/mahasiswa');
            }

            // Handle dokumen_ktm upload
            if ($request->hasFile('dokumen_ktm')) {
                $mahasiswa->dokumen_ktm = $this->uploadFile($request->file('dokumen_ktm'), 'mahasiswa/profile/berkas/ktm');
            }

            // Handle dokumen_transkip_nilai upload
            if ($request->hasFile('dokumen_transkip_nilai')) {
                $mahasiswa->dokumen_transkip_nilai = $this->uploadFile($request->file('dokumen_transkip_nilai'), 'mahasiswa/profile/berkas/transkip');
            }

            $mahasiswa->save();

            Session::flash('success_message', 'Data anda berhasil terkirim. Admin akan memverifikasi data anda');
            return redirect()->route('home');
        } catch (QueryException $e) {
            $errorMessage = 'Upsss terjadi kesalahan. Cek data yang anda masukan dan isi kembali!!!!';
            return redirect()->back()->withInput()->withErrors([$errorMessage]);
        }
    }

    
    public function showPsikologSignupForm(){
        return view('auth.psikolog-register');
    }

    public function psikologSignup(Request $request)
    {
        $data = $request->all();

        // Define validation rules and custom messages
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'asal_universitas' => 'required',
            'program_studi' => 'required',
            'no_str' => 'required|numeric',
            'tahun_lulus' => 'required|numeric',
            'tempat_praktik' => 'required',
            'dokumen_cv' => 'required|mimes:pdf',
            'dokumen_ijazah' => 'required|mimes:pdf',
            'dokumen_str_aktif' => 'required|mimes:pdf',
            'dokumen_izin_praktik' => 'required|mimes:pdf',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $customMessages = [
            'email.required' => 'Email harus diisi!!!',
            'email.email' => 'Email tidak sesuai format!!!',
            'password.required' => 'Password harus diisi!!!',
            'nama.required' => 'Nama harus diisi!!!',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi!!!',
            'tempat_lahir.required' => 'Tempat lahir harus diisi!!!',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi!!!',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid!!!',
            'asal_universitas.required' => 'Asal universitas harus diisi!!!',
            'program_studi.required' => 'Program studi harus diisi!!!',
            'no_str.required' => 'Nomor STR harus diisi!!!',
            'no_str.numeric' => 'Nomor STR harus berupa angka!!!',
            'tahun_lulus.required' => 'Tahun lulus harus diisi!!!',
            'tahun_lulus.numeric' => 'Tahun lulus harus berupa angka!!!',
            'tempat_praktik.required' => 'Tempat praktik harus diisi!!!',
            'dokumen_cv.required' => 'Dokumen CV harus diunggah!!!',
            'dokumen_cv.mimes' => 'Dokumen CV harus berupa file PDF!!!',
            'dokumen_ijazah.required' => 'Dokumen ijazah harus diunggah!!!',
            'dokumen_ijazah.mimes' => 'Dokumen ijazah harus berupa file PDF!!!',
            'dokumen_str_aktif.required' => 'Dokumen STR aktif harus diunggah!!!',
            'dokumen_str_aktif.mimes' => 'Dokumen STR aktif harus berupa file PDF!!!',
            'dokumen_izin_praktik.required' => 'Dokumen izin praktik harus diunggah!!!',
            'dokumen_izin_praktik.mimes' => 'Dokumen izin praktik harus berupa file PDF!!!',
            'profile_photo_path.image' => 'Foto profil harus berupa gambar!!!',
            'profile_photo_path.mimes' => 'Foto profil harus berupa file JPEG, PNG, JPG, atau GIF!!!',
            'profile_photo_path.max' => 'Foto profil tidak boleh lebih dari 2MB!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $psikolog = new PsikologModel();
            $psikolog->fill([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nama' => $data['nama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'asal_universitas' => $data['asal_universitas'],
                'program_studi' => $data['program_studi'],
                'no_str' => $data['no_str'],
                'tahun_lulus' => $data['tahun_lulus'],
                'tempat_praktik' => $data['tempat_praktik'],
                'status' => 'pending',
            ]);

            // Handle profile photo upload
            if ($request->hasFile('profile_photo_path')) {
                $img_tmp = $request->file('profile_photo_path');
                if ($img_tmp->isValid()) {
                    // get image extension
                    $extension = $img_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = uniqid() . '_' . rand(111, 99999) . '.' . $extension;
                    $imagePath = 'store/user/photo/psikolog' . $imageName;
                    // upload image
                    Image::make($img_tmp)->save(public_path($imagePath));
                }
            }
            if (isset($imageName)) {
                $psikolog->profile_photo_path = $imageName;
            }

            // Handle dokumen_cv upload
            if ($request->hasFile('dokumen_cv')) {
                $psikolog->dokumen_cv = $this->uploadFile($request->file('dokumen_cv'), 'psikolog/profile/berkas/cv');
            }

            // Handle dokumen_ijazah upload
            if ($request->hasFile('dokumen_ijazah')) {
                $psikolog->dokumen_ijazah = $this->uploadFile($request->file('dokumen_ijazah'), 'psikolog/profile/berkas/ijazah');
            }

            // Handle dokumen_str_aktif upload
            if ($request->hasFile('dokumen_str_aktif')) {
                $psikolog->dokumen_str_aktif = $this->uploadFile($request->file('dokumen_str_aktif'), 'psikolog/profile/berkas/str');
            }

            // Handle dokumen_izin_praktik upload
            if ($request->hasFile('dokumen_izin_praktik')) {
                $psikolog->dokumen_izin_praktik = $this->uploadFile($request->file('dokumen_izin_praktik'), 'psikolog/profile/berkas/izin_praktik');
            }

            $psikolog->save();

            Session::flash('success_message', 'Terimakasih telah mendaftar kami akan memvalidasi berkas anda');
            return redirect()->route('home');
        } catch (QueryException $e) {
            $errorMessage = 'Upsss terjadi kesalahan. Cek data yang anda masukan dan isi kembali!!!!';
            return redirect()->back()->withInput()->withErrors([$errorMessage]);
        }
    }

public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flash('success_message', 'Berhasil Logout');
        return redirect()->route('home');
    }

    private function uploadFile($file, $path)
    {
        if ($file->isValid()) {
            // Generate unique file name
            $fileName = time() . '_' . rand(111, 99999) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs($path, $fileName, 'public');
            return $filePath;
        }
        return null;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}