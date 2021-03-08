<section class="container center"> 
    <br>
    <div class="row">   
      <br>
    <div class="col xl3 l3 m2 s0"></div>
      <div class="col xl6 l6 m8 s12 login-logo">

        <section class="card">
            
      <form action="?controller=empleado&method=save" method="POST" class="container center">
        <h5 class="red-text center">Pregunta de seguridad</h5>
        <div class="input-field col s12">
        <input type="hidden" name="usuario_id" value="<?=$date->id_usuarios?>">
          <input id="question" type="text" class="validate" name="question" required>
          <label for="question">Tu pregunta</label>
        </div>
        <br>
        <br>
        <div class="input-field col s12">
          <input id="answer" type="text" class="validate" name="answer" required>
          <label for="answer">Tu respuesta</label>
        </div>
        
        <br>
        <section class="form-group">
            <input type="submit" value="Continuar" class="btn red white-text waves-light">
        </section>
        <br>  
        </form><br>

        </section>


      </div>
      </div>
    <div class="col xl3 l3 m2 s0"></div>
    </div>
</section>

