const btn1 = document.getElementById('btn1');
const btn2 = document.getElementById('btn2');
const btn3 = document.getElementById('btn3');
const dark = document.getElementById('dark');

function modal1() {
    const modal = document.getElementById('modal1');

    modal.classList.toggle('ativo');

    if(modal.classList.contains('ativo')) {
        dark.style.opacity = 1;
        dark.style.visibility = 'visible';
    }else {
        dark.style.visibility = 'hidden';
        dark.style.opacity = 0;
    }
}

function modal2() {
    const modal = document.getElementById('modal2');

    modal.classList.toggle('ativo');
}

function modal3() {
    const modal = document.getElementById('modal3');
    
    modal.classList.toggle('animar');
}

dark.addEventListener('click', modal1);
btn1.addEventListener('click', modal1);
btn2.addEventListener('click', modal2);
btn3.addEventListener('click', modal3);