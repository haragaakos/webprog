<?php if(isset($_POST['uzenet'])) { ?>
    <?php echo $_POST['uzenet']; ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
