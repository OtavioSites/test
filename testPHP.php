<?php
            $arquivo = "dados.json";
           

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
                $conteudoJson = file_get_contents($arquivo);
                $dadosAtuais = json_decode($conteudoJson, true);
                
                
                
                $data = file_get_contents('php://input');
                $info = json_decode($data, true);
                
                $nomeJs = $info["nome"];
                
                
            
                foreach($dadosAtuais as $i => $item) {
                
                    if($nomeJs == $item["nome"]){
                        unset($dadosAtuais[$i]);
                    }

                }

                $dados = json_encode($dadosAtuais, JSON_PRETTY_PRINT);
                file_put_contents($arquivo, $dados);

                header("Location: admin.php");
           }

        ?>