<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital KIMV</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="imagens/logo_hospital.png" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
  <script src="./menu.js"></script>
  <link rel="stylesheet" href="./menu.css">
  <link rel="stylesheet" href="consultar.css">
  <link rel="stylesheet" href="footer.css">

    <!--Portifólio-->
  <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">
   <link rel="stylesheet" href="css/base.css">    

   <script src="js/modernizr.js"></script>
   <script src="js/pace.min.js"></script>
   <script src="js/jquery-2.1.3.min.js"></script>
</head>

<script type="text/javascript">
    function carregarPontas(){
        $("#menu").load('menu.php');
        $("#footer").load('footer.php');
    }
</script>

<body onload="carregarPontas()">
<div id="menu"></div>

<div id="consCenter"><br/><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <label for="consulta">Pesquisar informações:</label>
    <input type="text" name="tabela" placeholder="Tabela">
    <input type="text" name="campos" placeholder="Campos">
    <input type="text" name="condicao" placeholder="Condição">
    <input type="submit" name="consultar" value="Pesquisar">
</form></div>

<div id="tableCons">
    <table>
        
    <?php
        require $_SERVER['DOCUMENT_ROOT'] . '/hospital/SQL/DBQuery.class.php';

        $tabela = (!empty($_POST) ? trim($_POST['tabela']) : "");
        $campos = (!empty($_POST) ? trim($_POST['campos']) : "");
        $condicao = (!empty($_POST) ? trim($_POST['condicao']) : "");
        
        try {
            if (!empty($_POST)){
                if ($condicao == ""){
                    $condicao = "1=1";
                }
                
                $dbquerypers = new DBQuery($tabela, $campos, "");
                $resultSet   = $dbquerypers->select($condicao);
                $cadacampo = explode(",", $campos);

                echo "<table class='styled-table'><tr>";
                foreach ($cadacampo as $campo) {
                    echo "<th>$campo</th>";
                }
                echo "</tr>";
                
                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>";
                    foreach ($cadacampo as $campo) {
                        echo "<th>".$exibe[$campo]."</th>";
                    }
                    echo "</tr>";
                }
            }
            
        }
        catch (Exception $err) {
            echo "<p class='center'>A consulta especificada não é válida!</p>";
        }
    ?>
        
    <br/>
</div>

<div id="footer"></div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>
</html>