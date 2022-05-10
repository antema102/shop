<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <meta name="theme-color" content="#4bddd3">
    <title>Detail Devis </title>
    <meta name="description">
    <link href="data.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="http://www.shoppassiondecor.fr/static/icon.png">
    <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="http://www.shoppassiondecor.fr/static/style.css" rel="stylesheet">
    <link href="http://www.shoppassiondecor.fr/static/dev.css?v=1.0" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="dist/assets/jquery.signaturepad.css" rel="stylesheet">


 <div class="modal fade" id="emailForm" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div role="document" class="modal-content" id="__BVID__2___BV_modal_content_" aria-labelledby="__BVID__2___BV_modal_header_" aria-describedby="__BVID__2___BV_modal_body_">
            <header class="modal-header" id="__BVID__2___BV_modal_header_">
                <h5 class="modal-title">Partager par e-mail</h5>
				<i class="" data-bs-dismiss="modal"  aria-label="Close" style="color: #002bff; cursor: pointer" aria-hidden="true" >
				<button type="button" aria-label="Close" class="close">×</button></i>
            </header>
            <div class="modal-body" id="__BVID__2___BV_modal_body_">
                <div data-v-33681578="" data-v-561bb412="">

                    <div data-v-33681578="" class="">
                    <div id="loadingEmail"  style="display: none; width: 100%; text-align: center;">
                            <img  src="images/loading.gif" width="50" height="50">
                        </div>
                        <div id="messageEmail">
                            
                        </div>
                        <div class="">
                          <input type="email"  placeholder="" class="form-control" id="mailto" name = "emailClient" value="">
                        </div>
                    </div>    
                    <footer data-v-33681578="" class="modal-footer fixed">
                        <button data-v-33681578="" data-bs-dismiss="modal"  aria-label="Close" type="button" class="wuro-link">Annuler</button>
                        <button data-v-33681578="" type="button" class="btn btn btn-default btn-primary btn-secondary" onclick="sendEmail()" style="background-color: var(--primary);" aria-label="Close">Envoyer
                        </button>
                    </footer>
                </div>
               
            </div>
        </div>
    </div>
</div>
</body>
</html>