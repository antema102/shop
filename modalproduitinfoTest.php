<div class="modal fade" id="modalinfoprdTest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div role="document" class="modal-content" id="__BVID__41___BV_modal_content_" aria-labelledby="__BVID__41___BV_modal_header_" aria-describedby="__BVID__41___BV_modal_body_">
            <header class="modal-header" id="__BVID__41___BV_modal_header_">
                <h5 class="modal-title">Ajouter des produits</h5>
                <i class="" data-bs-dismiss="modal"  aria-label="Close" style="color: #002bff; cursor: pointer" aria-hidden="true" ><button type="button" aria-label="Close" class="close">×</button></i>
            </header>
            <div class="modal-body" id="__BVID__41___BV_modal_body_">
                <div data-v-33681578="" data-v-561bb412="">
                    <div id="productList">
                        <div data-v-33681578="" >
                            <div data-v-33681578="" >
                                <input data-v-33681578=""  type="text" placeholder="Produit" id="produit" class="form-control" >
                            </div>

                        </div>
                        <div data-v-33681578="" data-v-561bb412="" style="margin-top: 20px !important;">
                            <div data-v-33681578="" >
                                <input data-v-33681578="" name="quantity" type="number" min="1" id="qte" onkeyup="if(this.value<0)this.value=1" class="form-control" >
                            
                            </div>
                        </div>
                    </div>
                    <br>
                    <div data-v-33681578="" id="productButt" style="">
                        <button data-v-33681578="" style=" margin-bottom: 20px;" type="button" class="btn btn btn-default btn-alert btn-secondary" onclick="funProduct()">Ajouter un nouveau produit</button>
                    </div>

                    <div data-v-33681578="" id="productNew" style="display: none;">                            
                                    
                                    <div role="group" class="form-group">
                                        <label for="ref" class="d-block" id="__BVID__140__BV_label_">Référence</label>
                                        <input data-v-77800238="" name="ref"  id="ref" type="text" placeholder="" class="form-control">
                                        <small tabindex="-1" class="form-text text-muted" id="__BVID__140__BV_description_">Numero unique du produit</small>
                                    </div>                               
                                    <div role="group" class="form-group">
                                        <label for="productName" class="d-block" id="__BVID__142__BV_label_">Nom</label>
                                        <input data-v-77800238="" id="nom" name="nom" type="text" placeholder="" class="form-control">
                                    </div>
                                    <div role="group" class="form-group">
                                        <label for="cat" class="d-block" id="__BVID__163__BV_label_">Catégorie</label>
                                        <select data-v-1b70f5f4="" class="mb-3 custom-select" name="cat" id="cat">
                                            <option data-v-1b70f5f4="" value=""></option> 
                                            <?php
                                            $cat = mysqli_query($link, "SELECT * FROM `cat`");
                                            while ($cat_data = mysqli_fetch_array($cat)) {
                                                ?>
                                                <option data-v-1b70f5f4="" value="<?php echo $cat_data['id']; ?>"><?php echo $cat_data['cat']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <small tabindex="-1" class="form-text text-muted" id="__BVID__163__BV_description_">Catégorie dans laquelle se trouve le produit</small>
                                    </div>                                 
                                    <div role="group" class="form-group">
                                    <label for="" class="d-block" id="">Quantité</label>
                                    <input data-v-33681578="" name="quantity" type="number" min="1" id="quantite" onkeyup="if(this.value<0)this.value=1" class="form-control" >
                                    </div>      
                                    <?php if($admin['role'] == '1') {  ?>
                                    <div role="group" class="form-group" aria-labelledby="__BVID__144__BV_label_">
                                        <label for="__BVID__145" class="d-block" id="__BVID__144__BV_label_">Nom Fournisseur</label>
                                        <input data-v-77800238="" name="code" type="text" placeholder="Fournisseur" class="form-control" id="fournisseur">
                                    </div>                
                                    <?php } ?>
                                    <div role="group" class="form-group">
                                        <label for="productPriceHT" class="d-block" id="__BVID__152__BV_label_">Prix HT (€)</label>
                                        <input data-v-77800238="" id="productPriceHT" onblur="calculM()" name="prixht" type="number" placeholder="" step="0.01" class="form-control">
                                    </div>
                                    <div data-v-77800238="" role="group" class="form-group" id="" onchange="calculM()" aria-labelledby="__BVID__154__BV_label_">
                                    <label for="productTvaRate" class="d-block" id="__BVID__154__BV_label_">TVA</label>
                                    <div>
                                        <select data-v-77800238="" class="custom-select" name="tva" id="tva">
                                            <option data-v-77800238="" value="0">0%</option>
                                            <option data-v-77800238="" value="5">5%</option>
                                            <option data-v-77800238="" value="10">10%</option>
                                            <option data-v-77800238="" value="20">20%</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div data-v-77800238="" class="" id="blockt1">
                                    <div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_">
                                        <label for="productPriceTTC1" class="d-block" id="__BVID__156__BV_label_">Prix TTC (€)</label>

                                        <input data-v-77800238="" id="productPriceTTC1" type="number" name="prixttc" placeholder="" step="0.01" class="form-control" disabled>
                                    </div>
                                    </div>
                                    <div role="group" class="form-group">
                                        <label for="coutachat" class="d-block" id="__BVID__158__BV_label_">Coût d'achat (€)</label>
                                        <input data-v-77800238="" id="coutachat" onchange="calculMargeM()" name="coutachat" type="number" placeholder="" step="0.01" class="form-control"><!----><!----><!---->
                                    </div>                                   
                                    <div role="group" class="form-group">
                                        <label for="productEcotax" class="d-block" id="__BVID__160__BV_label_">Coefficient multiplicateur</label>
                                        <input data-v-77800238="" id="productEcotax" type="number" placeholder="" name="eco" step="0.01" class="form-control"><!----><!----><!---->
                                    </div>
                                    <div data-v-77800238="" class="" id="blockmarge">
                                    <div data-v-77800238="" role="group" class="form-group" id="__BVID__162" aria-labelledby="__BVID__162__BV_label_">
                                        <label for="margecomm" class="d-block" id="__BVID__162__BV_label_">Marge Commerciale (€)</label>
                                        <input data-v-77800238="" id="margecomm" type="number" name="marge" placeholder="" step="0.01" class="form-control">
                                    </div>
                                    </div>                            
                                    <div role="group" class="form-group">
                                        <label for="courtransport" class="d-block" id="__BVID__191__BV_label_">Cour Transport</label>
                                        <input data-v-77800238="" id="courtransport" onchange="" name="courtransport" type="text" placeholder="" step="0.01" class="form-control"><!----><!----><!---->
                                    </div>
                                    <div data-v-33681578="" id="">
                                        <button data-v-33681578="" style=" margin-bottom: 20px;" onclick="funProduct2()" type="button" class="btn btn btn-default btn-alert btn-secondary">Choisir un produit existant</button>
                                    </div>                                          
                    </div>
                </div>
            </div>
            <footer data-v-33681578="" class="modal-footer fixed">
                        <button data-v-33681578="" type="button" class="wuro-link" data-bs-dismiss="modal"  aria-label="Close">Annuler</button>
                        <button data-v-33681578="" type="button"
                                class="btn btn btn-default btn-primary btn-secondary" onclick="productFac()"  aria-label="Close">Enregistrer
                        </button>
            </footer>
        </div>
    </div>
</div>
