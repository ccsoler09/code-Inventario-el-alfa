
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-1 mx-5">

      <div class="row">
          <div class="col-6">
          <a class="btn btn-dark" href="?controller=empleado&method=productos">Regresar</a>
        </div>
      </div>
        
      <div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-6 mt-5"><h4>¡Actualización de productos!</h4></div>
    <div class="col-1"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=empleado&method=actualizar_productos" method="post" class="card col-10">
     <div class="row">
        <div class="col-2 mx-5 my-3">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Nombre:</div>
        <input type="text" placeholder="product name" class="form-control col-10" name="Nombproduc" value="<?=$producto->Nombproduc?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-2">Precio de compra:</div>
        <input id="precio1" type="text" placeholder="$0" class="form-control col-10" name="PrecCompproduc" value="<?=$producto->PrecCompproduc?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-4">IVA:</div>
        <input id="iva" type="text" placeholder="0%" class="form-control col-10 ml-3" name="Iva" value="<?=$producto->Iva?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-2">Precio de venta:</div>
        <input id="precio2" type="text" placeholder="$0" class="form-control col-10" name="PrecVentProduc" value="<?=$producto->PrecVentProduc?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Material:</div>
        <input type="text" placeholder="Material" class="form-control col-10" name="Material" value="<?=$producto->Material?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Color:</div>
        <input type="text" placeholder="Color" class="form-control col-10" name="Color" value="<?=$producto->Color?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-4">Talla:</div>
        <select name="Talla" id="" class="form-control col-10">
            <option  value="<?=$producto->Talla?>" selected disabled><?=$producto->Talla?></option>
            <option value="XS">XS</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
            <option value="Otra">Otra</option>
        </select>   
    </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="">Descripcion:</div>
        <textarea name="Descripcion" placeholder="Descripcion" cols="30" rows="2" class="form-control col-10"><?=$producto->Descripcion?></textarea>
       </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-1">Proveedor:</div>
        <select name="Proveedores_CodiProve" id="" class="form-control col-10" >
          <option value="<?=$producto->Proveedores_CodiProve?>"  selected><?=$producto->ProveNombres?></option>
          <?php foreach(parent::proveedores_c() as $proveedor): ?>
          <option value="<?=$proveedor->CodiProve?>"><?=$proveedor->ProveNombres?></option>
          <?php endforeach; ?>
        </select>   
    </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-1">Categoria:</div>
        <select name="Categorias_idCate" id="" class="form-control col-10" >
        <option value="<?=$producto->Categorias_idCate?>" selected><?=$producto->NombCate?></option>
          <?php foreach(parent::categorias_c() as $categoria): ?>
          <option value="<?=$categoria->idCate?>"><?=$categoria->NombCate?></option>
          <?php endforeach; ?>
        </select>   
    </div>
      </div>
      <input type="hidden" name="idprod" value="<?=$producto->idprod?>">
      <div class="d-flex justify-content-center mb-3">
      <button class="btn btn-outline-dark mx-2" type="submit">Editar</button>
      </div>
     </form>
     </center>
    </div>
  </div>
</div>

      </div>
    </div>
  </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <!-- /.content-wrapper -->

  <script>
  var precio1 = document.getElementById('precio1');
  var precio2 = document.getElementById('precio2');
  var iva = document.getElementById('iva');

  precio2.addEventListener('keyup', function(e){
   if(precio1.value!=""){
       if(iva.value!=""){
        var parcial=(precio1.value*iva.value)/100;
        precio2.value = parseInt(precio1.value) + parseInt(parcial);
       }else if(iva.value==""){
        precio2.value=precio1.value;
       }
   }
  });
  </script>