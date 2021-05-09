<?php

if(isset($_POST['uzenet']) && isset($_SESSION['login'])) {
    try {



        if(strlen(trim($_POST['uzenet'])) == 0){
            throw new Exception("Tötlse ki az üzenetet");
        }
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=labor7', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        //Megvizsgáljuk, hogy van e már üzenet táblánk
        $sqltabla = "SHOW TABLES LIKE 'uzenetek'";
        $sth = $dbh->query($sqltabla);
        $rows = $sth->fetchAll();

        //Ha a tábla nem létezik
        if( !(count($rows) > 0)){
            $sqlTablaLetrehoz = "
                CREATE TABLE uzenetek (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                felhasznalo VARCHAR(255) NOT NULL,
                uzenet text NOT NULL,
                datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)
            ";   
            if($dbh->query($sqlTablaLetrehoz) == false){
               throw new Exception('Nem sikerült létrehozni a táblát, ellenőrizze a kapcsolatot!');
            }
        }

        // Felhsználó keresése
        $felhasznalo = $_SESSION["login"];
        $uzenet = $_POST["uzenet"];
        $sqlUzenetMentese= "insert into uzenetek(felhasznalo, uzenet)
        VALUES(:felhasznalo , :uzenet)";
        $stmt = $dbh->prepare($sqlUzenetMentese); 
        $stmt->execute(array(':felhasznalo' => $_SESSION['login'], ':uzenet' => $_POST['uzenet'])); 
        if($count = $stmt->rowCount()) {
            $uzenet = "Az üzenet mentése sikeres";   
        }
        else {
            throw new Exception('Nem sikerült elmenteni az üzenetet!');
        }
        
    }
    catch (PDOException $e) {
        $errormessage .= "Hiba: ".$e->getMessage()."\n";
    }
    catch (Exception $e) {
        $errormessage .= "Hiba: ".$e->getMessage(). "\n";
    }

}
else {
    header("Location: .");
}
?>
