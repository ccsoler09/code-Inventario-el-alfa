<!--Ejemplo tabla con DataTables-->
    <div class="container">
        <div class="row">
            <h3 class="red-text center">Funcionarios del sistema</h3>
                <div class="col-lg-12">
                    <div>        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="red white-text">
                            <tr>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Genero</th>
                              <th>Tipo.Id</th>
                              <th>Numero.Id</th>
                              <th>Telefono</th>
                              <th>Correo</th>
                              <th>Rol</th>
                              <th>Estado</th>
                              <th>Cambiar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach(parent::empleados() as $prod):  ?>
                          <tr>
                           <td><?= $prod->nombres?></td>
                           <td><?= $prod->apellidos?></td>
                           <td><?= $prod->nombre_genero?></td>
                           <td><?= $prod->nombre_tipo?></td>
                           <td><?= $prod->numero_documento?></td>
                           <td><?= $prod->telefono?></td>
                           <td><?= $prod->correo?></td>
                           <td><?= $prod->nombre_rol?></td>
                           <td><?= $prod->nombre_estado?></td>
                           <td class="center"><button id="button1" onclick="window.location.href='?controller=admin&method=cambiar_estado&id_usuarios=<?=$prod->id_usuarios?>'" value="<?= $prod->usuario_estado?>" class="btn white-text waves-light">Inactivar</button></td>
                          </tr>
                         <?php endforeach; ?>
                        </tbody>        
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    

     
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/factura/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/factura/popper/popper.min.js"></script>
    <script src="assets/factura/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/factura/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="assets/factura/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="assets/factura/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="assets/factura/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="assets/factura/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="assets/factura/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="assets/factura/main.js"></script>  
    
    <script type="text/javascript">
        var boton1 = document.querySelectorAll('#button1');

         for(i = 0;i < boton1.length; i++) {
         if(boton1[i].value == 1){
          boton1[i].classList.toggle('red');
          boton1[i].innerHTML = "Inactivar";
           console.log(boton1[i].value);
        }else{
          boton1[i].classList.toggle('green');
          boton1[i].innerHTML = " Activar ";
        }
        }

    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.slider');
      var instances = M.Slider.init(elems);
    });
    M.AutoInit();

</script>
<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>

