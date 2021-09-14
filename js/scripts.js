function alterarTexto() {
    document.getElementById("demo").innerHTML = "Texto do arquivo JS externo"
}

let g = "global";
function outer(){
    let o = "outer";
    function inner() {
        let i = "inner";
    }
}

