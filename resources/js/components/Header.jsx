import React from 'react';

const Header = ({ isAuthenticated }) => {
    return (
        <header>
            <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
                <div className="container-fluid">
                    <a href="/" className="navbar-brand ms-4 me-3">
            <span className="text-secondary fw-bold">
              <i className="bi bi-film"></i>
              Film review
            </span>
                    </a>
                    <div className="col collapse navbar-collapse ms-5" id="main-nav">
                        {/*<ul className="col navbar-nav justify-content-start">*/}
                        {/*    {['Action', 'Comedy', 'Romance', 'Horror'].map((genre) => (*/}
                        {/*        <li className="nav-item me-3" key={genre}>*/}
                        {/*            <a className="btn btn-primary btn-md" href="#">{genre}</a>*/}
                        {/*        </li>*/}
                        {/*    ))}*/}
                        {/*</ul>*/}
                        <ul className="navbar-nav justify-content-end align-center me-5">
                            {isAuthenticated ? (
                                <li className="nav-item me-3">
                                    <a className="btn btn-primary btn-md" href="/logout">Log out</a>
                                </li>
                            ) : (
                                <>
                                    <li className="nav-item me-3">
                                        <a className="btn btn-primary btn-md" href="/login">Sign in</a>
                                    </li>
                                    <li className="nav-item me-3">
                                        <a className="btn btn-primary btn-md" href="/register">Sign up</a>
                                    </li>
                                </>
                            )}
                            <li className="nav-item">
                                <a className="nav-link bg-white rounded-circle" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style={{height: '40px', width: '40px'}}>
                  <span className="text-secondary fw-bold align-center ps-1">
                    <i className="bi bi-search"></i>
                  </span>
                                </a>
                            </li>
                            <li className="nav-item">
                                <a className="nav-link active" href="#offcanvasExample">Search</a>
                            </li>
                        </ul>
                    </div>
                    <button className="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            <div className="offcanvas offcanvas-top" tabIndex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div className="offcanvas-header">
                    <button type="button" className="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div className="offcanvas-body">
                    <div className="input-group">
                        <div className="form-outline" data-mdb-input-init>
                            <input id="search-focus" type="search" className="form-control" placeholder="Search" />
                        </div>
                        <button type="button" className="btn btn-primary" data-mdb-ripple-init>
                            <i className="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>
    );
};

export default Header;
