@extends('layout')
@include('includes/navbar')
@section('content')
    @php
        $publicaciones = app('App\Http\Controllers\UserController')->getPostFromUser(session('user')['id']);
        $total = 0;
        $seguidores = app('App\Http\Controllers\seguidoresController')->getAllSeguidores(session('user')['id']);
                   
    @endphp

    @foreach ($publicaciones as $publicacion)
        {{ $total = $total + 1 }}
    @endforeach

    <div class="container mt-4">
        <h2 class="text-center my-5 text-white fw-bold">Perfil de {{ session('user')['nombre'] }}</h2>
        <div style="padding: 15px" class="card text-bg-dark mb-2 border border-secondary">
            <div class="row my-2">
                <div class="col-6">
                    <h5>Nombre de Usuario: {{ session('user')['username'] }}</h5>
                </div>
                <div class="col-6">
                    <h5>Publicaciones creadas: {{ $total }}</h5>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <h5>Correo de usuario:{{ session('user')['email'] }}</h5>
                </div>
                <div class="col-6">
                    <h5>Seguidores: {{$seguidores}}</h5>
                </div>
            </div>
        </div>

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
                    <p class="fs-6 text-secondary d-inline fw-normal">{{ $publicacion['usuario']['nombre'] }}</p>
                   
                   
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
                            <i class="fi fi-rs-heart text-secondary fs-5 btn btn-dark w-100">{{ $publicacioneslikes }}</i>
                        </div>
                        <div class="col">
                            <i class="fi fi-rr-bookmark text-secondary fs-5 btn btn-dark w-100"></i>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Comentar</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
