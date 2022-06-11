
function printform(form){
    var printdata = document.getElementById(form);
    newwin = window.open("");
    newwin.document.write(printdata.outerHTML);
    newwin.print();
    newwin.close();
}

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