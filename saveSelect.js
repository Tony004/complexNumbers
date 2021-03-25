//Сохранение значения операции

let opSelect = document.getElementById('opSelect');

if(localStorage.opName){
    opSelect.value = localStorage.opName;
}

opSelect.addEventListener("click", function(){
    let opName = opSelect.value;
    localStorage.setItem("opName", opName);
});
