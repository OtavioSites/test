<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
        $nome = isset($_POST['produto']) ? trim($_POST['produto']) : '';
        $preco = $_POST['preco'];
        $quant = isset($_POST['quant']) ? trim($_POST['quant']) : '';
        
        if(empty($preco) || empty($quant) || empty($preco)){
            header('location: user.php');
        }else {

        $arquivo = "dados.json";
        $dadosAtuais = [];

        if(file_exists("dados.json")){
            $conteudoJson = file_get_contents($arquivo);
            $dadosAtuais = json_decode($conteudoJson, true);
        }

        
       
            if($dadosAtuais['nome'] != $nome){

                $dadosAtuais[] = [
                "preco" => $preco,
                "nome" => $nome,
                "quant" => $quant
                ];
                $novoConteudoJson = json_encode($dadosAtuais, JSON_PRETTY_PRINT);
                file_put_contents($arquivo, $novoConteudoJson);

    

                
            }else{
                header('location: user.php');
            }
        
          header("Location: user.php");
    
    }
    }else{
        header("Location: user.php");
    }
        

?>