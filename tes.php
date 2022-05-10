<?php
include 'db.php';
$client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client`"));
?>
<tbody role="rowgroup" class="">
    <tr>
        <td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
            <div class="form-check form-switch">
                <input class="form-check-input"  name="<?php echo $client['id'] ?>" type="checkbox" id="ch_<?php echo $client['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal_' . $d . '"  >
                <label class="form-check-label" for="ch_<?php echo $client['id'] ?>"></label>
                <input type="hidden" id="prdid_<?php echo $client['id'] ?>" value="<?php echo $client['id'] ?>">
            </div>
        </td>
        <td>
            <div><div data-v-143dd668="" class="flex">
                    <span data-v-143dd668="" class="btbt">
                        <span data-v-143dd668="">
                            <span data-v-143dd668="">
                                ' . $letter . ' 
                            </span>
                        </span>
                    </span> 
                    <div data-v-143dd668="" class="flex direction">
                        <div data-v-143dd668="" class="client-name"><?php echo $client['nom'] ?></div>
                    </div>

                </div>

            </div>
        </td>
        <td></td>
        <td>
            <div>
                <div data-v-143dd668="" class="phones flex direction">
                    <div data-v-143dd668="" class="flex center w-auto">
                        <a data-v-143dd668="" href="tel:hrthtr">
                            <i data-v-143dd668="" class="icon subtitles ion-ios-phone-portrait">

                            </i><?php echo $client['tel'] ?> 
                        </a>
                    </div> 
                    <div data-v-143dd668="" class="flex center w-auto">
                        <a data-v-143dd668="" href="tel:thrtht">
                            <i data-v-143dd668="" class="icon subtitles ion-ios-call">

                            </i><?php echo $client['mob'] ?>
                        </a>
                    </div> 
                    <div data-v-143dd668="" class="flex center w-auto">
                        <a data-v-143dd668="" href="email:htrthtr">
                            <i data-v-143dd668="" class="icon subtitles ion-ios-mail">

                            </i><?php echo $client['email'] ?>
                        </a>
                    </div> 
                    <div data-v-143dd668="" class="flex center w-auto">
                        <a data-v-143dd668="" target="_blank" href="https://www.google.com/maps/search/trhrth+trhrth+htrhtr+ththr+France"><i data-v-143dd668="" class="icon subtitles ion-ios-pin"></i>
                            <?php echo $client['adr'] ?>
                        </a>
                    </div>
                </div>
            </div>

        </td>

        <td>

        </td>
        <td>
            <div>
                <div data-v-143dd668="" class="clickable-tags">
                    <div data-v-143dd668="" variant="wuro" class="tag badge permanent" style="background-color:' . $ett['color'] . ' ">
                        <?php echo $client['etiquet'] ?>
                    </div>

                </div>

            </div>
        </td>
        <td>
            <div>
                <div data-v-143dd668="" class="referer flex center">
                    <span data-v-143dd668="" class="client_avatar centered-icon has-tooltip" data-original-title="null">
                        <img data-v-143dd668=""  style="width: 50px;" src="' . $edit['img'] . '">
                    </span>
                </div>
            </div>
        </td>

    </tr>
</tbody>