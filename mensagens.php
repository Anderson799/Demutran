<?php
session_start();
include 'conexao.php';
$sql = "SELECT id,nome, email, telefone FROM contato";
$consulta = mysqli_query($conexao,$sql);

if(mysqli_num_rows($consulta)==0) {
  echo "<center><h1>Nenhum Registro Encontrado</h1></center>";
   }
      ?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Demutran</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
  <h2>Mensagens</h2>

  <form method="POST" action="mensagens.php">
      <div class="input-group">
            <input class="input--style-3" required type="text" placeholder="Qual mensagem você procura" name="nome">
      </div>
      <div class="p-t-10">
          <button type="submit">Buscar</button>
      </div>
  </form>

  <table  border="1" class="table table-striped table-bordered table-hover w-50 table-sm mt-3">
    <thead class="table-dark">
      <tr>
        <td><center>ID</center></td>
        <td><center>Nome</center></td>
        <td><center>Email</center></td>
        <td><center>Telefone</center></td>
        <td colspan="4"><center>Opções</center></td>
    </thead>

    <?php while ($resultado = mysqli_fetch_array($consulta)):?>
      <tr>
          <td><center> <?php echo $resultado['id'];?></center></td>
          <td><center> <?php echo $resultado['nome'];?></center></td>
          <td><center> <?php echo $resultado['email'];?></center></td>
          <td><center> <?php echo $resultado['telefone'];?></center></td>
          <td>
            <a href=visu.php?id=<?php echo $resultado['id']?>>
              <input type="button" name="Qler" value="Quero ler">
            </a>
          </td>
        <?php if(isset($_SESSION['emailL'])){?>  
          <td>
            <a href=alteracadastro.php?id=<?php echo $resultado['id']?>>
              <input type="button" name="alterar" value="Alterar">
            </a>
          </td>
          
          <td>
            <a href="exclusao.php?id=<?php echo $resultado['id']?>">
              <input type="button" name="excluir" value="Excluir">
            </a>
          </td>
        </tr>
      <?php }?>
  <?php endwhile ?>
      </table>
 
    </center>
      
  

      
  
  <?php
    
    mysqli_select_db($conexao,"bookexchange")  or die ("Erro na seleção do Banco");
  if(isset($_POST['nome'])){
      $palavra = trim($_POST['nome']);
      $sql="SELECT * FROM registrolivros WHERE nome like '%".$palavra."%' ORDER BY id";
      $query = mysqli_query($conexao, $sql) or die ("Erro na consulta sql");
      $numRegistros = ($busca = mysqli_num_rows($query));


    if($numRegistros !=0){    
      echo "<br>".$numRegistros. " registro(s) encontrado(s)<br>";
  
   ?>
    
  </table>
<center>
   <table border="1" class="table table-striped table-bordered table-hover w-50 table-sm mt-3">
        
        <thead class="table-dark">

        <tr>    
            <td><center>ID</center></td>
            <td><center>nome</center></td>
            <td><center>email</center></td>
            <td><center>telefone</center></td>
            <td colspan="4"><center>Opções</center></td>
          </tr> 
          </thead>
   <?php

    while($busca=mysqli_fetch_array($query)){
   ?>
        <center>
          <tr>
                <td> <center> <?php echo $busca['id'];?></center></td>
            <td> <center> <?php echo $busca['nome'];?></center></td>
            <td> <center> <?php echo $busca['email'];?></center></td>
            <td> <center> <?php echo $busca['telefone'];?></center></td>

              <td>
            <a href=visu.php?id=<?php echo $busca['id']?>>
              <input type="button" name="Qler" value="Quero ler">
            </a>
          </td>

          <td>
            <a href=alteracadastro.php?id=<?php echo $busca['id']?>>
            <input type="button" name="alterar" value="Alterar">
            </a>
          </td>
          <td>
            <a href="exclusao.php?id=<?php echo $busca['id']?>">
              <input type="button" name="excluir" value="Excluir">
            </a>
          </td>

          </tr>
        </center>
      
  <?php
    }
  }else{
    echo "<center> Nenhum registro encontrado </center>";
  }
}
?>
</table>
</center>
  <a href="index.html">Voltar ao Menu</a>

​
</body>
</html>