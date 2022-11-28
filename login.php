<ul class="nav nav-pills nav-justified">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php?page=login">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=new">Novo cadastro</a>
  </li>
</ul>

<div class="container mt-5"></div>
<form method="POST">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" name="email" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" name="senha"/>
    <label class="form-label" for="form2Example2">Password</label>
  </div>

 

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


</form>

<?php
    
    include_once('autenticacao.php')

?>
