<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                        href="{{ route('dashboard') }}">Dashboard</a></li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">@yield('subtitle')</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <li class="nav-item d-flex align-items-center">
                    <a href="#" class="nav-link text-white font-weight-bold px-0">
                        <span class="d-sm-inline d-none">Kontak</span>
                    </a>
                </li>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <a href="#" class="nav-link text-white font-weight-bold px-0"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <span class="d-sm-inline d-none">Log Out</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
