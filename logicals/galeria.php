<?php

if(isset($_FILES['kep']) && isset($_SESSION['login'])) {
    try {
        // Fájlfeltöltés...
        $file = $_FILES['kep'];
 
        if( !($file['size'] > 0 && $file['size'] < (8*1024*1024*5))){
            throw new Exception("A fájl üres vagy meghaladta az 5 mb méretkorlátot!");
        }
        $celmappa = "./images/";
        copy($file['tmp_name'],$celmappa.$file['name']);

        
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=labor7', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        //Megvizsgáljuk, hogy van e már üzenet táblánk
        $sqltabla = "SHOW TABLES LIKE 'galeria'";
        $sth = $dbh->query($sqltabla);
        $rows = $sth->fetchAll();

        //Ha a tábla nem létezik
        if( !(count($rows) > 0)){
            $sqlTablaLetrehoz = "
                CREATE TABLE galeria (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                kepnev VARCHAR(255) NOT NULL,
                felhasznalo VARCHAR(255) NOT NULL,
                datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)
            ";   
            if($dbh->query($sqlTablaLetrehoz) == false){
               throw new Exception('Nem sikerült létrehozni a táblát, ellenőrizze a kapcsolatot!');
            }
        }

        // Felhsználó keresése
        $felhasznalo = $_SESSION["login"];
        $faljnev = $file["name"];
        $sqlKepMentese= "insert into galeria(kepnev,felhasznalo)
        VALUES(:kepnev,:felhasznalo )";
        $stmt = $dbh->prepare($sqlKepMentese); 
        $stmt->execute(array(':kepnev' => $faljnev, ':felhasznalo' =>$felhasznalo )); 
        if($count = $stmt->rowCount()) {
            $uzenet = "Az kep mentése sikeres";   
            unset($_FILES['kep']);
        }
        else {
            throw new Exception('Nem sikerült elmenteni a kepet!');
        }
        
    }
    catch (PDOException $e) {
        $errormessage .= "Hiba: ".$e->getMessage()."\n";
    }
    catch (Exception $e) {
        $errormessage .= "Hiba: ".$e->getMessage(). "\n";
    }

}


try {
    // Kapcsolódás
    $dbh = new PDO('mysql:host=localhost;dbname=labor7', 'root', '',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    
    //Megvizsgáljuk, hogy van e már üzenet táblánk
    $sqltabla = "SHOW TABLES LIKE 'galeria'";
    $sth = $dbh->query($sqltabla);
    $rows = $sth->fetchAll();

    //Ha a tábla létezik       
    if( count($rows) > 0){
        $sql = "SELECT * FROM galeria ORDER BY datum desc;";
        $sth = $dbh->query($sql);
        $rows = $sth->fetchAll();
        if(!empty($rows)){
            $kepek = $rows;
        }
    }else{
        throw new Exception("Még nincsenek kepek!");
    }
    
}
catch (PDOException $e) {
    $errormessage = "Hiba: ".$e->getMessage()."\n";
}
catch (Exception $e) {
    $errormessage = "Hiba: ".$e->getMessage(). "\n";
}



?>
