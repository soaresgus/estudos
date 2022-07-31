//Objeto despesa
class Despesa {
    constructor(ano, mes, dia, tipo, descricao, valor) {
        this.ano = ano;
        this.mes = mes;
        this.dia = dia;
        this.tipo = tipo;
        this.descricao = descricao;
        this.valor = valor;
    }

	//Validar os capampos, se são vazios
    validarDados() {
        for (let i in this) {
            if (this[i] == undefined || this[i] == null || this[i] == '') {
                return false;
            }
        }
        return true;
    }
}

//Objeto Bd, controlando o local storage
class Bd {
    constructor() {
        this.id = localStorage.getItem('id');

        if (this.id == null) {
            localStorage.setItem('id', 0);
        }
    }

	//Está incrementando o id do localstorage
    getProximoId() {
        return parseInt(localStorage.getItem('id')) + 1;
    }

	//Está gravando um objeto no localstorage
    gravar(objeto) {
        let id = this.getProximoId();

        localStorage.setItem(id, JSON.stringify(objeto));
        localStorage.setItem('id', id);
        /*Converte um objeto para uma string JSON*/
        //JSON.parse(...) Converte uma string JSON para um objeto. 
    }

	//Recupera todos os registros do localstorage
    recuperarTodosRegistros() {
        let id = localStorage.getItem('id');

        let despesas = [];

        for (let i = 1; i <= id; i++) {
            let despesa = JSON.parse(localStorage.getItem(i));

            if (despesa != null) {
                despesa.id = i;
                despesas.push(despesa);
            }
        }

        return despesas;
    }

	//Filtra os registros do localstorage
    pesquisar(despesa) {
        let despesaFiltrada = []
        despesaFiltrada = this.recuperarTodosRegistros();

        //ano, mes, dia, tipo, descricao, valor

        if (despesa.ano != '') {
            despesaFiltrada = despesaFiltrada.filter(d => d.ano == despesa.ano);
        }

        if (despesa.mes != '') {
            despesaFiltrada = despesaFiltrada.filter(d => d.mes == despesa.mes);
        }

        if (despesa.dia != '') {
            despesaFiltrada = despesaFiltrada.filter(d => d.dia == despesa.dia);
        }

        if (despesa.tipo != '') {
            despesaFiltrada = despesaFiltrada.filter(d => d.tipo == despesa.tipo);
        }

        if (despesa.descricao != '') {
            despesaFiltrada = despesaFiltrada.filter(d => d.descricao == despesa.descricao);
        }

        if (despesa.valor != '') {
            despesaFiltrada = despesaFiltrada.filter(d => d.valor == despesa.valor);
        }

        return despesaFiltrada;

    }

	//Remove um registro do localstorage
    remover(id) {
        localStorage.removeItem(id);
    }
}

let bd = new Bd();

//Função de registrar despesa
function registrarDespesa() {

    let ano = document.getElementById('ano');
    let mes = document.getElementById('mes');
    let dia = document.getElementById('dia');
    let tipo = document.getElementById('tipo');
    let descricao = document.getElementById('descricao');
    let valor = document.getElementById('valor');

    let despesa = new Despesa(
        ano.value,
        mes.value,
        dia.value,
        tipo.value,
        descricao.value,
        valor.value,
    );

	//Caso os campos não sejam vazios
    if (despesa.validarDados()) {

		//Retirando os 0 do dia, caso seja menor que 10
        if (despesa.dia < 10 && despesa.dia.length > 1) {
            despesa.dia = despesa.dia.replaceAll('0', '');
        }

        bd.gravar(despesa);

		//Pegando todos os elementos do objeto despesa e limpando seu value.
        for (let i in despesa) {
            document.getElementById(i).value = '';
        }

        modal('Sucesso no registro', 'Despesa registrada com sucesso!', false);
    } else {
        modal('Erro no registro', 'Preencha todos os campos para continuar!', true);
    }
}

//Adiciona todos os registros na página de consulta
function chamarTodosRegistros(despesas = [], filtro = false) {
    if (despesas.length == 0 && filtro == false) {
        despesas = bd.recuperarTodosRegistros();
    }
    
    let tbody = document.getElementById('tbody');
    tbody.innerHTML = '';
    
    despesas.forEach((d) => {
        let linha = tbody.insertRow();
        
        if (d.dia.length == 1) {
            d.dia = `0${d.dia}`
        }

        if (d.mes < 10) {
            d.mes = `0${d.mes}`
        }
        
        switch (d.tipo) {
            case '1': d.tipo = 'Alimentação'
                break;
                case '2': d.tipo = 'Educação'
                break;
                case '3': d.tipo = 'Lazer'
                break;
                case '4': d.tipo = 'Saúde'
                break;
                case '5': d.tipo = 'Transporte'
                break;
                case '6': d.tipo = 'Contas'
                break;
            }
            
            linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`
            linha.insertCell(1).innerHTML = d.tipo;
            linha.insertCell(2).innerHTML = d.descricao;
            linha.insertCell(3).innerHTML = `R$ ${d.valor}`;
            
            let btn = document.createElement('button');
            btn.className = 'btn btn-danger'
            btn.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>'
            btn.id = `id_despesa_${d.id}`;
            btn.onclick = function () {
                let id = this.id.replace('id_despesa_', '');
                bd.remover(id);
                window.location.reload();
            }
        linha.insertCell(4).append(btn)
    });
    
}

//Pesquisa as despesas
function pesquisarDespesa() {
    let ano = document.getElementById('ano').value;
    let mes = document.getElementById('mes').value;
    let dia = document.getElementById('dia').value;
    let tipo = document.getElementById('tipo').value;
    let descricao = document.getElementById('descricao').value;
    let valor = document.getElementById('valor').value;
    
    let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor);
    
    let despesaFiltrada = bd.pesquisar(despesa);
    
    //Lógica da tabela
    this.chamarTodosRegistros(despesaFiltrada, true);
}

//Gerar um modal do bootstrap
function modal(title, content, danger) {
    let alertaConteudo = document.getElementById('alerta-content');
    let alertaTitle = document.getElementById('alerta-title');
    let alertaBtn = document.getElementById('alerta-btn');

    alertaTitle.textContent = title;
    alertaConteudo.textContent = content;

    if (danger == true) {
        alertaTitle.classList.remove('text-success');
        alertaBtn.classList.remove('btn-success');

        alertaTitle.classList.add('text-danger');
        alertaBtn.classList.add('btn-danger');
    } else {
        alertaTitle.classList.remove('text-danger');
        alertaBtn.classList.remove('btn-danger');

        alertaTitle.classList.add('text-success');
        alertaBtn.classList.add('btn-success');
    }

    $('#alerta').modal('show');

}

//Correção de valores dos campos dia e valor.
document.getElementById('dia').addEventListener('blur', (e) => {
    if (e.target.value > 31) {
        e.target.value = 31;
    }
    
    if (e.target.value != '' && e.target.value < 1) {
        e.target.value = 1;
    }
});

document.getElementById('valor').addEventListener('blur', (e) => {
    if (e.target.value < 0.01) {
        e.target.value = 1;
    }
});
