<?php 

session_start();

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

    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 align-self-center offset-md-4 mt-5 text-center">
                    <!-- Alertas -->
                    <?php require 'utils/alerts.php';?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="bg-light mt-4 p-4">
                        <form action="auth/login.php" method="POST" class="row g-3">
                            <h4>Bem-vindo de volta!</h4>
                            <div class="col-12">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-12">
                                <label>Senha</label>
                                <input type="password" name="password" class="form-control" placeholder="Senha" required>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe"> Lembre-se de mim</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark float-end">Login</button>
                            </div>
                        </form>
                        <hr class="mt-4">
                        <div class="col-12">
                            <p class="text-center mb-0">Ainda não tem conta? <a href="#">Cadastra-se</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

	<footer>

	</footer>

	<!-- JavaScript -->
	<script src="/assets/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

	</body>
</html>