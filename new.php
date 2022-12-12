<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<ul class="nav nav-pills nav-justified">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php?page=login">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="index.php?page=new">Novo cadastro</a>
  </li>
</ul>

<div class="container-fluid mt-5">
  <form method="POST" id="new">
    <input type="hidden" name="acao" value="cadastrar">
    
    <!-- Nome input -->
    <div class="form-outline mb-4">
      <input type="nome" id="nome" class="form-control" name="nome" placeholder="Insisa seu nome aqui"/>
      <label class="form-label" for="nome">Nome</label>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" id="email" class="form-control" name="email" placeholder="Informe seu e-mail"/>
      <label class="form-label" for="email">E-mail</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" id="senha" class="form-control" name="senha" placeholder="Insira sua senha"/>
      <label class="form-label" for="senha">Password</label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
  </form>
</div>

<script>
  $( document ).ready(function() {
    $("#new").submit(function(e){
    if($("#nome").val()== ""){
      alert("Esta faltando seu nome");
      return false;
    } else if($("#email").val()== ""){
      alert("Esta faltando seu e-mail");
      return false;
    } else if ($("#senha").val()== ""){
      alert("Esta faltando sua senha");
      return false;
    }
    
});
});

</script>

<?php
    switch(isset($_REQUEST["acao"])){
        case 'cadastrar':
            if($_POST["nome"]==""){
              print"<script>alert('Por favor, insira seu nome');</script>";
            } else if ($_POST["senha"]==""){
              print"<script>alert('Por favor insira sua senha');</script>";
            } else if ($_POST["email"]==""){
              print"<script>alert('Por favor insira seu e-mail');</script>";
            } else {

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);

            $sql = "INSERT INTO usuarios (nome, email, senha) 
            values ('{$nome}', '{$email}', '{$senha}')";

            $res = $mysqli->query($sql);
            
            if($res==true){
                print"<script>alert('Cadastrado com sucesso');</script>";
               
            }else{
                print"<script>alert('Ocorreu algum erro, tente novamente');</script>";
            }
          }
            break;
          }

?>