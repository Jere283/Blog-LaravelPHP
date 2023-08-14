@extends('layout')
@extends('includes/header')
@section('title')
    Panel de encuestas
@endsection
@include('includes/navbar')
@section('content')
    <div class="container">
        <h2 class="mt-5">Creacion de encuestas:</h2>
        <p class="mb-3 fs-5" style="width: 30rem">
            En esta seccion podras crear encuestas escogiendo dos publicaciones y generar una votacion a las mismas.
        </p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@mdo">Nueva Encuesta</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear nueva encuesta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="title">Titulo de la encuesta</label>
                                <input type="text" name="" id="title" class="form-control"
                                    placeholder="Titulo o descripcion de la encuesta">
                            </div>
                            <div class="mb-3">
                                <label for="publicacion1" class="col-form-label">Publicacion 1:</label>
                                <input type="text" class="form-control" id="publicacion1"
                                    placeholder="Buscar por ID, usuario...">
                            </div>
                            <div class="mb-3">
                                <label for="publicacion2" class="col-form-label">Publicacion 2:</label>
                                <input type="text" class="form-control" id="publicacion2"
                                    placeholder="Buscar por ID, usuario...">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Crear Encuesta</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <h3 class="mt-5 mb-4">Encuestas creadas recientemente:</h3>
            <div class="row">
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Encuesta 1</h5>
                      <p class="card-text">Descripción de la encuesta 1...</p>
                      <a href="#" class="btn btn-primary">Responder</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Encuesta 2</h5>
                      <p class="card-text">Descripción de la encuesta 2...</p>
                      <img src="" alt="">
                      <a href="#" class="btn btn-primary">Responder</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Encuesta 3</h5>
                      <p class="card-text">Descripción de la encuesta 3...</p>
                      <a href="#" class="btn btn-primary">Responder</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
