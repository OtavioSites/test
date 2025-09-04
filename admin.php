<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div id="container">
        <h1>Histórico</h1>
        <div id="tabela">
            <div id="header">
            <div class="head">#</div>
            <div class="head">Produto</div>
            <div class="head">Preço</div>
            <div class="head">Quantidade</div>
            <div class="head">Del</div>
        </div>
        <div id="content">
            <?php
                $arquivo = "dados.json";

                if(file_exists($arquivo)){
                    $conteudoJson = file_get_contents($arquivo); 
                    $dados = json_decode($conteudoJson, true);
                }

                $dados = unset(, 2);
                foreach($dados as $indice => $usuario){
                    echo "
                    <div id='pedido'>
                    <div class='cont'><h2>" . htmlspecialchars($usuario['nome']) . "</h2></div>
                    <div class='cont'><h2>" . htmlspecialchars($usuario['preco']) . "</h2></div>
                    <div class='cont'><h2>" . htmlspecialchars($usuario['quant']) . "</h2></div>
                    <div class='cont'><button type='button'>Deletar</button></div></div>";
                
                };
               
            
            
            
            ?>
        </div>
        </div>
    </div>
</body>
</html>