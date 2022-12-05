<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
      <title>Login</title>
    </head>
  <body>

  <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light m-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Cadastro</a>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?page=home">Quem somos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?page=home">a ideia</a>
              </li>

            </ul>
              
              <a class="button btn btn-primary text-white ms-auto" id="btn-post" href="index.php?page=login">Entrar</a>
              <a class="button btn btn-primary text-white ms-auto d-none m-2" id="btn-sair" href="logout.php">Sair</a>
              
          </div>     
        </div>
      </nav>

      

      <div class="container-fluid">
        <div class="row">
          <div class="col m-4">
              <?php
                  include('conexao.php');
                  if(isset($_REQUEST['page']) && file_exists($_REQUEST['page'].'.php')){
                    include_once($_REQUEST['page'].'.php');
                  }else{
                    echo "<h1> Olá carai </h1>";
                  }
              ?>
          </div>
        </div>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
                  
    </div>

    <!-- Modal -->
    <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="img/1.jpg" class="modal-img" alt="modal img">
          </div>
        </div>
      </div>
    </div>


  </body>
</html>