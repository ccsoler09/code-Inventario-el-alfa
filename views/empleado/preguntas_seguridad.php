
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-5 mx-5">

      <div class="row">
          <div class="col-6">
              <a class="btn btn-dark" href="?controller=empleado&method=create_answer">Crear nueva pregunta de seguridad</a>
          </div>
          <div class="col-6">
              <a class="btn btn-dark" href="?controller=empleado&method=preguntas_usuario">Preguntas de usuario</a>
          </div>
      </div>
<!--begin-->

<div class="my-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Preguntas de seguridad</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Pregunta</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach(parent::find_questions() as $question):?>
                 <tr>
                    <td><?=$question->pregunta?></td>
                    <td><a href="?controller=empleado&method=question_update&id_pregunta=<?=$question->id_pregunta?>"><i class="material-icons text-dark text-center">edit</i></a></td>
                  </tr>
                 <?php endforeach; ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>

<!--end-->
      </div>
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->


