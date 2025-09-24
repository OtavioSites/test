try {
  const botao = document.querySelectorAll("button");

 botao.forEach((e) => {
    
    e.addEventListener("pointerup", function(event){
        
        let indiceBtn =  event.target;
        let indice = Array.from(botao).indexOf(indiceBtn);
        
    
        console.log(indice)
        
        if(indice !== -1){
            let tr = document.querySelectorAll("tr")[indice];
            
            let nome = document.querySelectorAll(".nome")[indice].textContent;
            let preco = document.querySelectorAll(".preco")[indice].textContent;
            let quant = document.querySelectorAll(".quant")[indice].textContent;
            
            console.log(typeof indice)
            let info = {
                "indice": indice,
                "nome": nome,
                "preco": preco,
                "quant": quant,
            }
            fetch("testPHP.php", {
                method: "POST",
                headers: {
                'Content-Type': 'application/json' // Indica que o corpo é JSON
                },
                body: JSON.stringify(info),
                }
                
    ).then((response) =>  {
        return response.text()}
    )        
        }

    })

})
} catch (error) {
    console.log(Error.error);
}