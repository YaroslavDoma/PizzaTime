function onDivClick(text){
    let checkbox = document.getElementById("check-"+ text);
    let card = document.getElementById("card-"+ text);

    if(checkbox.checked){
        checkbox.checked = false;
    }else{
        checkbox.checked = true;
    }
}