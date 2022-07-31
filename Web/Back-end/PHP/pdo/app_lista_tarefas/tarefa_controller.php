<?php

    require '../../../app_lista_tarefas/conexao.php';
    require '../../../app_lista_tarefas/tarefa.model.php';
    require '../../../app_lista_tarefas/tarefa.service.php';

    //Esses requires foram feitos assim pois esse arquivo será usado em outro arquivo, então nesse outro arquivo ele só consegue
    //acesar dessa forma.

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir') {
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();

        header('Location: nova_tarefa.php?estado=1');
    } else if($acao == 'recuperar') {
        $conexao = new Conexao();
        $tarefa = new Tarefa();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();

    } else if($acao == 'atualizar') {
        $conexao = new Conexao();
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id']);
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->atualizar() > 0) {
            $tarefaService->atualizar();
        }

        if(isset($_GET['pag']) && $_GET['pag'] != 'index') {
            header('Location: todas_tarefas.php');
        }else {
            header('Location: index.php');
        }

    }else if($acao == 'deletar') {
        $conexao = new Conexao();
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->deletar();
        if(isset($_GET['pag']) && $_GET['pag'] != 'index') {
            header('Location: todas_tarefas.php');
        }else {
            header('Location: index.php');
        }

    }else if($acao == 'realizar') {
        $conexao = new Conexao();
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->realizar();
        if(isset($_GET['pag']) && $_GET['pag'] != 'index') {
            header('Location: todas_tarefas.php');
        }else {
            header('Location: index.php');
        }

    }else if($acao == 'recuperarPendente') {
        $conexao = new Conexao();
        $tarefa = new Tarefa();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarPendente();
    }
?>
