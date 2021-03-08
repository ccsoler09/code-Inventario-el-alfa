
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-5 mx-5">

      <div class="row">
          <div class="col-6">
              <a class="btn btn-dark" href="?controller=empleado&method=registro">Crear usuario nuevo</a>
          </div>
      </div>
<!--begin-->

<div class="my-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de usuarios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Fecha de creación</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach(parent::empleados() as $empleado):?>
                 <tr>
                    <td><?=$empleado->nombre?></td>
                    <td><?=$empleado->email?></td>
                    <td><?=$empleado->CarDescripcion?></td>
                    <td><?=$empleado->fecha?></td>
                    <td><?=$empleado->nombre_estado?></td>
                    <td><a href="?controller=empleado&method=user_update_state&id=<?=$empleado->id?>">Cambiar estado</a></td>
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


