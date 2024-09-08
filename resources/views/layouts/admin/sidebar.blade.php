@php
    $guard = null;
    if (Auth::guard('admin')->check()) {
        $guard = 'admin';
    } elseif (Auth::guard('psikolog')->check()) {
        $guard = 'psikolog';
    } elseif (Auth::guard('mahasiswa')->check()) {
        $guard = 'mahasiswa';
    }
@endphp
@if ($guard === 'admin')
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0"
                />
                <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                    fill="#161616"
                />
                <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                    fill="#161616"
                />
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0"
                />
              </svg>
            </span>
                <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{ request()->is('admin/dashboard*') ? 'open active' : '' }}">
                <a href="{{route('admin.dashboard')}}" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                    <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                        <a href="index.html" class="menu-link">
                            <div data-i18n="Analytics">Analytics</div>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master User</span>
            </li>
            <li class="menu-item {{ request()->is('admin/admin*') ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-user-exclamation"></i>
                    <div data-i18n="Admin">Admin</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/psikolog*') && !request()->is('admin/psikolog-favorit*') ? 'active' : '' }}">
                <a href="{{ route('psikolog.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-user-plus"></i>
                    <div data-i18n="Psikolog">Psikolog</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/mahasiswa*') ? 'active' : '' }}">
                <a href="{{ route('mahasiswa.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Mahasiswa">Mahasiswa</div>
                </a>
            </li>

            <!-- Components -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Artikel</span>
            </li>
            <!-- Cards -->
            <li class="menu-item {{ request()->is('admin/artikel*') ? 'active' : '' }}">
                <a href="{{ route('artikel.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-news"></i>
                    <div data-i18n="Artikel">Artikel</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/kategori-artikel*') ? 'active' : '' }}">
                <a href="{{ route('kategori-artikel.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-category"></i>
                    <div data-i18n="Kategori Artikel">Kategori Artikel</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/tag-artikel*') ? 'active' : '' }}">
                <a href="{{ route('tag-artikel.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-tag"></i>
                    <div data-i18n="Tag Artikel">Tag Artikel</div>
                </a>
            </li>

            <!-- Components -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Psikolog</span>
            </li>
            <!-- Cards -->
            <li class="menu-item {{ request()->is('admin/bidang-psikolog*') ? 'active' : '' }}">
                <a href="{{ route('bidang-psikolog.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-shield"></i>
                    <div data-i18n="Bidang Psikolog">Bidang Psikolog</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/psikolog-favorit*') ? 'active' : '' }}">
                <a href="{{ route('psikolog-favorit.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-heart"></i>
                    <div data-i18n="Psikolog Favorit">Psikolog Favorit</div>
                </a>
            </li>

            <!-- Components -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Konsultasi</span>
            </li>
            <!-- Cards -->
            <li class="menu-item {{ request()->is('admin/konsultasi*') ? 'active' : '' }}">
                <a href="{{ route('konsultasi.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-category-2"></i>
                    <div data-i18n="Konsultasi">Konsultasi</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/metode-konsultasi*') ? 'active' : '' }}">
                <a href="{{route('metode-konsultasi.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-checkup-list"></i>
                    <div data-i18n="Metode Konsultasi">Metode Konsultasi</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="app-calendar.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-medical-cross"></i>
                    <div data-i18n="Meditasi">Meditasi</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/test-kesehatan-mental*') ? 'active' : '' }}">
                <a href="{{route('test-kesehatan-mental.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-medicine-syrup"></i>
                    <div data-i18n="Tes Kesehatan Mental">Tes Kesehatan Mental</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="app-calendar.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-history"></i>
                    <div data-i18n="Riwayat Konsultasi">Riwayat Konsultasi</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="app-calendar.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-history-toggle"></i>
                    <div data-i18n="Riwayat Sesi Konsultasi">Riwayat Sesi Konsultasi</div>
                </a>
            </li>

            <!-- Components -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Transaksi</span>
            </li>
            <!-- Cards -->
            <li class="menu-item {{ request()->is('admin/transaksi*') ? 'active' : '' }}">
                <a href="{{route('transaksi.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-credit-card"></i>
                    <div data-i18n="Transaksi">Transaksi</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/ulasan*') ? 'active' : '' }}">
                <a href="{{route('ulasan.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-message"></i>
                    <div data-i18n="Ulasan">Ulasan</div>
                </a>
            </li>

            <!-- Components -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Setting</span>
            </li>
            <!-- Cards -->
            <li class="menu-item">
                <a href="{{route('banner.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-shape"></i>
                    <div data-i18n="Banner">Banner</div>
                </a>
            </li>
        </ul>
    </aside>
