<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ $homepageLink ?? '' }}">
                    <a class="nav-link" href="{{ env('APP_URL') }}">Homepage <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ $subpageLink ?? '' }}">
                    <a class="nav-link" href="{{ route('page.subpage', 'subpage') }}">Subpage</a>
                </li>
                <li class="nav-item {{ $contactLink ?? '' }}">
                    <a class="nav-link" href="{{ route('page.contact') }}">Contact</a>
                </li>
                <li class="nav-item {{ $link1 ?? '' }}">
                    <a class="nav-link" href="">Link 1</a>
                </li>

                <li class="nav-item dropdown {{ $link12 ?? '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Link 1</a>
                        <a class="dropdown-item" href="">Link 2</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>