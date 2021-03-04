<?php  if (isset($_SESSION['alert'])) { ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span><?php echo $_SESSION['alert'] ?></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php  unset($_SESSION['alert']); } ?>

<?php  if (isset($_SESSION['error'])) { ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span><?php echo $_SESSION['error'] ?></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php  unset($_SESSION['error']); } ?>