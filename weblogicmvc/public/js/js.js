function printform(form){
    var printdata = document.getElementById(form);
    newwin = window.open("");
    newwin.document.write(printdata.outerHTML);
    newwin.print();
    newwin.close();
}