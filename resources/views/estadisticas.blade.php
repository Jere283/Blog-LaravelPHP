@extends('layout')
@include('includes/navbar')
@section('content')
    <div class="container">
        <h3 class="text-center my-5">Analiticas y Estadisticas de Posts:</h3>
        <div class="card">
            <div class="row my-3 mx-2">
                <div class="col-6">
                    <div class="card p-3">
                        <h5>Post con mas comentarios</h5>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-3">
                        <h5>Post con mas likes</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection