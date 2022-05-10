<?php
include 'db.php';

$id = $_GET['id'];
$img = '';
$produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id=" . $id));
mysqli_query($link, " UPDATE produit SET img='" . $img . "'WHERE id =" . $id);
?>



<fieldset data-v-77800238="" class="form-group" id="__BVID__148" aria-labelledby="__BVID__148__BV_label_">
    <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__148__BV_label_">Image principale</legend>
    <div tabindex="-1" role="group" aria-labelledby="__BVID__148__BV_label_">
        <div data-v-7da95bc8="" data-v-77800238="">
            <div data-v-7da95bc8="">

                <div data-v-7da95bc8="" class="ipt-f-container ipt-f-alone" style="height: 487px;">
                    <div data-v-7da95bc8="" class="ipt-f-box-empty bd-dashed" style="padding-top: 0px; height: 341px;margin-left: 0px;">

                        <div class="col-lg-12 col-12 mb-20" style="padding-left: 0px;padding-right: 0px;">
                            <!-- <h6 class="mb-15">Chargez vos photos</h6> -->
                            <!-- <input type="file" name="img1[]" id="img1" multiple class="form-control"> -->
                            <!--  -->

                            <!-- This area will show the uploaded files -->
                            <div id="uploaded_images">

                            </div>

                            <div id="uploaded_images2">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class=" fileinput-button" style="">
                                    <i class="fas fa-photo-video" style="padding-left: 103px;    padding-right: 103px;    padding-top: 150px;    padding-bottom: 150px;"></i>

                                    <!-- The file input field used as target for the file upload widget -->
                                    <input id="fileupload" type="file" name="files" accept="image/x-png, image/gif, image/jpeg" >
                                </span>

                                <!-- The container for the uploaded files -->
                                <div id="files" class="files"></div>
                                <input type="text" name="uploaded_file_name" id="uploaded_file_name" hidden>
                                <br>
                            </div>
                        </div>


                        <!--  -->
                    </div>

                </div>
            </div> <!----> <!---->
        </div> <!----> <!---->
    </div><!----><!----><!---->
</fieldset>


