function onDivClick(text){
    let checkbox = document.getElementById("check-"+ text);
    let card = document.getElementById("card-"+ text);

    if(checkbox.checked){
        checkbox.checked = false;
    }else{
        checkbox.checked = true;
    }
}


function PriceForPizza(){
    let table = document.getElementById("table");
    let priceText = document.getElementById("PriceText");
    let sum = 0;

    console.log(table.rows.length);
    
    for (let i = 1; i < table.rows.length; i++) {
        let price = parseFloat(table.rows[i].cells[2].innerHTML);
        let count = document.getElementById("count-" + i).value;
        count = parseFloat(count);
        sum += price * count;
    }
    priceText.innerHTML = "Total price: " + sum + "&#8372;";
}


function Search( tableName, opt ){
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("Search");
    filter = input.value.toUpperCase();
    table = document.getElementById(tableName);
    tr = table.getElementsByTagName("tr");
    opt = parseInt(opt);

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[opt];
        if (td) {
            txtValue = td.textContent || td.innerText;
            console.log(txtValue);
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
    
}