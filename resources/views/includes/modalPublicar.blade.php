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
                    @php
                    // Obtener todas las publicaciones desde el controlador
                    $categorias = app('App\Http\Controllers\postController')->getAllCategorias();
                @endphp
                    <form id="myForm" method="POST" action="{{ route('post.publicacion') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input class="form-control" id="titulo" name="titulo" aria-describedby="emailHelp">
                            <label for="contenido" class="form-label">Contenido</label>
                            <input style="height: 200px" class="form-control" id="contenido" name="contenido"
                                aria-describedby="emailHelp">
                            <div style="margin-top: 30px; margin-bottom:30px;" id="emailHelp" class="form-text">
                                Selecciona la categoria que tu quieras</div>
               
                        </div>

                      
                           
                            @foreach ($categorias as $categoria)
                            <input type="checkbox" name="checkbox[]" value="{{$categoria['id']}}"> {{$categoria['titulo']}}<br>
                            @endforeach
                         
                        
                        
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



    <script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Evitar que el formulario se envíe normalmente

            var selectedCheckboxes = [];
            var checkboxes = document.getElementsByName("checkbox[]");

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    selectedCheckboxes.push(checkboxes[i].value);
                }
            }

            // Crear un campo oculto en el formulario para almacenar los IDs seleccionados como un array JSON
            var hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", "selectedIds");
            hiddenInput.setAttribute("value", "[" + selectedCheckboxes.join(",") + "]");

            // Agregar el campo oculto al formulario
            document.getElementById("myForm").appendChild(hiddenInput);

            // Enviar el formulario
            document.getElementById("myForm").submit();
        });
    </script>