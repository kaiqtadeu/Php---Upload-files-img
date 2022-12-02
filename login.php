<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>


<ul class="nav nav-pills nav-justified">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php?page=login">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=new">Novo cadastro</a>
  </li>
</ul>

  <div class="container-fluid mt-5">
  <form method="POST" id="login">

    <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" id="email" class="form-control" name="email" placeholder="Informe seu e-mail" />
      <label class="form-label" for="form2Example1"  >E-mail</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" id="senha" class="form-control" name="senha"  placeholder="Informe sua senha"/>
      <label class="form-label" for="form2Example2">Password</label>
    </div>

  

    <!-- Submit button -->
    <button type="submit"  class="btn btn-primary btn-block mb-4">Sign in</button>


  </form>

  </div>
<script>
  $( document ).ready(function() {
    $("#login").submit(function(e){
    if($("#email").val()== ""){
      alert("Esta faltando seu e-mail");
      return false;
    } else if($("#senha").val()== ""){
      alert("Esta faltando sua senha");
      return false;
    } else {
      $('#btn-sair').show();
    }
    
});
});

</script>


<?php
    
    include_once('autenticacao.php')

?>
