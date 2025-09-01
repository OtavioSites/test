let preco = document.getElementById("preco")

function regex(valor){

    valor = valor.value.replace(/\D/g, "")
    let regex = /(?=\d{3}?)+?(\d{3})+(\d{3})/g;
    if(regex.test(valor)){
        valor = valor.replace(regex, "$1.");
        return "R$" + valor;
    }

}
preco.addEventListener("blur", function(){
    preco.value = regex(preco)

})