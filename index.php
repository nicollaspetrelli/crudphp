<?php 

session_start();

require_once 'auth/verify.php';

/**
*  @object MySQLI Connection Instance
*/
$conn = require_once 'actions/connection.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">

	<title>Nicollas - Crud PHP Procedural</title>
</head>
	<body>

	<?php require_once 'layouts/header.php';?>

	<main>
		<div class="container">
			<div class="header">
				<div class="row">
					<div class="col-md-8">
					<h3>Listagem de Usuários</h3>
					</div>
					<div class="col-md-2 offset-md-2 text-md-end text-sm-start">
						<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal"> <span class="fs-4"><?php include 'assets/icons/icon-add.html' ?></span> Novo Usuário</button>
					</div>
				</div>
			</div>
			<hr>
			
			<!-- Alertas -->
			<?php require_once 'utils/alerts.php';?>

			<table class="table table-bordered table-striped table-responsive-stack" id="tableOne">
				<thead class="table-dark">
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Sobrenome</th>
						<th>Contato</th>
						<th>Data de Nascimento</th>
						<th>Idade</th>
						<th>Status</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php if($result->num_rows <= 0){ ?>
						<tr class="text-center"><td colspan="8">Não há registos disponiveis!</td></tr>
					<?php } ?>

					<?php if($result->num_rows > 0){ 
							foreach($data as $user){
					?>

					<tr class="align-middle justify-content-center">
						<td><?= $user['id'] ?></td>
						<td><?= $user['nome'] ?></td>
						<td><?= $user['sobrenome'] ?></td>
						<td><?= $user['contato'] ?></td>
						<td><?= $user['datanasc'] ?></td>
						<td>
							<?php 
								$idade = 0;
								$datanasc = $user['datanasc'];

								list($anoNasc, $mesNasc, $diaNasc) = explode('-', $datanasc);
	
								$idade = date("Y") - $anoNasc;

								if (date("m") < $mesNasc){
									$idade -= 1;
								} elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc) ){
									$idade -= 1;
								}

								echo "$idade anos";
							?>
						</td>
						<td>
							<?php if ($user['status'] == 1) { ?>
								<div>
									<h5 class="m-0"><span class="badge bg-success">Ativo</span></h5>
								</div>
							<?php } else {?>
								<div>
									<h5 class="m-0"><span class="badge bg-danger">Inativo</span></h5>
								</div>
							<?php }?>
						</td>
						<td>
							<div>
								<a href="index.php?show=<?= $user['id'] ?>" class="btn btn-outline-secondary"><?php include 'assets/icons/icon-eye.html' ?></a>
								<a href="index.php?edit=<?= $user['id'] ?>" class="btn btn-outline-secondary"><?php include 'assets/icons/icon-edit.html' ?></a>
								<a href="index.php?del=<?= $user['id'] ?>" class="btn btn-outline-danger"><?php include 'assets/icons/icon-trash.html' ?></a>
							</div>
						</td>
					</tr>

					<?php }} ?>

				</tbody>
			</table>

		</div>
	</main>


	<?php
		if(!isset($_GET['edit'])){
			require 'create.php';
		}
	?>

	<?php require 'show.php'?>

	<?php
		if(isset($_GET['edit'])){
			require 'edit.php';
		}
	?>

	<?php require 'delete.php'?>

	<footer>

	</footer>

	<!-- JavaScript -->
	<script src="/assets/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function() {
			$('#createBtn').click(function (e) { 
				e.preventDefault();
				$("#createForm").submit();
			});

			$('#editBtn').click(function (e) { 
				e.preventDefault();
				$("#editForm").submit();
			});

			<?php if(isset($_GET['edit'])) { ?>
				$('#editModal').modal('show')
			<?php } ?>

			<?php if(isset($_GET['show'])) { ?>
				$('#showModal').modal('show')
			<?php } ?>

			<?php if(isset($_GET['del'])) { ?>
				$('#deleteModal').modal('show')
			<?php } ?>

			// $('.closeModal').click(function (e) { 
			// 	window.location.href = "/index.php";
			// });


			$("#status").click(function() {
				ckb = $("#status").is(':checked');

				if(ckb){
					$("#loginForm").show();
						$("#login").val('');
						$("#pass").val('');
				} else {
					$("#loginForm").hide();
						$("#login").val('NULL');
						$("#pass").val('NULL');
				}
			});

		});
	</script>

	</body>
</html>