<header class="mb-5">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h4 class="m-0 mb-1 d-inline">Nicollas CRUD - PHP</h4>
                <p class="text-muted m-0">Logado como: <?php echo $username = (isset($_SESSION['user'])) ? $_SESSION['user']['nome'] : '' ?></p>
            </a>
            <div class="col-md-6 text-md-end text-sm-start d-inline">
                <a href="auth/logout.php" class="btn btn-light">Sair</a>
            </div>
        </div>
    </nav>
</header>