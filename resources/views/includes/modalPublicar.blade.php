<div class="modal fade modal-lg" id="crearPublicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-bg-dark" data-bs-theme="dark">
            <div class="modal-header" data-bs-theme="dark">
                <center>
                    <div>
                        <center>
                            <p class="card-title d-inline fw-bold fs-5">
                                Agregar Publicacion
                        </center>
                    </div>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <form method="POST" action="{{ route('post.publicacion') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input class="form-control" id="titulo" name="titulo" aria-describedby="emailHelp">
                            <label for="contenido" class="form-label">Contenido</label>
                            <input style="height: 200px" class="form-control" id="contenido" name="contenido"
                                aria-describedby="emailHelp">
                            <div style="margin-top: 30px; margin-bottom:30px;" id="emailHelp" class="form-text">
                                Selecciona la categoria que tu quieras</div>
                            <div class="container overflow-hidden text-center">
                                <div class="row gy-5">
                                    <div class="col-6">
                                        <center>
                                            <div class="card p-3" style="width: 18rem;   padding: 0rem!important; "
                                                class="">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-6">
                                        <center>
                                            <div class="card p-3" style="width: 18rem;   padding: 0rem!important; "
                                                class="">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-6">
                                        <center>
                                            <div class="card p-3" style="width: 18rem;   padding: 0rem!important; "
                                                class="">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-6">
                                        <center>
                                            <div class="card p-3" style="width: 18rem;   padding: 0rem!important; "
                                                class="">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-6">
                                        <center>
                                            <div class="card p-3" style="width: 18rem;   padding: 0rem!important; "
                                                class="">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6U4mr04bv7Gg1UIBZfjuEKBRJaFIGnNfxkw"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </center>
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
