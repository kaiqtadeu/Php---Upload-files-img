
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<script src="js/main.js"></script>

<?php
    include('protect.php');
?>
<script>
    $('#btn-post').hide();
    $('#btn-sair').removeClass('d-none');        
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Painel</title>
    </head>
    <body>
        <?php
        $nome = ($_SESSION['nome']);
    
        if(isset($_SESSION['nome'])){
        echo "Seja bem vindo $nome ^^ ";
           
        }
        
        ?>
        
        <div class="container-fluid mt-5">
            <form method="POST" id="upload" enctype='multipart/form-data'>
                <input type="hidden" name="acao" value="upload">
                
                <!-- Nome input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="Nome do seu print">Nome do arquivo   </label>
                    <input type="text" id="nomeprint" class="form-control" name="nomeprint" placeholder="Insira sua senha"/>
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
            switch(isset($_REQUEST["acao"])){
                case 'upload':
                    if($_POST["nomeprint"]==""){
                    print"<script>alert('Por favor, insira o nome do arquivo');</script>";
                    } else if ($_FILES["fileprint"]==""){
                    print"<script>alert('Por favor insira o arquivo');</script>";
                    } else if ($_POST["dataprint"]==""){
                    print"<script>alert('Por favor, insira a data do print');</script>";
                } else {

                    $usuario = $_SESSION['id'];
                    $nomeprint = $_POST["nomeprint"];
                    $fileprint = $_FILES["fileprint"];
                    $dataprint = $_POST["dataprint"];

                    /*
                    echo '<pre>';
                    print_r($_REQUEST);
                    print_r($_FILES);
                    echo '</pre>';
                    echo $_FILES['fileprint']['tmp_name'];*/

                    $tipos = ['image/jpeg', 'image/jpg', 'image/png', 'image/bmp'];
                    if (in_array($_FILES['fileprint']['type'], $tipos)) {


                        $path = $_FILES['fileprint']['tmp_name'];
                        $data = file_get_contents($path);
                        $base64 = 'data:' . $_FILES['fileprint']['type'] . ';base64,' . base64_encode($data);

                        $sql = "INSERT INTO uploads (id_user, nome_img, img, data_img) 
                        values ('{$usuario}', '{$nomeprint}', '{$base64}', '{$dataprint}')";

                        $res = $mysqli->query($sql);

                        if ($res == true) {
                            print "<script>alert('Cadastrado com sucesso');</script>";

                        } else {
                            print "<script>alert('Ocorreu algum erro, tente novamente');</script>";
                        }
                    } else {
                        print "<script>alert('Formato incorreto');</script>";
                    }
                }
                break;
            }
    
        ?>
            <div class="container-fluid mt-5">
                <div class="input-group rounded">
                    
                    <input type="text" 
                        class="form-control rounded"
                        name="consulta"
                        id="txt_consulta"
                        placeholder="Barra de pesquisa" 
                        aria-label="Search" 
                        aria-describedby="search-addon" 
                    />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
            </div>
            
            
        <div class="container-fluid mt-5">
         <h1>Lista da suas imagens</h1>
            <?php
            
                $sql = "SELECT * FROM uploads WHERE id_user=".$_SESSION["id"];
                $res = $mysqli->query($sql);

                $qtd = $res->num_rows;

                if($qtd>0){
                    print"<table id='tabela' class='table table-hover table-striped table-bordered'>";
                        print "<thead>";
                            print "<tr>";
                                print "<th>#</th>";
                                print "<th>NOME IMAGEM</th>";
                                print "<th>DATA IMAGEM</th>";
                                print "<th>IMAGEM</th>";
                            print"</tr>";
                        print "</thead>";
                            while($row = $res->fetch_object()){
                            print "<tbody>";
                                print "<tr>";
                                    print "<td>".$row->id_user."</td>";
                                    print "<td>".$row->nome_img."</td>";
                                    print "<td>".$row->data_img."</td>";
                                    echo  "<td>" .'<img src="' . $row->img .'" width="100px" height="auto" class="gallery-item"> </td>';
                                print"</tr>";
                            print "</tbody>";
                    }
                    print"</table>";
                    

                }else{
                    print"<p class='alert alert-danger'>Nenhum usuário encontrado</p>";
                }
                
            ?>
            <script>
	            $('input#txt_consulta').quicksearch('table#tabela tbody tr');
            </script>
        </div>

    
            
    </body>
</html>