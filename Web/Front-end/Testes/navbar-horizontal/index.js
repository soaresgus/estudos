const btn = document.getElementById('mobile');

function ativarMenu() {
    const menu = document.getElementById('nav');

    menu.classList.toggle('ativo');
}

btn.addEventListener('click', ativarMenu);