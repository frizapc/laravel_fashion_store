<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <span class="fs-4">Simple header</span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ url('/fashions') }}" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        @if(!Auth::check())
        <li class="nav-item"><a href="{{ url('/auth/login') }}" class="btn btn-outline-primary">Login</a></li>
        @else
        <li class="nav-item"><a href="{{ url('/auth/logout') }}" class="btn btn-outline-danger">Logout</a></li>
        @endif
    </ul>
</header>
