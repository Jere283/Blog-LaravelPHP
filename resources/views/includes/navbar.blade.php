<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body shadow-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand  rounded-3 " href="#">
            <img src="../resources/views/Logo.png" width="200px"></href></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page"
                        href="http://localhost/futbolBlog/public/inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="http://localhost/futbolBlog/public/profile">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="#">Notificaciones</a>
                </li>
                <li class="nav-item dropdown border-start">
                    <a class="nav-link dropdown-toggle fw-bold " href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Mas Opciones
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item fw-bold" href="#"><i class="fi fi-rr-settings"></i>
                                Configuracion</a></li>
                        <li><a class="dropdown-item fw-bold" href="#"><i class="fi fi-rr-bookmark"></i>
                                Guardados</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item fw-bold" href="#"><i class="fi fi-rr-exit"></i> Cerrar
                                Sesion</a></li>
                    </ul>
                </li>
                <li class="nav-item">

                    <a class="nav-link active fw-bold" aria-current="page" href="#" style=""
                        data-bs-toggle="modal" data-bs-target="#crearPublicacion">Nuevo Post +</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2 fw-bold" type="search" placeholder="BUSCAR" aria-label="Search">
                <button class="btn btn-outline-info fw-bold" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
