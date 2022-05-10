<div class="modal fade" id="modalsign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div role="document" class="modal-content" id="__BVID__41___BV_modal_content_" aria-labelledby="__BVID__41___BV_modal_header_" aria-describedby="__BVID__41___BV_modal_body_">
            <header class="modal-header" id="__BVID__41___BV_modal_header_">
                <h5 class="modal-title">Signature électronique</h5>
                <i class="" data-bs-dismiss="modal"  aria-label="Close" style="color: #002bff; cursor: pointer" aria-hidden="true" ><button type="button" aria-label="Close" class="close">x</button></i>
            </header>
            <div class="modal-body" id="__BVID__267___BV_modal_body_">
                <div data-v-33681578="" data-v-561bb412="">
               <form method="post" action="" class="sigPad" style="height: 125px;">
                    <input type="hidden" id="idFac" name="idFac" value="<?php echo $facture['id'] ?>">
                    <input type="text" name="name" id="name" class="name" hidden>
                    <ul class="sigNav">
                    <li class="clearButton"><a href="#clear">Clear</a></li>
                    </ul>
                    <div class="sig sigWrapper" style="display: contents;">
                    <div class="typed"></div>
                    <canvas class="pad" width="300" height="100" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);border: ridge;"></canvas>
                    <input type="hidden" name="output" class="output">
                    </div>
                </form>             
                </div>
            </div>
                    <footer data-v-33681578="" class="modal-footer fixed">
                        <button data-v-33681578="" data-bs-dismiss="modal"  aria-label="Close" type="button" class="wuro-link">Annuler</button>
                        <button data-v-33681578="" type="button" class="btn btn btn-default btn-primary btn-secondary" onclick="help()" data-bs-dismiss="modal"  aria-label="Close">Enregistrer
                        </button>
                    </footer>
        </div>
    </div>
</div>
