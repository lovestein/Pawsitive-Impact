<?php
if (isset($_SESSION['message'])) {
?>
    <div class="alert alert-warning postion-fixed alert-dismissible fade show text-center" role="alert">
        <strong><?= $_SESSION['message']; ?></strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>