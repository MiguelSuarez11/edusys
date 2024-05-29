<div class="modal fade" id="create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2596be;">
                <h4 class="modal-title"> <strong>Registrar Notas</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
           
                <div class="card-body">
                <form method="post" action="{{ route('profesor.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Nota 1</label>
                            <input type="int" class="form-control" name="nota1" aria-describedby="helpId"
                                placeholder="" />
                        </div>
                        <div class="group col-6">
                            <label for="" class="form-label">Nota 2</label>
                            <input type="int" class="form-control" name="nota2" aria-describedby="helpId"
                                placeholder="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Nota 3</label>
                            <input type="int" class="form-control" name="nota3" aria-describedby="helpId"
                                placeholder="" />
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Nota 4</label>
                            <input type="int" class="form-control" name="nota4" aria-describedby="helpId"
                                placeholder="" />
                        </div>

                    </div>

                    <div class="row">
                    <div class="col-12">
                        <label for="" class="form-label">Definitiva</label>
                        <input type="int" class="form-control" name="definitiva" aria-describedby="helpId"
                            placeholder="" />
                    </div>
                    </div>




                    
                </div>



            </div>

           
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>