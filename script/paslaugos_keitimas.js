const trinti_btn = document.querySelector('.trinti_btn');
const sutikimas = document.querySelector('.forma_trinti');
const btn_ne = document.querySelector('.btn_ne');

function double_check () {
    trinti_btn.style.display='none'; 
    sutikimas.style.display='block';
}

function deny (){
    trinti_btn.style.display='block'; 
    sutikimas.style.display='none';
}