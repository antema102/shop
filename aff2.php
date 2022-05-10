<?php
include ('db.php');
$id = $_POST['id'];
$ett = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM etiquet where id=" . $id . " "));
?>
<div class="col-md-2" id="divv_<?php echo $ett['id']; ?>" style="width:auto;height: 36px ;text-align: center;">
    <div class="tag badge permanent"  onclick="org(<?php echo $ett['id']; ?>)"  style="background-color: <?php echo $ett['color']; ?>;"><?php echo $ett['etiquet']; ?>
        <input type="checkbox" name="check_list[]" value="<?php echo $ett['id']; ?>" checked >
    </div>
</div>