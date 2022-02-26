const btn = document.getElementById('mobile');
const btn2 = document.getElementById('close-mobile');
const nav = document.getElementById('nav');

function abrirMenu() {
    nav.classList.toggle('ativo');

    if(nav.classList.contains('ativo')) {
        window.scrollTo(0, 0);
        document.getElementById('dark').style.visibility = 'visible';
        document.getElementById('dark').style.opacity = 1;
        document.documentElement.style.overflow = 'hidden';
        
    }else {
        document.getElementById('dark').style.opacity = 0;
        document.getElementById('dark').style.visibility = 'hidden';
        document.documentElement.style.overflow = 'auto';
    }
}

function fecharMenu() {
    nav.classList.remove('ativo');
    document.getElementById('dark').style.opacity = 0;
    document.getElementById('dark').style.visibility = 'hidden';
    document.documentElement.style.overflow = 'auto';
}

document.getElementById('dark').addEventListener('click', fecharMenu);
btn.addEventListener('click', abrirMenu);
btn2.addEventListener('click', abrirMenu);