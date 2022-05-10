<?php
include ('db.php');
$title = $_GET['title'];
?>


<div data-v-561bb412="" data-bs-toggle="modal" data-bs-target="#modalinfo" id="title">
    <div data-v-561bb412=""  class="quote-title editable inline-block " >
        <span data-v-561bb412="" class=""  >
            <?php echo $title ?>
            <input type="hidden" name="titre" value="<?php echo $title ?>">
        </span>
    </div>
</div>

