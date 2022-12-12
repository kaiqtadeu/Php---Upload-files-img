<?php
    include('autenticacao.php');
?>

<h1>Editar usuário</h1>

<div class="container-fluid mt-5">
            <form method="POST" id="editar" enctype='multipart/form-data'>
                <input type="hidden" name="acao" value="editar">
                
                <!-- Nome input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="Nome do seu print">Nome do arquivo   </label>
                    <input type="text" id="nomeprint" class="form-control" name="nomeprint" placeholder="Altere o nome do seu arquivo"/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="nome">Escolha seu arquivo</label>
                    <input type="file" id="fileprint" class="form-control" name="fileprint" placeholder="Busque sua imagem"/>
                   
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Data do print</label>
                    <input type="date" id="dataprint" class="form-control" name="dataprint" placeholder=""/>
                </div>

                <!-- Password input -->
                

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Upload</button>
            </form>
        </div>

        <script>
  $( document ).ready(function() {
    $("#editar").submit(function(e){
    if($("#nomeprint").val()== ""){
      alert("Esta faltando seu nome");
      return false;
    } else if($("#fileprint").val()== ""){
      alert("Esta faltando seu arquivo");
      return false;
    } else if ($("#dataprint").val()== ""){
      alert("Esta faltando a data do seu print");
      return false;
    }
    
});
});

</script>
     <?php

    
     switch (($_REQUEST["acao"])) {
         case 'editar':
             $nome = $_POST["nomeprint"];
             $file = $_FILES["fileprint"];
             $date = $_POST["dataprint"];
             $tipos = ['image/jpeg', 'image/jpg', 'image/png', 'image/bmp'];

             if (in_array($_FILES['fileprint']['type'], $tipos)) {
                 $path = $_FILES['fileprint']['tmp_name'];
                 $data = file_get_contents($path);
                 $base64 = 'data:' . $_FILES['fileprint']['type'] . ';base64,' . base64_encode($data);


                 $sql = "UPDATE uploads SET nome_img='{$nome}', img='{$base64}', data_img='{$date}'
                 WHERE id_img=" . $_REQUEST["id"];

                 $res = $mysqli->query($sql);

                 if ($res == true) {
                     print "<script>alert('Editado com sucesso');</script>";
                     print "<script>location.href='index.php?page=painel';</script>";
                 } else {
                     print "<script>alert('Não foi possível editar, tente novamente');</script>";
                 }
             }
             
             break;

             case 'excluir':
                $sql = "DELETE from uploads WHERE id_img=".$_REQUEST["id"];
                $res = $mysqli->query($sql);
                
                if($res==true){
                    print"<script>alert('Excluido com sucesso');</script>";
                    print"<script>location.href='?page=painel';</script>";
                }else{
                    print"<script>alert('Não foi possível excluir, tente novamente');</script>";
                };
    
    
                break;
     }

     ?>