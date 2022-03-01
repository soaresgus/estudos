function cursorAnimation(cursor_id, texto_id, segundos_escrita, apagar, tempoApagar) {
    let texto_content = document.getElementById(texto_id).textContent;

    document.getElementById(texto_id).textContent = '';

    let letras = [...texto_content];

    let i = 0;

    let cursor = document.getElementById(cursor_id);

    let escrita = setInterval(() => {
        document.getElementById(texto_id).textContent += letras[i];

        cursor.style.marginLeft = `${document.getElementById(texto_id).offsetWidth}px`;

        i++;

        if (i >= letras.length) {
            clearInterval(escrita);

            if (apagar) {
                let timer = setInterval(() => {
                    i--;
                    let escritaApagar = setInterval(() => {
                        letras.pop();
                        document.getElementById(texto_id).textContent = letras.toString().replace(/,/g,'')

                        cursor.style.marginLeft = `${document.getElementById(texto_id).offsetWidth}px`;

                        i--;

                        if (i <= -1) {
                            clearInterval(escritaApagar);
                        }
                    }, segundos_escrita * 500);
                    clearInterval(timer);
                }, tempoApagar*1000);
            }
        }
    }, segundos_escrita * 1000);

    let x = 0;
    setInterval(() => {
        x++;
        if (i <= 0 || i >= letras.length) {
            if(x % 2 == 0) {
                cursor.style.visibility = 'hidden';
            }else {
                cursor.style.visibility = 'visible';
            }
        }
    }, 400);
}

cursorAnimation('cursor', 'escrita', 0.1, true, 5);