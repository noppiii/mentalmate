<!DOCTYPE html>
<html>
<head>
    <title>Status Akun Psikolog</title>
</head>
<body>
@if(isset($psikolog) && $psikolog->status === 'verified')
    <h1>Selamat, Akun Anda Telah Diverifikasi!</h1>
    <p>Hai, {{ $psikolog->name }}!</p>
    <p>Akun Anda kini telah diverifikasi. Anda sekarang memiliki akses penuh ke semua fitur yang tersedia. Kami berharap
        Anda dapat memberikan kontribusi yang luar biasa di platform kami.</p>
    <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>
@elseif(isset($psikolog) && $psikolog->status === 'suspended')
    <h1>Akun Anda Ditangguhkan</h1>
    <p>Hai, {{ $psikolog->name }}!</p>
    <p>Kami ingin memberitahukan bahwa akun Anda telah ditangguhkan karena pelanggaran terhadap kebijakan kami. Anda
        tidak akan dapat mengakses fitur tertentu hingga masalah ini diselesaikan.</p>
    <p>Jika Anda merasa ini adalah kesalahan, silakan hubungi tim dukungan kami untuk informasi lebih lanjut.</p>
@endif

<p>Terima kasih atas kerjasama Anda.</p>
<p>Salam hangat,</p>
<p>Tim Kami</p>
</body>
</html>
