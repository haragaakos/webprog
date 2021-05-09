<div class="row g-3">
    <div class="col-md-6 text-center">
    <h1> Üzenetek </h1> 
    <?php if(!empty($uzenetek)){ ?>
        <table> 
        <thead>
            <tr>
                <td>
                    Időpont
                </td>
                <td>
                    Felhasznaló
                </td>
                <td>
                    Üzenet
                </td>
            </tr>
        </thead> 
        <tbody>      
        <?php foreach($uzenetek as $uzenet){ ?>
            <tr>
                <td>
                <?=$uzenet['datum']?>
                </td>
                <td>
                <?=$uzenet['felhasznalo']?>
                </td>
                <td>
                    <?=$uzenet['uzenet']?>
                </td>
            </tr>
        <?php } ?>
        </tbody> 
        </table>
    <?php }else{ ?>
    
    <?php }?>
    </div>
</div>
