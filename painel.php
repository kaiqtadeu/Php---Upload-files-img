<script
  src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>

<?php
    include('protect.php');
?>

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
    echo "<h1> Seja bem vindo </h1>";

    if(isset($_SESSION['nome'])){
        echo ($_SESSION['nome']);
        
    }
    
    ?>

<script>
        $('#btn-sair').show();  
        $('#btn-post').hide();
        
         
      
       
    </script>
    
</body>
</html>