@elseif ($guard === 'psikolog')
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0"
                />
                <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                    fill="#161616"
                />
                <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                    fill="#161616"
                />
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0"
                />
              </svg>
            </span>
                <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{ request()->is('psikolog/dashboard*') ? 'active' : '' }}">
                <a href="{{ route('psikolog.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>

            <!-- Cards -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Artikel</span>
            </li>
            <li class="menu-item {{ request()->is('psikolog/my-artikel*') ? 'active' : '' }}">
                <a href="{{ route('my-artikel.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-news"></i>
                    <div data-i18n="Artikel">Artikel</div>
                </a>
            </li>
            <!-- Cards -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Konsultasi</span>
            </li>
            <li class="menu-item {{ request()->is('psikolog/my-jadwal*') ? 'active' : '' }}">
                <a href="{{ route('my-jadwal.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-calendar-event"></i>
                    <div data-i18n="Jadwal">Jadwal</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('psikolog/my-konsultasi*') ? 'active' : '' }}">
                <a
                    @foreach($allMahasiswa  as $mahasiswa)
                        href="{{ route('psikolog.konsultasi.index', ['receiverId' => $mahasiswa->id, 'receiverType' => 'MahasiswaModel']) }}"
                    @endforeach
                    class="menu-link">
                    <i class="menu-icon tf-icons ti ti-messages"></i>
                    <div data-i18n="Konsultasi">Konsultasi</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('psikolog/my-meeting*') ? 'active' : '' }}">
                <a href="{{ route('my-meeting.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-camera"></i>
                    <div data-i18n="Meeting">Meeting</div>
                </a>
            </li>
        </ul>
    </aside>
@elseif ($guard === 'mahasiswa')
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0"
                />
                <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                    fill="#161616"
                />
                <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                    fill="#161616"
                />
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0"
                />
              </svg>
            </span>
                <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{ request()->is('mahasiswa/dashboard*') ? 'active' : '' }}">
                <a href="{{ route('mahasiswa.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>

            <!-- Cards -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Konsultasi</span>
            </li>
            <li class="menu-item {{ request()->is('mahasiswa/konsultasi-ku*') ? 'active' : '' }}">
                <a
                    @foreach($allPsikolog as $psikolog)
                        href="{{ route('mahasiswa.konsultasi.index', ['receiverId' => $psikolog->id, 'receiverType' => 'PsikologModel']) }}"
                    @endforeach
                    class="menu-link">
                    <i class="menu-icon tf-icons ti ti-messages"></i>
                    <div data-i18n="Konsultasi">Konsultasi</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('mahasiswa/tes-kesehatan-mental*') ? 'active' : '' }}">
                <a href="{{ route('mahasiswa.test-kesehatan-mental') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-subtask"></i>
                    <div data-i18n="Tes Mental">Tes Mental</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('mahasiswa/meeting*') ? 'active' : '' }}">
                <a href="{{ route('mahasiswa.listMeeting') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-camera"></i>
                    <div data-i18n="Meeting">Meeting</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('mahasiswa/transaksi*') ? 'active' : '' }}">
                <a href="{{ route('mahasiswa.listTransaksi') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-credit-card"></i>
                    <div data-i18n="Transaksi">Transaksi</div>
                </a>
            </li>
        </ul>
    </aside>
@endif
