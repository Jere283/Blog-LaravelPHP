@extends('layout')
@include('includes/navbar')
@section('content')
    <div class="container">
        <h3 class="my-5">Creacion de encuestas:</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@mdo">Crear Encuesta</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Encuesta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="publicacion1" class="col-form-label">Publicacion 1:</label>
                                <input type="text" class="form-control" id="publicacion1" placeholder="Buscar por ID, usuario...">
                            </div>
                            <div class="mb-3">
                                <label for="publicacion2" class="col-form-label">Publicacion 2:</label>
                                <input type="text" class="form-control" id="publicacion2" placeholder="Buscar por ID, usuario...">
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
    </div>
@endsection
