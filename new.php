<ul class="nav nav-pills nav-justified">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php?page=login">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="index.php?page=new">Novo cadastro</a>
  </li>
</ul>

<div class="container mt-5"></div>
<form method="post">
  <!-- Nome input -->
  <div class="form-outline mb-4">
    <input type="nome" id="form2Example1" class="form-control" name="nome" placeholder="Insisa seu nome aqui"/>
    <label class="form-label" for="form2Example1">Nome</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example2" class="form-control" name="email" placeholder="Informe seu e-mail"/>
    <label class="form-label" for="form2Example2">E-mail</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" placeholder="Insira sua senha"/>
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- Submit button -->
  <button type="button" class="btn btn-primary btn-block mb-4">Cadastrar</button>

  
</form>