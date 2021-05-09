<div class="row ">
    <?php if(isset($_SESSION['login'])) { ?>  
        <div class="row">
            <div class="col-auto">
                <form action = "?oldal=galeria"  enctype="multipart/form-data" id="galeriaform" method = "post">
                    <fieldset>
                        <legend>Tölts fel egy újat</legend>
                        <div class="col-auto">
                            <label for="kep">Kép</label>
                            <input type="file" name="kep" class="form-control" id="kep"  accept="image/x-png,image/gif,image/jpeg" required /> 
                        </div>
                        <div class="col-auto">
                            <input class="btn" type="submit" name="feltoltes" value="Feöltés">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

    <?php } ?>

        <div class="row text-center text-lg-left">
                <?php foreach($kepek as $kep){ ?>
                    <div class="col-lg-3 col-md-4 col-6">
                    <img class="img-fluid img-thumbnail" src="./images/<?=$kep['kepnev']?>" />
                    </div>
                <?php } ?>
            </div>
        </div>

<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
