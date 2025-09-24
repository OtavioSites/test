<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div id="container">
    <form action="salvar.php" method="POST">
    <h1>Formulário</h1>
    <div>
    <label for="produto">Produto: </label>
    <input type="text" name="produto" id="produto">
    </div><div>
    <label for="quant">Quantidade: </label>    
    <input type="number" name="quant" id="quant">
    </div><div>     
    <label for="preco">Preço: </label>
    <input type="text" name="preco" id="preco" placeholder="R$ 00,00">
    </div>   
    <script>
    let preco = document.getElementById("preco")

    function regex(valor){
    
    valor = valor.value.replace(/\D/g, "");
    
    let valorLength = valor.length -2;
    console.log(valorLength);
    let valorCent = valor.slice(-2);
    
    valorCent = valorCent.replace(/(\d{2})/g, ",$1");
    console.log(valorCent)
    valor = valor.slice(0, valorLength)
    
    let regex = /(\d)(?=(\d{3})+(?!\d))/g;
    
    
        valor = valor.replace(regex, "$1.");
        return valor = "R$ " + valor + valorCent;


}
preco.addEventListener("blur", function(){
    preco.value = regex(preco)

})
preco.addEventListener("input", function(){
    preco.value = regex(preco)

})
    </script>
    <button type="submit">Enviar</button>
    
</form>
    <table border="1">
        <thead>
        <tr>
            <th></th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
        </tr>
        </thead>
    
    <tbody>
        <?php
        $arquivo = "dados.json";
            
                if(file_exists($arquivo)){
                    $conteudoJson = file_get_contents($arquivo);

                    $dados = json_decode($conteudoJson, true);

                    if($dados && count($dados) > 0){
                        foreach($dados as $indice => $usuario){
                            echo "<tr>
                                    <td>" . $indice + 1 . "</td>
                                    <td>" . htmlspecialchars($usuario['nome']) ."</td>
                                    <td>" . htmlspecialchars($usuario['preco']) ."</td>
                                    <td>" . htmlspecialchars($usuario['quant']) ."</td></tr>";
                        }
                    }else{
                        echo "<td colspan ='4'>Não tem informações</td>";
                    }
                }else{
                    echo "<td colspan ='4'>Não tem informações</td>";
                }
            
        ?>
    </tbody>
    </table>
    
    

</div>



</body>
</html>