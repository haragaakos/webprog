<?php if(isset($_POST['uzenet'])) { ?>
    <div class="row">
        <div class="col-12">
            <h1>Köszönjük, üzenetét megkaptuk</h1>
            <h3>Hamarosan felvesszük önnel a kapcsolatot a megadott email címen keresztül.</h3>
            <div class="row">
            <div class="col-12">
                <h4>Üzenete:</h4>
                <p><?= $_POST['uzenet'] ?></p>
            </div>
        </div>
    </div>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
