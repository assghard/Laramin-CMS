<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky2 mt-5">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $dashboardTab ?? '' }}" href="{{ route('dashboard.index') }}">
                    <span class="oi oi-dashboard"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $usersTab ?? '' }}" href="{{-- route('dashboard.users.index') --}}">
                    <span class="oi oi-person"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $pagesTab ?? '' }}" href="{{-- route('dashboard.page.index') --}}">
                    <span class="oi oi-document"></span>
                    Pages
                </a>
            </li>
        </ul>
        <hr />
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $settingsTab ?? '' }}" href="{{-- route('dashboard.settings.index') --}}">
                    <span class="oi oi-wrench"></span>
                    System settings
                </a>
            </li>
            <li class="nav-item">
                @inject('SystemErrorEntity', '\Modules\Core\Entities\SystemErrorEntity')
                @php
                    $errorsCount = $SystemErrorEntity::count();
                @endphp
                <a class="nav-link {{ $errorsTab ?? '' }} {{ ($errorsCount > 0) ? 'text-danger' : '' }}"
                    href="{{-- route('dashboard.system-errors.index') --}}">
                    <span class="oi oi-warning"></span>
                    @if ($errorsCount > 0)
                        Błędy systemu ({{ $errorsCount }})
                    @else
                        Błędy systemu (0)
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="logout('{{ route('logout') }}')">
                    <span class="oi oi-account-logout"></span>
                    TODO: Logout
                </a>
            </li>
        </ul>
    </div>
</nav>