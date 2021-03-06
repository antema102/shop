<div class="modal fade" id="modalinfoliv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div role="document" class="modal-content" id="__BVID__41___BV_modal_content_" aria-labelledby="__BVID__41___BV_modal_header_" aria-describedby="__BVID__41___BV_modal_body_">
            <header class="modal-header" id="__BVID__180___BV_modal_header_">
                <h5 class="modal-title">Modifier les informations</h5>
                <i class="" data-bs-dismiss="modal"  aria-label="Close" style="color: #002bff; cursor: pointer" aria-hidden="true" ><button type="button" aria-label="Close" class="close">x</button></i>
            </header>
            <div class="modal-body" id="__BVID__180___BV_modal_body_">
                <div data-v-33681578="" data-v-561bb412="">
                    <div data-v-33681578="" class="modal-in">
                        <div data-v-33681578="" class="section-8"> 
                            <div data-v-33681578="" id="shippingLbl" role="group" aria-labelledby="shippingLbl__BV_label_" aria-describedby="shippingLbl__BV_description_" class="form-group">
                                <label id="shippingLbl__BV_label_" for="documentShipping" class="d-block">Mode de livraison</label>
                                <div>
                                    <input data-v-33681578="" type="text" placeholder="Mode de livraison" id="mol" name="mol" class="form-control"> 
                                    <div data-v-33681578="" class="row margin-t">
                                        <div data-v-33681578="" style="margin-top: 18px;">
                                            <input data-v-33681578="" type="number" min="0" max="99999999" id="frl" name="frl" placeholder="Frais de livraison" class="form-control">
                                        </div> 
                                    </div>
                                    <small tabindex="-1" id="shippingLbl__BV_description_" class="form-text text-muted">Mode de livraison et frais </small>
                                </div>
                            </div> 
                            <h6 data-v-33681578="">Adresse de livraison : </h6> 
                            <div data-v-33681578="" id="adr">
                                <button data-v-33681578="" style=" margin-bottom: 20px;" type="button" class="btn btn btn-default btn-alert btn-secondary" onclick="func()">Utiliser une adresse diff??rente</button>
                            </div>

                            <div data-v-33681578="" id="adr2" style="display: none;">

                                <div data-v-33681578="" id="deliveryStreetLbl" role="group" aria-labelledby="deliveryStreetLbl__BV_label_" aria-describedby="deliveryStreetLbl__BV_description_" class="form-group">
                                    <label id="deliveryStreetLbl__BV_label_" for="deliveryStreet" class="d-block">Adresse de livraison</label>
                                    <div>
                                        <input data-v-33681578="" id="adrliv" name="adrliv" type="text" placeholder="Adresse de l'entreprise" class="form-control" aria-describedby="deliveryStreetLbl__BV_description_"> 
                                        <div data-v-33681578="" class="row margin-t" style="margin-top: 20px;">
                                            <div data-v-33681578="" class="col-3">
                                                <div data-v-33681578="" class="suggest-wrap">
                                                    <input placeholder="Code postal" name="cp" id="cp" type="text" class="form-control"> 

                                                </div>
                                            </div> 
                                            <div data-v-33681578="" class="col-5">
                                                <div data-v-33681578="" class="suggest-wrap">
                                                    <input placeholder="Ville" name="villel" id="villel" type="text" class="form-control"> 

                                                </div>
                                            </div> 
                                            <div data-v-33681578="" class="col-4">
                                                <select data-v-33681578="" class="custom-select" name="paysl" id="paysl">
                                                    <option value="France">France</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Afrique du Sud">Afrique du Sud</option>
                                                    <option value="Albanie">Albanie</option>
                                                    <option value="Alg??rie">Alg??rie</option>
                                                    <option value="Allemagne">Allemagne</option>
                                                    <option value="Andorre">Andorre</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctique">Antarctique</option>
                                                    <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option><option value="Antilles n??erlandaises">Antilles n??erlandaises</option>
                                                    <option value="Arabie saoudite">Arabie saoudite</option>
                                                    <option value="Argentine">Argentine</option>
                                                    <option value="Arm??nie">Arm??nie</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australie">Australie</option>
                                                    <option value="Autriche">Autriche</option>
                                                    <option value="Azerba??djan">Azerba??djan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahre??n">Bahre??n</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbade">Barbade</option>
                                                    <option value="B??larus">B??larus</option>
                                                    <option value="Belgique">Belgique</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="B??nin">B??nin</option>
                                                    <option value="Bermudes">Bermudes</option>
                                                    <option value="Bhoutan">Bhoutan</option>
                                                    <option value="Bolivie">Bolivie</option>
                                                    <option value="Bosnie-Herz??govine">Bosnie-Herz??govine</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Br??sil">Br??sil</option>
                                                    <option value="Brun??i Darussalam">Brun??i Darussalam</option>
                                                    <option value="Bulgarie">Bulgarie</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodge">Cambodge</option>
                                                    <option value="Cameroun">Cameroun</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cap-Vert">Cap-Vert</option>
                                                    <option value="Ceuta et Melilla">Ceuta et Melilla</option>
                                                    <option value="Chili">Chili</option>
                                                    <option value="Chine">Chine</option>
                                                    <option value="Chypre">Chypre</option>
                                                    <option value="Colombie">Colombie</option>
                                                    <option value="Comores">Comores</option>
                                                    <option value="Congo-Brazzaville">Congo-Brazzaville</option>
                                                    <option value="Cor??e du Nord">Cor??e du Nord</option>
                                                    <option value="Cor??e du Sud">Cor??e du Sud</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="C??te d???Ivoire">C??te d???Ivoire</option>
                                                    <option value="Croatie">Croatie</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Danemark">Danemark</option>
                                                    <option value="Diego Garcia">Diego Garcia</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominique">Dominique</option>
                                                    <option value="??gypte">??gypte</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="??mirats arabes unis">??mirats arabes unis</option>
                                                    <option value="??quateur">??quateur</option>
                                                    <option value="??rythr??e">??rythr??e</option>
                                                    <option value="Espagne">Espagne</option>
                                                    <option value="Andalousie (Espagne)">Andalousie (Espagne)</option>
                                                    <option value="Estonie">Estonie</option>
                                                    <option value="??tat de la Cit?? du Vatican">??tat de la Cit?? du Vatican</option>
                                                    <option value="??tats f??d??r??s de Micron??sie">??tats f??d??r??s de Micron??sie</option>
                                                    <option value="??tats-Unis">??tats-Unis</option>
                                                    <option value="??thiopie">??thiopie</option>
                                                    <option value="Fidji">Fidji</option>
                                                    <option value="Finlande">Finlande</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambie">Gambie</option>
                                                    <option value="G??orgie">G??orgie</option>
                                                    <option value="G??orgie du Sud et les ??les Sandwich du Sud">G??orgie du Sud et les ??les Sandwich du Sud</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Gr??ce">Gr??ce</option><option value="Grenade">Grenade</option>
                                                    <option value="Groenland">Groenland</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernesey">Guernesey</option>
                                                    <option value="Guin??e">Guin??e</option>
                                                    <option value="Guin??e ??quatoriale">Guin??e ??quatoriale</option>
                                                    <option value="Guin??e-Bissau">Guin??e-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Guyane fran??aise">Guyane fran??aise</option>
                                                    <option value="Ha??ti">Ha??ti</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hongrie">Hongrie</option>
                                                    <option value="??le Bouvet">??le Bouvet</option>
                                                    <option value="??le Christmas">??le Christmas</option>
                                                    <option value="??le de l'Ascension">??le de l'Ascension</option>
                                                    <option value="??le de Man">??le de Man</option>
                                                    <option value="??le Norfolk">??le Norfolk</option>
                                                    <option value="??les ??land">??les ??land</option>
                                                    <option value="??les Ca??mans">??les Ca??mans</option>
                                                    <option value="??les Canaries">??les Canaries</option>
                                                    <option value="??les Cocos - Keeling">??les Cocos - Keeling</option>
                                                    <option value="??les Cook">??les Cook</option>
                                                    <option value="??les F??ro??">??les F??ro??</option>
                                                    <option value="??les Heard et MacDonald">??les Heard et MacDonald</option>
                                                    <option value="??les Malouines">??les Malouines</option>
                                                    <option value="??les Mariannes du Nord">??les Mariannes du Nord</option>
                                                    <option value="??les Marshall">??les Marshall</option>
                                                    <option value="??les Mineures ??loign??es des ??tats-Unis">??les Mineures ??loign??es des ??tats-Unis</option>
                                                    <option value="??les Salomon">??les Salomon</option>
                                                    <option value="??les Turks et Ca??ques">??les Turks et Ca??ques</option>
                                                    <option value="??les Vierges britanniques">??les Vierges britanniques</option>
                                                    <option value="??les Vierges des ??tats-Unis">??les Vierges des ??tats-Unis</option>
                                                    <option value="Inde">Inde</option>
                                                    <option value="Indon??sie">Indon??sie</option>
                                                    <option value="Irak">Irak</option>
                                                    <option value="Iran">Iran</option><option value="Irlande du Sud">Irlande du Sud</option><option value="Islande">Islande</option><option value="Isra??l">Isra??l</option><option value="Italie">Italie</option><option value="Jama??que">Jama??que</option><option value="Japon">Japon</option><option value="Jersey">Jersey</option><option value="Jordanie">Jordanie</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kirghizistan">Kirghizistan</option><option value="Kiribati">Kiribati</option><option value="Kowe??t">Kowe??t</option><option value="Laos">Laos</option><option value="Lesotho">Lesotho</option><option value="Lettonie">Lettonie</option><option value="Liban">Liban</option><option value="Lib??ria">Lib??ria</option><option value="Libye">Libye</option><option value="Liechtenstein">Liechtenstein</option><option value="Lituanie">Lituanie</option><option value="Luxembourg">Luxembourg</option><option value="Mac??doine">Mac??doine</option><option value="Madagascar">Madagascar</option><option value="Malaisie">Malaisie</option><option value="Malawi">Malawi</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malte">Malte</option><option value="Maroc">Maroc</option><option value="Martinique">Martinique</option><option value="Maurice">Maurice</option><option value="Mauritanie">Mauritanie</option><option value="Mayotte">Mayotte</option><option value="Mexique">Mexique</option><option value="Moldavie">Moldavie</option><option value="Monaco">Monaco</option><option value="Mongolie">Mongolie</option><option value="Mont??n??gro">Mont??n??gro</option><option value="Montserrat">Montserrat</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibie">Namibie</option><option value="Nauru">Nauru</option><option value="N??pal">N??pal</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nig??ria">Nig??ria</option><option value="Niue">Niue</option><option value="Norv??ge">Norv??ge</option><option value="Nouvelle-Cal??donie">Nouvelle-Cal??donie</option><option value="Nouvelle-Z??lande">Nouvelle-Z??lande</option><option value="Oman">Oman</option><option value="Ouganda">Ouganda</option><option value="Ouzb??kistan">Ouzb??kistan</option><option value="Pakistan">Pakistan</option><option value="Palaos">Palaos</option><option value="Panama">Panama</option><option value="Papouasie-Nouvelle-Guin??e">Papouasie-Nouvelle-Guin??e</option><option value="Paraguay">Paraguay</option><option value="Pays-Bas">Pays-Bas</option><option value="P??rou">P??rou</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Pologne">Pologne</option><option value="Polyn??sie fran??aise">Polyn??sie fran??aise</option><option value="Porto Rico">Porto Rico</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="R.A.S. chinoise de Hong Kong">R.A.S. chinoise de Hong Kong</option><option value="R.A.S. chinoise de Macao">R.A.S. chinoise de Macao</option><option value="r??gions ??loign??es de l???Oc??anie">r??gions ??loign??es de l???Oc??anie</option><option value="R??publique centrafricaine">R??publique centrafricaine</option><option value="R??publique d??mocratique du Congo">R??publique d??mocratique du Congo</option><option value="R??publique dominicaine">R??publique dominicaine</option><option value="R??publique tch??que">R??publique tch??que</option><option value="R??union">R??union</option><option value="Roumanie">Roumanie</option><option value="Royaume-Uni">Royaume-Uni</option><option value="Russie">Russie</option><option value="Rwanda">Rwanda</option><option value="Sahara occidental">Sahara occidental</option><option value="Saint-Barth??l??my">Saint-Barth??l??my</option><option value="Saint-Kitts-et-Nevis">Saint-Kitts-et-Nevis</option><option value="Saint-Marin">Saint-Marin</option><option value="Saint-Martin">Saint-Martin</option><option value="Saint-Pierre-et-Miquelon">Saint-Pierre-et-Miquelon</option><option value="Saint-Vincent-et-les Grenadines">Saint-Vincent-et-les Grenadines</option><option value="Sainte-H??l??ne">Sainte-H??l??ne</option><option value="Sainte-Lucie">Sainte-Lucie</option><option value="Samoa">Samoa</option><option value="Samoa am??ricaines">Samoa am??ricaines</option><option value="Sao Tom??-et-Principe">Sao Tom??-et-Principe</option><option value="S??n??gal">S??n??gal</option><option value="Serbie">Serbie</option><option value="Serbie-et-Mont??n??gro">Serbie-et-Mont??n??gro</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapour">Singapour</option><option value="Slovaquie">Slovaquie</option><option value="Slov??nie">Slov??nie</option><option value="Somalie">Somalie</option><option value="Soudan">Soudan</option><option value="Sri Lanka">Sri Lanka</option><option value="Su??de">Su??de</option><option value="Suisse">Suisse</option><option value="Suriname">Suriname</option><option value="Svalbard et ??le Jan Mayen">Svalbard et ??le Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Syrie">Syrie</option><option value="Tadjikistan">Tadjikistan</option><option value="Ta??wan">Ta??wan</option><option value="Tanzanie">Tanzanie</option><option value="Tchad">Tchad</option><option value="Terres australes fran??aises">Terres australes fran??aises</option><option value="Territoire britannique de l'oc??an Indien">Territoire britannique de l'oc??an Indien</option><option value="Territoire palestinien">Territoire palestinien</option><option value="Tha??lande">Tha??lande</option><option value="Timor oriental">Timor oriental</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinit??-et-Tobago">Trinit??-et-Tobago</option><option value="Tristan da Cunha">Tristan da Cunha</option><option value="Tunisie">Tunisie</option><option value="Turkm??nistan">Turkm??nistan</option><option value="Turquie">Turquie</option><option value="Tuvalu">Tuvalu</option><option value="Ukraine">Ukraine</option><option value="Union europ??enne">Union europ??enne</option><option value="Uruguay">Uruguay</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vi??t Nam">Vi??t Nam</option><option value="Wallis-et-Futuna">Wallis-et-Futuna</option><option value="Y??men">Y??men</option><option value="Zambie">Zambie</option><option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <small tabindex="-1" id="deliveryStreetLbl__BV_description_" class="form-text text-muted">Adresse ?? laquelle les articles seront livr??s</small>
                                    </div>
                                </div> 
                                <button data-v-33681578="" style=" margin-bottom: 20px;" onclick="func2()" type="button" class="btn btn btn-default btn-alert btn-secondary">Utiliser l'adresse du client</button>
                            </div>
                        </div>
                    </div> 
                    <footer data-v-33681578="" class="modal-footer fixed">
                        <button data-v-33681578="" data-bs-dismiss="modal"  aria-label="Close" type="button" class="wuro-link">Annuler</button>
                        <button data-v-33681578="" type="button" class="btn btn btn-default btn-primary btn-secondary" onclick="livinfo()" data-bs-dismiss="modal"  aria-label="Close">Enregistrer
                        </button>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>