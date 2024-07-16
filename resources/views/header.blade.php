<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <div class="container-fluid">
            <a href="/" class="navbar-brand ms-4 me-3">
                <span class="text-secondary fw-bold">
                    <i class="bi bi-film"></i>
                    Film review
                </span>
            </a>

            <div class="col collapse navbar-collapse ms-5" id="main-nav">
                <ul class="col navbar-nav justify-content-start">
                    <li class="nav-item me-3">
                        <a class="btn btn-primary btn-md" href="#">Action</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="btn btn-primary btn-md" href="#">Comedy</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="btn btn-primary btn-md" href="#">Romance</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="btn btn-primary btn-md" href="#">Horror</a>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end align-center me-5">
                @auth
                    <li class="nav-item me-3">
                        <a class="btn btn-primary btn-md" href="/logout">Log out</a>
                    </li>
                @else
                    <li class="nav-item me-3">
                        <a class="btn btn-primary btn-md" href="/login">Sign in</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="btn btn-primary btn-md" href="/register">Sign up</a>
                    </li>
                @endauth
                    <li class="nav-item">
                        <a class="nav-link bg-white rounded-circle" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="height: 40px; width: 40px">
                            <span class="text-secondary fw-bold align-center ps-1">
                                <i class="bi bi-search"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#offcanvasExample">Search</a>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="input-group">
                <div class="form-outline" data-mdb-input-init>
                    <input id="search-focus" type="search" class="form-control" placeholder="Search" />
                </div>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</header>
