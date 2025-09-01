<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro com JSON</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <?php
  
  $admin = [
    "admin",
    "admin@gmail.com",
  ];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $email = isset($_POST['email']) ? trim($_POST['email']) : '';
      $name = isset($_POST['nome']) ? trim($_POST['nome']) : '';
      if(!empty($name) || !empty($email)){

      if($name == "admin" && $email == "admin@gmail.com"){
        header("Location: admin.php");
        
      }else{
        header("Location: user.php");
      }
    }else{
      header("Location: index.php");
      exit();
    }
  }
  ?>
  <div id="form">
  <h2>Cadastro de Usuários (JSON)</h2>
  
  <form action="index.php" method="POST">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <button type="submit">Cadastrar</button>
  </form>
</div>

</body>
</html>