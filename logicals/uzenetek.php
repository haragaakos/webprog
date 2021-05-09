<?php


    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=labor7', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        //Megvizsgáljuk, hogy van e már üzenet táblánk
        $sqltabla = "SHOW TABLES LIKE 'uzenetek'";
        $sth = $dbh->query($sqltabla);
        $rows = $sth->fetchAll();

        //Ha a tábla létezik       
        if( count($rows) > 0){
            $sql = "SELECT * FROM uzenetek ORDER BY datum desc;";
            $sth = $dbh->query($sql);
            $rows = $sth->fetchAll();
            if(!empty($rows)){
                $uzenetek = $rows;
            }
        }else{
            throw new Exception(" Még nincsenek üzenetek!");
        }
        
    }
    catch (PDOException $e) {
        $errormessage .= "Hiba: ".$e->getMessage()."\n";
    }
    catch (Exception $e) {
        $errormessage .= "Hiba: ".$e->getMessage(). "\n";
    }

