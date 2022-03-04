<?php

$acao = 'recuperarPendente';
require 'tarefa_controller.php';
?>

<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Lista Tarefas</title>

	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<script>
		function editar(id, texto) {
			//Criar um form
			let form = document.createElement('form');
			form.action = 'index.php?pag=index&acao=atualizar'
			form.method = 'POST';
			form.className = 'row'

			let tarefa = document.getElementById(`tarefa-${id}`);

			//Criar um input
			let input = document.createElement('input');
			input.name = 'tarefa'
			input.type = 'text';
			input.className = 'col-md-7 form-control'
			input.value = texto;

			let inputId = document.createElement('input');
			inputId.name = 'id';
			inputId.type = 'hidden';
			inputId.value = id;

			//Criar um submit
			let button = document.createElement('button');
			button.type = 'submit';
			button.className = 'col-md-3 btn btn-info ml-md-2 mt-md-0 mt-2'
			button.innerHTML = 'Atualizar';

			form.appendChild(input);
			form.appendChild(inputId);
			form.appendChild(button);


			tarefa.innerHTML = '';

			tarefa.insertBefore(form, tarefa[0]);

		}

		function deletar(id) {
			window.location = 'index.php?pag=index&acao=deletar&id=' + id;
		}

		function realizar(id) {
			window.location = 'index.php?pag=index&acao=realizar&id=' + id;
		}
	</script>
</head>

<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				App Lista Tarefas
			</a>
		</div>
	</nav>

	<div class="container app">
		<div class="row">
			<div class="col-md-3 menu">
				<ul class="list-group">
					<a href="#">
						<li class="list-group-item active text-dark">Tarefas pendentes</li>
					</a>
					<a href="nova_tarefa.php">
						<li class="list-group-item text-dark">Nova tarefa</li>
					</a>
					<a href="todas_tarefas.php">
						<li class="list-group-item text-dark">Todas tarefas</li>
					</a>
				</ul>
			</div>

			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Tarefas pendentes</h4>
							<hr />

							<?php foreach ($tarefas as $tarefa_item) { ?>

									<div class="row mb-3 d-flex align-items-center tarefa">
										<!--Foi inserido esse 'htmlspecialchars()' para o PHP tratar os caracteres do HTML, evitando assim ameaças de vulnerabilidade-->
										<div class="col-sm-9" id="tarefa-<?= $tarefa_item['id'] ?>">
											<?= htmlspecialchars($tarefa_item['tarefa']) ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="deletar(<?= $tarefa_item['id'] ?>)"></i>
											<?php if ($tarefa_item['status'] != 'realizado') { ?>

												<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa_item['id'] ?>, '<?= $tarefa_item['tarefa'] ?>')"></i>
												<i class="fas fa-check-square fa-lg text-success" onclick="realizar(<?= $tarefa_item['id'] ?>)"></i>

											<?php } ?>
										</div>
									</div>

							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>