<?php
    include('autenticacao.php');
?>

<h1>Editar usuário</h1>

<div class="container-fluid mt-5">
            <form method="POST" id="upload" enctype='multipart/form-data'>
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

     <?php

     switch (isset($_REQUEST["acao"])) {
         case 'editar':
             $nome = $_POST["nomeprint"];
             $file = $_FILES["fileprint"];
             $data = $_POST["dataprint"];

             $sql = "UPDATE uploads SET nome_img='{$nome}', img='{$file}', data_img='{$data}'
                WHERE id_img=".$_REQUEST["id"];

             $res = $mysqli->query($sql);

             if ($res == true) {
                 print "<script>alert('Editado com sucesso');</script>";
                 print "<script>location.href='index.php?page=painel';</script>";
             } else {
                 print "<script>alert('Não foi possível editar, tente novamente');</script>";
             }
             

             break;
     }

     ?>