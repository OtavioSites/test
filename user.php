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
    <form action="processa_user.php" method="POST">
    <label for="produto">Produto: </label>
    <input type="text" name="produto" id="produto">
    <label for="quant">Quantidade: </label>    
    <input type="number" name="quant" id="quant">        
    <label for="preco">Preço: </label>
    <input type="text" name="preco" id="preco">
    <script>
        let preco = document.getElementById("preco")

    function regex(valor){

    valor = valor.value.replace(/\D/g, "")
    let regex = /(\d)(?=(\d{3})+(?!\d))/g;
    if(regex.test(valor)){
        valor = valor.replace(regex, "$1.");
        return valor = "R$" + valor;
    }

}
preco.addEventListener("blur", function(){
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
    </table>
    <tbody>
        <?php

        ?>
    </tbody>
    
    
    

</div>



</body>
</html>