<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ URL::asset('client/assets/img/logos/'.get_setting('logo_app_name')) }}" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                @foreach (get_menu(2) as $menu)
                <li class="nav-item"><a class="nav-link" href="{{ $menu->url }}">{{ $menu->name }}</a>
                </li>
                @endforeach
                @if (Auth::check())
                <li class="nav-item"><a class="nav-link" href="/account/website">Trang cá nhân</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="/login">Đăng nhập</a></li>
                @endif
                <li class="nav-item">
                    <a class="nav-link">
                        @include('client.theme')
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>