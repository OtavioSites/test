document.querySelectorAll("button").forEach((e) => {
    e.addEventListener("submit", function(){
        let indiceBtn = e.className;
        let tr = document.querySelectorAll("tr")[indiceBtn];
        if(indiceBtn === tr.length){
            let cont = document.querySelectorAll("cont > h2")[2].innerHTML;
            const arquivo = "admin.json";
            JSON.stringify("nome", cont)
            
        }

    })

})