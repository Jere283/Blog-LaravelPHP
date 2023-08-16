<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body shadow-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand  rounded-3 " href="{{ route('inicio') }}">
            <img src="../resources/views/Logo.png" width="200px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="{{ route('show.profile') }}">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="#" style=""
                        data-bs-toggle="modal" data-bs-target="#crearPublicacion">Nuevo Post +</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li><a class="nav-link active fw-bold" href="{{ route('logout.user') }}"><i class="fi fi-rr-exit"></i>
                        Cerrar
                        Sesion</a></li>
            </ul>
        </div>
    </div>
</nav>

@include('includes/modalPublicar')
