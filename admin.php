<?php
    include 'testPHP.php';
?>


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
        
        <table cellspacing='0'>
            <thead id="header">
            <tr>
            <th class="head">#</th>
            <th class="head">Produto</th>
            <th class="head">Preço</th>
            <th class="head">Quantidade</th>
            <th class="head">Del</th>
            </tr>
            </thead>
           
        <tbody id="content">
            <?php
                $arquivo = "dados.json";

                if(file_exists($arquivo)){
                    $conteudoJson = file_get_contents($arquivo); 
                    $dados = json_decode($conteudoJson, true);
                }
                
                if($dados && count($dados) > 0){
                foreach($dados as $indice => $usuario){
                    echo "
                    <tr>
                    <td class='cont' rowspan='1'><h2>" . $indice . "</h2></td>
                    <td class='cont' rowspan='1'><h2 class='nome'>" . htmlspecialchars($usuario['nome']) . "</h2></td>
                    <td class='cont' rowspan='1'><h2 class='preco'>" . htmlspecialchars($usuario['preco']) . "</h2></td>
                    <td class='cont' rowspan='1'><h2 class='quant'>" . htmlspecialchars($usuario['quant']) . "</h2></td>
                    <td class='cont' rowspan='1'><form action='testPHP.php' method='POST'><button type='submit'>Deletar</button></form></td></tr>";
                
                };
            }else{
                echo "<td colspan='5' style='font-weight: bolder; padding: 15px;'>Não possui nenhum registro</td>";
            }
                
               
            
            
            
            ?>
        </tbody>
        </table> 
    </div>



    <script src="admin.js"></script>
</body>
</html>