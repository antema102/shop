<div class="modal fade" id="modalinfop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div role="document" class="modal-content" id="__BVID__41___BV_modal_content_" aria-labelledby="__BVID__41___BV_modal_header_" aria-describedby="__BVID__41___BV_modal_body_">
            <header class="modal-header" id="__BVID__41___BV_modal_header_">
                <h5 class="modal-title"> Modifier les informations</h5>
<!--                <i class="fas fa-times-circle" data-bs-dismiss="modal"  aria-label="Close" style="color: #002bff; cursor: pointer"></i>-->
                <i class="" data-bs-dismiss="modal"  aria-label="Close" style="color: #002bff; cursor: pointer" aria-hidden="true" ><button type="button" aria-label="Close" class="close">×</button></i>
            </header>
            <div class="modal-body" id="__BVID__267___BV_modal_body_">
                <div data-v-33681578="" data-v-561bb412="">
                    <div data-v-33681578="" class="modal-in">
                        <!----> <!----> <!---->
                        <div data-v-33681578="" class="section-10">
                            <div data-v-33681578="" class="row">
                                <div data-v-33681578="" class="col-6">
                                    <div data-v-33681578="" id="companyContactLbl" role="group" aria-labelledby="companyContactLbl__BV_label_" aria-describedby="companyContactLbl__BV_description_" class="form-group">
                                        <label id="companyContactLbl__BV_label_" for="documentPaymentMethods" class="d-block">Devise</label>
                                        <div>
                                            <small tabindex="-1" id="companyContactLbl__BV_description_"  class="form-text text-muted">Devises
                                                disponibles
                                            </small>
                                        </div>
                                    </div>
                                </div> 
                            </div>

                            <div data-v-33681578="" id="quoteLimitDate" role="group"
                                 aria-labelledby="quoteLimitDate__BV_label_"
                                 aria-describedby="quoteLimitDate__BV_description_" class="form-group">
                                <label id="quoteLimitDate__BV_label_" for="documentDate" class="d-block">Date limite de validité de l'offre</label>
                                <div>
                                    <div data-v-33681578="" class="mx-datepicker" first-day-of-week="1">
                                        <div class="mx-input-wrapper">
                                            <input name="date" type="text" autocomplete="off" placeholder="Sélectionnez une date" class="form-control" id="datep">  
                                        </div>

                                    </div>
                                    <small tabindex="-1" id="quoteLimitDate__BV_description_" class="form-text text-muted">Validité de
                                        l'offre
                                    </small>
                                </div>
                            </div>
                            <div data-v-33681578="" id="quotePaymentDelay" role="group"
                                 aria-labelledby="quotePaymentDelay__BV_label_"
                                 aria-describedby="quotePaymentDelay__BV_description_" class="form-group">
                                <label id="quotePaymentDelay__BV_label_" for="documentDate" class="d-block">Délai</label>
                                <div>
                                    <input data-v-33681578="" type="number" name="reg"  id="numb" class="form-control col-md-2">
                                    <small tabindex="-1" id="quotePaymentDelay__BV_description_" class="form-text text-muted">
                                        Délai de paiement (jours)
                                    </small>
                                </div>
                            </div>
                            <div data-v-33681578="" id="companyContactLbl" role="group" aria-labelledby="companyContactLbl__BV_label_" aria-describedby="companyContactLbl__BV_description_" class="form-group">
                                <label
                                    id="companyContactLbl__BV_label_" for="documentPaymentMethods" class="d-block">Modes de paiement
                                </label>
                                <div>
                                    <div data-v-33681578="" id="paymentMethods" role="group" tabindex="-1" class="">
                                        <div data-v-33681578="" class="custom-control custom-control-inline custom-checkbox">
                                            <input type="checkbox" name="paymentMethods" id="ver" autocomplete="off" class="custom-control-input" value="0" >
                                            <label class="custom-control-label" for="ver">Virement</label>
                                        </div>
                                        <div data-v-33681578="" class="custom-control custom-control-inline custom-checkbox">
                                            <input type="checkbox" name="paymentMethods" id="ch" autocomplete="off" class="custom-control-input" value="0" >
                                            <label class="custom-control-label" for="ch">Chèque</label>
                                        </div>
                                        <div data-v-33681578="" class="custom-control custom-control-inline custom-checkbox">
                                            <input type="checkbox" name="paymentMethods" autocomplete="off" id="cb" class="custom-control-input" value="0" >
                                            <label class="custom-control-label" for="cb">Carte bancaire</label> 
                                        </div>
                                        <div data-v-33681578="" class="custom-control custom-control-inline custom-checkbox">
                                            <input type="checkbox" name="paymentMethods" autocomplete="off" id="espece" class="custom-control-input" value="0" >
                                            <label class="custom-control-label" for="espece">Espèces</label>
                                        </div>

                                    </div>
                                    <small tabindex="-1" id="companyContactLbl__BV_description_" class="form-text text-muted">
                                        Méthodes de paiement autorisées pour régler cette facture
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer data-v-33681578="" class="modal-footer fixed">
                        <button data-v-33681578="" data-bs-dismiss="modal"  aria-label="Close" type="button" class="wuro-link">Annuler</button>
                        <button data-v-33681578="" type="button" class="btn btn btn-default btn-primary btn-secondary" onclick="devinfo()" data-bs-dismiss="modal"  aria-label="Close">Enregistrer
                        </button>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
