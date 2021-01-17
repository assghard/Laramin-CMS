<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('dashboard.index') }}">{{ env('APP_NAME') }}</a>
    <ul class="navbar-nav list-inline px-3 d-block">
        <li class="nav-item text-nowrap list-inline-item" title="{{ Auth::user()->email }}">
            <a class="nav-link" href="{{-- route('dashboard.users.edit',Auth::user()->id) --}}"><span class="oi oi-person"></span> Profil</a>
        </li>
        <li class="nav-item text-nowrap list-inline-item">
            <a class="nav-link" href="{{ route('page.homepage') }}" target="_blank"><span class="oi oi-eye"></span> Zobacz stronę</a>
        </li>
        <li class="nav-item text-nowrap list-inline-item">
            <a class="nav-link" href="#" onclick="logout('{{ route('logout') }}')"><span class="oi oi-account-logout"></span> Wyloguj</a>
        </li>
    </ul>
</nav>