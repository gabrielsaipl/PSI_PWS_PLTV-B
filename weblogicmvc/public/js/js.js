
function filtrar() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("caixaFiltrar");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabela");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function alterarVisaoPassword() {
    var checkbox = document.getElementById("password");
    if (checkbox.type === "password") {
        checkbox.type = "text";
    } else {
        checkbox.type = "password";
    }
}

function printfatura(){
    var header = document.getElementById('header');
    var footer = document.getElementById('footer');
    var bts = document.getElementById('buttons');
    var estado = document.getElementById('estado');
    var form = document.querySelector(".form");
    header.style.visibility="hidden";
    footer.style.visibility="hidden";
    bts.style.visibility="hidden";
    estado.style.visibility="hidden";
    form.style.boxShadow="10px 10px 30px white";
    form.style.borderStyle="solid";
    window.print();
    header.style.visibility="visible";
    footer.style.visibility="visible";
    bts.style.visibility="visible";
    estado.style.visibility="visible";
    form.style.boxShadow="10px 10px 30px green";
    form.style.borderStyle="none";
}