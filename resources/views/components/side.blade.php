<div class="d-flex flex-column flex-shrink-0 bg-white sidebar" style="width: 4.5rem;">
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center mt-5">
        <li class="nav-item">
            <a href="/home" class="nav-link side {{ Request::is('home') ? 'watr' : '' }} py-3 border-bottom" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                <i class="bi bi-house-door"></i>
            </a>
        </li>
        <li>
            <a href="/databarang" class="nav-link {{ Request::is('databarang') ? 'watr' : '' }} py-3 border-bottom" title="Data Barang" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Data Barang">
                <i class="bi bi-table"></i>
            </a>
        </li>
        <li>
            <a href="/klasifikasi" class="nav-link {{ Request::is('klasifikasi') ? 'watr' : '' }} py-3 border-bottom" title="Klasifikasi" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Klasifikasi">
                <i class="bi bi-grid"></i>
            </a>
        </li>
        <li>
            <a href="/profil" class="nav-link {{ Request::is('profil') ? 'watr' : '' }} py-3 border-bottom" title="Profil" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Profil">
                <i class="bi bi-person-fill"></i>
            </a>
        </li>
        <li class="logouticon">
            <a href="{{route('actionlogout')}}" class="nav-link py-3 border-bottom" title="Logout" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Logout">
                <i class="bi bi-box-arrow-left"></i>
            </a>
        </li>
    </ul>
</div>
