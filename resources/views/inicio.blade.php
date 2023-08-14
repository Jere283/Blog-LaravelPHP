<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Futbolitos</title>
    <style>


.p-3 {
    padding: 0rem!important;
}
    </style>
    <link rel="shortcut icon" href="favicon_io (1)/favicon-16x16.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
</head>
    <body class="bg-dark">
        <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body shadow-lg" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand  rounded-3 " href="#">
                <img src="Logo.png" width="200px"></href></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="#">INICIO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active fw-bold" href="#">PERFIL</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active fw-bold" href="#" >NOTIFICACIONES</a>
                  </li>
                  <li class="nav-item dropdown border-start">
                    <a class="nav-link dropdown-toggle fw-bold " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      MAS OPCIONES
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item fw-bold" href="#"><i class="fi fi-rr-settings"></i> CONFIGURACIÓN</a></li>
                      <li><a class="dropdown-item fw-bold" href="#"><i class="fi fi-rr-bookmark"></i> GUARDADOS</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item fw-bold" href="#"><i class="fi fi-rr-exit"></i> CERRAR SESIÓN</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">

                    <a class="nav-link active fw-bold" aria-current="page" href="#" style="" data-bs-toggle="modal" data-bs-target="#crearPublicacion">+</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2 fw-bold" type="search" placeholder="BUSCAR" aria-label="Search">
                  <button class="btn btn-outline-info fw-bold" type="submit">BUSCAR</button>
                </form>
              </div>
            </div>
        </nav>

        <div class="container mt-4">
            <h1 class="text-white fw-bold">
                INICIO
            </h1>
            @php
            $publicaciones = app('App\Http\Controllers\postController')->getAllPublicaciones();
        @endphp 
            @foreach ($publicaciones as $publicacion)
          @php
          // Obtener todas las publicaciones desde el controlador
          $publicacioneslikes= app('App\Http\Controllers\likesController')->getAllLikes( $publicacion['id']);
      @endphp
            <h2>{{ $publicacion['titulo'] }}</h2>
            <!-- Otros campos de la publicación -->
            <div class="card text-bg-dark mb-2 border border-secondary">
              <div class="card-body">
                <img src="https://pbs.twimg.com/profile_images/1486761402853380113/3ifAqala_400x400.jpg" class="img rounded-circle pb-2" alt="..." width="35px">
                <p class="card-title d-inline fw-bold fs-5">  
                  {{ $publicacion['usuario']['nombre'] }}
                  <p class="fs-6 text-secondary d-inline fw-normal">{{ $publicacion['usuario']['nombre'] }}</p>
                  <p class="text-secondary d-inline fs-6 fw-normal">- 4h</p>
                  <button type="button" class="btn btn-dark"><i class="fi fi-rr-star fs-6"></i></button>
                  <div class="dropdown d-inline position-absolute top-0 end-0">
                    <button class="btn btn-dark d-inline" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                  <span class="badge text-bg-info" ><i class="fi fi-br-check"></i> FC Barcelona</span>
                  <span class="badge text-bg-info"><i class="fi fi-br-check"></i> La Liga</span>
                </h5>
                <p class="card-text">{{ $publicacion['contenido'] }}</p>
              </div>
              <div>
                  <center><img src="https://pbs.twimg.com/media/F3CU4GzWEAAX_oT?format=jpg&name=small" class="border border-secondary rounded-3 m-3 start-50"  alt="..." width="30%"></center>
              </div>
              <div class="container text-center border-top border-secondary">
                  <div class="row align-items-start">
                    <div class="col">
                      <i class="fi fi-rr-comment text-secondary fs-5 comentar btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#modal{{ $loop->iteration }}"></i>
                    </div>
                    <div class="col">
                      <i class="fi fi-rs-arrows-retweet text-secondary fs-5 btn btn-dark w-100"></i>
                    </div>
                    <div class="col">

                      <form  method="post" action="{{ route('dar.like', ['idpublicacion' => $publicacion['id'],'idusuario' => 3]) }}">
                        @csrf
                        <button style="background-color: transparent; border: none; padding: 0; cursor: pointer;" type="submit"><i class="fi fi-rs-heart text-secondary fs-5 btn btn-dark w-100">{{$publicacioneslikes}} </i></button>
                      </form>
                  
                    </div>
                    <div class="col">
                      <form  method="post" action="{{ route('dar.Unlike', ['idpublicacion' => $publicacion['id'],'idusuario' => 3]) }}">
                        @csrf
                        @method('DELETE') 
                        <button style="background-color: transparent; border: none; padding: 0; cursor: pointer;" type="submit"><i class="fi fi-rr-bookmark text-secondary fs-5 btn btn-dark w-100"></i></button>
                      </form>
                    </div>  
                  </div>
              </div>
          </div>
              <!-- Modal  comentarios-->
         <div class="modal fade modal-lg" id="modal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                $comentarios = app('App\Http\Controllers\comentarioController')->comentarioPublicacion( $publicacion['id']);
            @endphp
            @if ($comentarios === null || count($comentarios) === 0)
             <h2>No hay comentarios</h2>
            @else
                @foreach ($comentarios as $comentario)
                   
                    <div class="card text-bg-dark mb-2 border border-secondary">
                      <div class="card-body">
                        <img src="https://pbs.twimg.com/profile_images/1486761402853380113/3ifAqala_400x400.jpg" class="img rounded-circle pb-2" alt="..." width="35px">
                        <p class="card-title d-inline fw-bold fs-5">  
                          {{ $comentario['usuario']['nombre'] }}
                          <p class="fs-6 text-secondary d-inline fw-normal"></p>
                          <p class="text-secondary d-inline fs-6 fw-normal">- 4h</p>
                          <button type="button" class="btn btn-dark"><i class="fi fi-rr-star fs-6"></i></button>
                          <div class="dropdown d-inline position-absolute top-0 end-0">
        
                          </div>
                        </p>
                        </h5>
                        <h5>{{ $comentario['contenido'] }}</h5>
                      </div>
                  </div>
                @endforeach
            @endif
                <form method="POST" action="{{ route('comentarios.agregar', ['idpublicacion' => $publicacion['id']]) }}">
                  @csrf


                    <label for="message-text" class="col-form-label">Comentario</label>
                    <input  class="form-control" id="contenidoComentario" name="contenidoComentario" aria-describedby="emailHelp">
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


        
<!--Modal agregar comentarios-->
 <!--  -->
 <div class="modal fade modal-lg" id="crearPublicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-bg-dark" data-bs-theme="dark">
      <div class="modal-header" data-bs-theme="dark">
        <center><div>
         
         
          <center><p class="card-title d-inline fw-bold fs-5">  
            Agregar Publicacion</center>
        </div></center>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <div class="mb-3">
            
            <form method="POST" action="{{route("post.publicacion")}}">
              @csrf
              <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input  class="form-control" id="titulo" name="titulo" aria-describedby="emailHelp">
                <label for="contenido" class="form-label">Contenido</label>
                <input  style="height: 200px"  class="form-control" id="contenido" name="contenido" aria-describedby="emailHelp">
                <div style="margin-top: 30px; margin-bottom:30px;" id="emailHelp" class="form-text">Selecciona la categoria que tu quieras</div>



                <div class="container overflow-hidden text-center">
                  <div class="row gy-5">
        
                    <div class="col-6">
                      <center> <div class="card p-3" style="width: 18rem;   padding: 0rem!important; " class="">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div></center>
                     
                    </div>
                    
                    <div class="col-6">
                      <center> <div class="card p-3" style="width: 18rem;   padding: 0rem!important; " class="">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div></center>
                     
                    </div>

                    
                    <div class="col-6">
                      <center> <div class="card p-3" style="width: 18rem;   padding: 0rem!important; " class="">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div></center>
                     
                    </div>

                    
                    <div class="col-6">
                      <center> <div class="card p-3" style="width: 18rem;   padding: 0rem!important; " class="">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div></center>
                     
                    </div>

                    
                    <div class="col-6">
                      <center> <div class="card p-3" style="width: 18rem;   padding: 0rem!important; " class="">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div></center>
                     
                    </div>

                    
        
                  
        
                    </div>
        
                  
                  
        
                  </div>
        
                  
                </div>
              </div>
            
             
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
    
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  
</div> 
      




        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    </body>
</html>