<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Futbolitos</title>
    <style>
        .p-3 {
            padding: 0rem !important;
        }
    </style>
    <link rel="shortcut icon" href="favicon_io (1)/favicon-16x16.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  </head>

<body class="bg-dark">
    <!-- La nav bar esta ahora dentro de includes/navbar asi cualquier modificacion que hagas se hara en todos los que tengan navbar-->
    @include('includes/navbar')
    <div class="container mt-4">
        <h1 style="color: #0dcaf0 !important" class="text-white fw-bold">
            Bienvenido {{ session('user')['username'] }}
        </h1>
        @php
            $publicaciones = app('App\Http\Controllers\postController')->getAllPublicaciones();
        @endphp
        @foreach ($publicaciones as $publicacion)
            @php
                // Obtener todas las publicaciones desde el controlador
                $publicacioneslikes = app('App\Http\Controllers\likesController')->getAllLikes($publicacion['id']);
            @endphp
            <h2 class="text-white fw-bold">{{ $publicacion['titulo'] }}</h2>
            <!-- Otros campos de la publicación -->
            <div class="card text-bg-dark mb-2 border border-secondary">
                <div class="card-body">
                    <img src="https://pbs.twimg.com/profile_images/1486761402853380113/3ifAqala_400x400.jpg"
                        class="img rounded-circle pb-2" alt="..." width="35px">
                    <p class="card-title d-inline fw-bold fs-5">
                        {{ $publicacion['usuario']['nombre'] }}
                    <p class="fs-6 text-secondary d-inline fw-normal">{{ $publicacion['usuario']['username'] }}</p>
                    <p class="text-secondary d-inline fs-6 fw-normal"></p>
                    <form class="text-secondary d-inline fs-6 fw-normal" method="POST" action="{{ route('seguir.usuario', ['seguidorId' => session('user')['id'], 'seguidoId' => $publicacion['usuario']['id']]) }}" >
                      @csrf
            <button  type="submit"  class="btn btn-dark"><span class="material-symbols-outlined">close_fullscreen
  </span></button>
          </form>
  
          <form class="text-secondary d-inline fs-6 fw-normal" method="post" action="{{ route('quitar.follow', ['seguidorId' => session('user')['id'], 'seguidoId' => $publicacion['usuario']['id']]) }}" >
            @csrf
            @method('DELETE')
  <button  type="submit"  class="btn btn-dark"><span class="material-symbols-outlined">
    swap_horiz
    </span></button>
  </form>
                    
                      
              
                    <div class="dropdown d-inline position-absolute top-0 end-0">
                        <button class="btn btn-dark d-inline" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fi fi-br-menu-burger text-secondary"></i>
                        </button>
                        <ul class="dropdown-menu text-bg-dark shadow p-3 mb-5 rounded">
                            <li><a class="btn btn-dark" href="#">Eliminar</a></li>
                            <li><a class="btn btn-dark" href="#">Compartir</a></li>
                            <li><a class="btn btn-dark" href="#">Seguir</a></li>
                        </ul>
                    </div>
                    </p>
                    <h5 class="card-title">
                        <span class="badge text-bg-info"><i class="fi fi-br-check"></i> FC Barcelona</span>
                        <span class="badge text-bg-info"><i class="fi fi-br-check"></i> La Liga</span>
                    </h5>
                    <p class="card-text">{{ $publicacion['contenido'] }}</p>
                </div>
                <div>
                    <center><img src="https://pbs.twimg.com/media/F3CU4GzWEAAX_oT?format=jpg&name=small"
                            class="border border-secondary rounded-3 m-3 start-50" alt="..." width="30%">
                    </center>
                </div>
                <div class="container text-center border-top border-secondary">
                    <div class="row align-items-start">
                        <div class="col">
                            <i class="fi fi-rr-comment text-secondary fs-5 comentar btn btn-dark w-100"
                                data-bs-toggle="modal" data-bs-target="#modal{{ $loop->iteration }}"></i>
                        </div>
                        <div class="col">
                            <i class="fi fi-rs-arrows-retweet text-secondary fs-5 btn btn-dark w-100"></i>
                        </div>
                        <div class="col">

                            <form method="post"
                                action="{{ route('dar.like', ['idpublicacion' => $publicacion['id'], 'idusuario' => session('user')['id']]) }}">
                                @csrf
                                <button
                                    style="background-color: transparent; border: none; padding: 0; cursor: pointer;"
                                    type="submit"><i
                                        class="fi fi-rs-heart text-secondary fs-5 btn btn-dark w-100">{{ $publicacioneslikes }}
                                    </i></button>
                            </form>

                        </div>
                        <div class="col">
                            <form method="post"
                                action="{{ route('dar.Unlike', ['idpublicacion' => $publicacion['id'], 'idusuario' => session('user')['id']]) }}">
                                @csrf
                                @method('DELETE')
                                <button
                                    style="background-color: transparent; border: none; padding: 0; cursor: pointer;"
                                    type="submit"><i
                                        class="fi fi-rr-bookmark text-secondary fs-5 btn btn-dark w-100"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal  comentarios-->
            <div class="modal fade modal-lg" id="modal{{ $loop->iteration }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-bg-dark" data-bs-theme="dark">
                        <div class="modal-header" data-bs-theme="dark">
                            <div>
                                <p class="card-title d-inline fw-bold fs-5">
                                    Comentarios
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- generar comnetarios -->
                            @php
                                $comentarios = app('App\Http\Controllers\comentarioController')->comentarioPublicacion($publicacion['id']);
                            @endphp
                            @if ($comentarios === null || count($comentarios) === 0)
                                <h2>No hay comentarios</h2>
                            @else
                                @foreach ($comentarios as $comentario)
                                    <div class="card text-bg-dark mb-2 border border-secondary">
                                        <div class="card-body">
                                            <img src="https://pbs.twimg.com/profile_images/1486761402853380113/3ifAqala_400x400.jpg"
                                                class="img rounded-circle pb-2" alt="..." width="35px">
                                            <p class="card-title d-inline fw-bold fs-5">
                                                {{ $comentario['usuario']['nombre'] }}
                                            <p class="fs-6 text-secondary d-inline fw-normal"></p>
                                            <p class="text-secondary d-inline fs-6 fw-normal">- 4h</p>
                                            <button type="button" class="btn btn-dark"><i
                                                    class="fi fi-rr-star fs-6"></i></button>
                                            <div class="dropdown d-inline position-absolute top-0 end-0">

                                            </div>
                                            </p>
                                            </h5>
                                            <h5>{{ $comentario['contenido'] }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <form method="POST"
                                action="{{ route('comentarios.agregar', ['idpublicacion' => $publicacion['id']]) }}">
                                @csrf


                                <label for="message-text" class="col-form-label">Comentario</label>
                                <input class="form-control" id="contenidoComentario" name="contenidoComentario"
                                    aria-describedby="emailHelp">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Comentar</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        @endforeach


    </div>



    <!--Modal agregar comentarios-->
    <!--  -->



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>

</html>
