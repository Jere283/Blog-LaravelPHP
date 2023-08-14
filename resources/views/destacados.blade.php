@extends('layout')
@extends('includes/header')
@include('includes/navbar')
@section('title')
    Seccion destacados
@endsection
@section('content')
    <div class="container">
        <h3 class="text-center my-5">Analiticas y Estadisticas de Posts:</h3>
        <div class="card">
            <div class="row my-3 mx-2">
                <div class="col-6">
                    <div class="card p-3">
                        <h5>Post con mas comentarios</h5>
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">Publicacion 1</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                
                            </div>
                        </div>
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">Publicacion 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-3">
                        <h5>Post con mas likes</h5>
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">Publicacion 1</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">Publicacion 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
