<?php
include ('db.php');
$x = $_POST['x'];
$y = $_POST['y'];
$z = $_POST['z'];
$etnom = $_POST['etnom'];
$color = "rgb(" . $x . "," . $y . "," . $z . ")";
mysqli_query($link, "insert into etiquet (etiquet,color)values('" . $etnom . "','" . $color . "') ");
?>
<div>
    <div data-v-4714f8e4="" data-v-20405c76="" class="tags">
        <div data-v-4714f8e4="" class="subtitle header">Etiquettes</div> 
        <div data-v-4714f8e4="">
            <div data-v-4714f8e4="">
                <input  type="text" placeholder="Parcourir les étiquettes..."  class="form-control">
            </div> 
            <div data-v-4714f8e4="" class="tags-list margin-t">

                <?php
                $eti = mysqli_query($link, "SELECT * FROM etiquet ");
                while ($ett = mysqli_fetch_array($eti)) {
                    ?>
                    <div data-v-4714f8e4="" class="tag-block">
                        <div data-v-4714f8e4="" class="tag badge" onclick="diet(<?php echo $ett['id']; ?>)" style="background:<?php echo $ett['color']; ?>;"> <?php echo $ett['etiquet']; ?> </div> 
                    </div>
                    <?php
                }
                ?>

                <button data-v-4714f8e4="" type="button" onclick="fun()" class="btn btn btn-default margin-t edit btn-secondary">Créer une nouvelle étiquette</button>
            </div>



        </div>
    </div>
</div>
