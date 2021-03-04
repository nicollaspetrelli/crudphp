<?php if(isset($_GET['edit'])) { ?>


<?php

    $idEdit = $_GET['edit'];

    $sqlEdit = "SELECT * FROM usuarios WHERE id = '{$idEdit}'";

    $resultEdit = $conn->query($sqlEdit);

    if($resultEdit->num_rows <= 0){
        $conn->close();
        header('Location: index.php');
        return;
    }

    $dataEdit = $resultEdit->fetch_assoc();

    $conn->close();

?>

<!-- Modal -->

<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar um Usuário</h5>
            <button type="button" class="btn-close closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="/actions/edit.php" method="post" id="editForm">

                <input type="hidden" name="id" value="<?= $idEdit ?>" />

                <div class="mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?= $dataEdit['nome'] ?>">
                </div>

                <div class="mb-3">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome" value="<?= $dataEdit['sobrenome'] ?>">
                </div>

                <div class="mb-3">
                    <label for="contato">Contato</label>
                    <input type="text" class="form-control" name="contato" id="contato" placeholder="Contato" value="<?= $dataEdit['contato'] ?>">
                </div>

                <div class="mb-3">
                    <label for="datanasc">Data de Nascimento</label>
                    <input type="date" class="form-control" name="datanasc" id="datanasc" placeholder="dd/mm/yyyy" value="<?= $dataEdit['datanasc'] ?>">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status" value="1" <?php echo $dataEdit['status'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status">Esse usuário está ativo?</label>
                </div>

                <div id="loginForm">
                    <hr>
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Login" required value="<?= $dataEdit['login'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password" id="pass" placeholder="Senha" required">
                    </div>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" id="editBtn">Atualizar</button>
        </div>
        </div>
    </div>
</div>

<?php } ?>
