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
        <?php
        $arquivo = "dados.json";
           if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            
               if(file_exists($arquivo)){
                    $conteudoJson = file_get_contents($arquivo); 
                    $dados = json_decode($conteudoJson, true);
                }
               foreach ($dados as $i => $pessoa) {
                    if($pessoa["nome"]){
                        unset($dados[$i]);
                    }
                }
                $dados = json_encode($dados, JSON_PRETTY_PRINT);
                file_put_contents($arquivo, $dados);

                header("Location: admin.php");
            }

        ?>
        <table border='2'>
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
                
                    
                foreach($dados as $indice => $usuario){
                    echo "
                    <tr>
                    <td class='cont' rowspan='1'><h2>" . $indice . "</h2></td>
                    <td class='cont' rowspan='1'><h2>" . htmlspecialchars($usuario['nome']) . "</h2></td>
                    <td class='cont' rowspan='1'><h2>" . htmlspecialchars($usuario['preco']) . "</h2></td>
                    <td class='cont' rowspan='1'><h2>" . htmlspecialchars($usuario['quant']) . "</h2></td>
                    <td class='cont' rowspan='1'><form action='admin.php' method='POST'><button type='submit' class='" . $indice . "'>Deletar</button></form></td></tr>";
                
                };
                
               
            
            
            
            ?>
        </tbody>
        </table>
    </div>



    <script src="admin.js"></script>
</body>
</html>