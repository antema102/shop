<div class="modal fade" id="modalinfoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div role="document" class="modal-content" id="__BVID__41___BV_modal_content_" aria-labelledby="__BVID__41___BV_modal_header_" aria-describedby="__BVID__41___BV_modal_body_">
            <header class="modal-header" id="__BVID__41___BV_modal_header_">
                <h5 class="modal-title"> Modifier les informations</h5>
                <i class="" data-bs-dismiss="modal"  aria-label="Close" style="color: #002bff; cursor: pointer" aria-hidden="true" ><button type="button" aria-label="Close" class="close">x</button></i>
            </header>
            <div class="modal-body" id="__BVID__41___BV_modal_body_">
                <div data-v-33681578="" data-v-561bb412="">
                    <div data-v-33681578="" >
                        <div data-v-33681578="" id="clientList"> 
                            <input data-v-33681578=""  type="text" placeholder="Client" id="devc" class="form-control" >
                        </div>

                        <br>
                            <div data-v-33681578="" id="clientButt" style="">
                                <button data-v-33681578="" style=" margin-bottom: 20px;" type="button" class="btn btn btn-default btn-alert btn-secondary" onclick="funclient()">Ajouter un nouveau client</button>
                            </div>

                            <div data-v-33681578="" id="clientNv" style="display: none;">                            
                                            <label data-v-20405c76="" id="popover-button-sync" data-original-title="" title="">
                                                Etiquettes
                                                <a   class="tooltip_help badge visible-desktop has-tooltip" data-original-title="null">?</a>
                                            </label> 
                                            <div data-v-20405c76="" class="tags">
                                                <div data-v-20405c76="" class="tags">

                                                    <div class="row" id="etq">
                                                        <input type="hidden" value=""  name="crClient" id="crClient">
                                                        <div data-v-4714f8e4="" class="tag-block" id="ettt1"  style="display: none">
                                                            <div data-v-4714f8e4="" class="tag badge" onclick="fee1()"  style="background:#28B5BF"> Clients Particulier </div> 
                                                        </div>
                                                        <div data-v-4714f8e4="" class="tag-block" id="ettt2"  style="display: none">
                                                            <div data-v-4714f8e4="" class="tag badge" onclick="fee2()"  style="background:#F2D600"> Clients Professionnel </div> 
                                                        </div>

                                                        <div data-v-4714f8e4="" class="tag-block" id="ettt3"  style="display: none">
                                                            <div data-v-4714f8e4="" class="tag badge" onclick="fee3()"  style="background:#5DADE2"> Fournisseur </div> 
                                                        </div>
                                                    </div>
                                                    <div data-v-20405c76="" class="wuro-link full-width" id="etiqLink">
                                                        <span data-v-20405c76="" onclick="fff()">Gérer les étiquettes</span>
                                                    </div> 

                                                    <div class="popover bs-popover-right fade" role="tooltip"   tabindex="-1" id="BV_popover_1" style="position: absolute;transform: translate3d(158px, -74px, 0px);top: 0px;left: 0px;will-change: transform;display: none;" x-placement="right">
                                                        <div class="arrow" style="top: 127px;">

                                                        </div>
                                                        <h3 class="popover-header" style="text-align: right;">
                                                            <i class="fas fa-times-circle" onclick="fg()" style="color: red;cursor: pointer;"></i>
                                                        </h3>

                                                        <div class="popover-body" id="listet">
                                                            <div>
                                                                <div data-v-4714f8e4="" data-v-20405c76="" class="tags">
                                                                    <div data-v-4714f8e4="" class="subtitle header">Etiquettes</div> 
                                                                    <div data-v-4714f8e4="">
                                                                        <div data-v-4714f8e4="" class="tags-list margin-t">

                                                                            <div data-v-4714f8e4="" class="tag-block" id="etttt1">
                                                                                <div data-v-4714f8e4="" class="tag badge" onclick="fe1()"   style="background:#28B5BF"> Clients Particulier </div> 
                                                                            </div>
                                                                            <br>
                                                                            <div data-v-4714f8e4="" class="tag-block" id="etttt2">
                                                                                <div data-v-4714f8e4="" class="tag badge" onclick="fe2()" style="background:#F2D600"> Clients Professionnel </div> 
                                                                            </div>
                                                                            <?php if ($admin['role'] == 1) { ?>
                                                                                <br>
                                                                                <div data-v-4714f8e4="" class="tag-block" id="etttt3">
                                                                                    <div data-v-4714f8e4="" class="tag badge" onclick="fe3()"  style="background:#5DADE2"> Fournisseur </div>
                                                                                </div>
                                                                            <?php } ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="popover-body" id="listetaj" style="display: none;" >

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                            <label data-v-52bb0894="" for="">Civilité</label>
                                            <div data-v-52bb0894="" id="radios1" role="radiogroup" tabindex="-1" class="">
                                                <div data-v-52bb0894="" class="custom-control custom-control-inline custom-radio">
                                                    <input type="radio" name="radioOpenions" autocomplete="off" class="custom-control-input" id="__BVID__138" value="M.">
                                                    <label class="custom-control-label" for="__BVID__138">M.</label>
                                                </div> 
                                                <div data-v-52bb0894="" class="custom-control custom-control-inline custom-radio">
                                                    <input type="radio" name="radioOpenions" autocomplete="off" class="custom-control-input" id="__BVID__139" value="Mme">
                                                    <label class="custom-control-label" for="__BVID__139">Mme</label>
                                                </div> 
                                                <div data-v-52bb0894="" class="custom-control custom-control-inline custom-radio">
                                                    <input type="radio" name="radioOpenions" autocomplete="off" class="custom-control-input" id="__BVID__140" value="">
                                                    <label class="custom-control-label" for="__BVID__140">Autre</label>
                                                </div>
                                            </div>
                                            <label data-v-20405c76="" for="number" class="control-label">Prénom</label> 
                                            <div data-v-20405c76="" class="controls">
                                                <div data-v-20405c76="" class="suggest-wrap">
                                                    <input placeholder="Prénom" id="prenomClient" name="prenomClient"  autocomplete="off" class="form-control"> 
                                                </div>
                                            </div>
                                            <label data-v-20405c76="" for="number" class="control-label">Nom</label> 
                                            <div data-v-20405c76="" class="controls">
                                                <div data-v-20405c76="" class="suggest-wrap">
                                                    <input placeholder="Nom (requis)" id="nomClient" name="nomClient"  autocomplete="off" class="form-control"> 
                                                </div>
                                            </div>
                                            
                                                                        
                                            <div data-v-33681578="" id="deliveryStreetLbl" role="group" aria-labelledby="deliveryStreetLbl__BV_label_" aria-describedby="deliveryStreetLbl__BV_description_" class="form-group">
                                                <label id="deliveryStreetLbl__BV_label_" for="deliveryStreet" class="d-block">Adresse de facturation</label>
                                                <div>
                                                    <input data-v-33681578="" id="adrClient" name="adrClient" type="text" placeholder="Adresse de l'entreprise" class="form-control" aria-describedby="deliveryStreetLbl__BV_description_"> 
                                                    <div data-v-33681578="" class="row margin-t" style="margin-top: 20px;">
                                                        <div data-v-33681578="" class="col-3">
                                                            <div data-v-33681578="" class="suggest-wrap">
                                                                <input placeholder="Code postal" name="cpClient" id="cpClient" type="text" class="form-control"> 

                                                            </div>
                                                        </div> 
                                                        <div data-v-33681578="" class="col-5">
                                                            <div data-v-33681578="" class="suggest-wrap">
                                                                <input placeholder="Ville" name="villeClient" id="villeClient" type="text" class="form-control"> 

                                                            </div>
                                                        </div> 
                                                        <div data-v-33681578="" class="col-4">
                                                            <select data-v-33681578="" class="custom-select" name="paysClient" id="paysClient">
                                                                <option value="France">France</option>
                                                                <option value="Afghanistan">Afghanistan</option>
                                                                <option value="Afrique du Sud">Afrique du Sud</option>
                                                                <option value="Albanie">Albanie</option>
                                                                <option value="Algérie">Algérie</option>
                                                                <option value="Allemagne">Allemagne</option>
                                                                <option value="Andorre">Andorre</option>
                                                                <option value="Angola">Angola</option>
                                                                <option value="Anguilla">Anguilla</option>
                                                                <option value="Antarctique">Antarctique</option>
                                                                <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option><option value="Antilles néerlandaises">Antilles néerlandaises</option>
                                                                <option value="Arabie saoudite">Arabie saoudite</option>
                                                                <option value="Argentine">Argentine</option>
                                                                <option value="Arménie">Arménie</option>
                                                                <option value="Aruba">Aruba</option>
                                                                <option value="Australie">Australie</option>
                                                                <option value="Autriche">Autriche</option>
                                                                <option value="Azerbaïdjan">Azerbaïdjan</option>
                                                                <option value="Bahamas">Bahamas</option>
                                                                <option value="Bahreïn">Bahreïn</option>
                                                                <option value="Bangladesh">Bangladesh</option>
                                                                <option value="Barbade">Barbade</option>
                                                                <option value="Bélarus">Bélarus</option>
                                                                <option value="Belgique">Belgique</option>
                                                                <option value="Belize">Belize</option>
                                                                <option value="Bénin">Bénin</option>
                                                                <option value="Bermudes">Bermudes</option>
                                                                <option value="Bhoutan">Bhoutan</option>
                                                                <option value="Bolivie">Bolivie</option>
                                                                <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
                                                                <option value="Botswana">Botswana</option>
                                                                <option value="Brésil">Brésil</option>
                                                                <option value="Brunéi Darussalam">Brunéi Darussalam</option>
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
                                                                <option value="Corée du Nord">Corée du Nord</option>
                                                                <option value="Corée du Sud">Corée du Sud</option>
                                                                <option value="Costa Rica">Costa Rica</option>
                                                                <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                                                                <option value="Croatie">Croatie</option>
                                                                <option value="Cuba">Cuba</option>
                                                                <option value="Danemark">Danemark</option>
                                                                <option value="Diego Garcia">Diego Garcia</option>
                                                                <option value="Djibouti">Djibouti</option>
                                                                <option value="Dominique">Dominique</option>
                                                                <option value="Égypte">Égypte</option>
                                                                <option value="El Salvador">El Salvador</option>
                                                                <option value="Émirats arabes unis">Émirats arabes unis</option>
                                                                <option value="Équateur">Équateur</option>
                                                                <option value="Érythrée">Érythrée</option>
                                                                <option value="Espagne">Espagne</option>
                                                                <option value="Andalousie (Espagne)">Andalousie (Espagne)</option>
                                                                <option value="Estonie">Estonie</option>
                                                                <option value="État de la Cité du Vatican">État de la Cité du Vatican</option>
                                                                <option value="États fédérés de Micronésie">États fédérés de Micronésie</option>
                                                                <option value="États-Unis">États-Unis</option>
                                                                <option value="Éthiopie">Éthiopie</option>
                                                                <option value="Fidji">Fidji</option>
                                                                <option value="Finlande">Finlande</option>
                                                                <option value="Gabon">Gabon</option>
                                                                <option value="Gambie">Gambie</option>
                                                                <option value="Géorgie">Géorgie</option>
                                                                <option value="Géorgie du Sud et les îles Sandwich du Sud">Géorgie du Sud et les îles Sandwich du Sud</option>
                                                                <option value="Ghana">Ghana</option>
                                                                <option value="Gibraltar">Gibraltar</option>
                                                                <option value="Grèce">Grèce</option><option value="Grenade">Grenade</option>
                                                                <option value="Groenland">Groenland</option>
                                                                <option value="Guadeloupe">Guadeloupe</option>
                                                                <option value="Guam">Guam</option>
                                                                <option value="Guatemala">Guatemala</option>
                                                                <option value="Guernesey">Guernesey</option>
                                                                <option value="Guinée">Guinée</option>
                                                                <option value="Guinée équatoriale">Guinée équatoriale</option>
                                                                <option value="Guinée-Bissau">Guinée-Bissau</option>
                                                                <option value="Guyana">Guyana</option>
                                                                <option value="Guyane française">Guyane française</option>
                                                                <option value="Haïti">Haïti</option>
                                                                <option value="Honduras">Honduras</option>
                                                                <option value="Hongrie">Hongrie</option>
                                                                <option value="Île Bouvet">Île Bouvet</option>
                                                                <option value="Île Christmas">Île Christmas</option>
                                                                <option value="Île de l'Ascension">Île de l'Ascension</option>
                                                                <option value="Île de Man">Île de Man</option>
                                                                <option value="Île Norfolk">Île Norfolk</option>
                                                                <option value="Îles Åland">Îles Åland</option>
                                                                <option value="Îles Caïmans">Îles Caïmans</option>
                                                                <option value="Îles Canaries">Îles Canaries</option>
                                                                <option value="Îles Cocos - Keeling">Îles Cocos - Keeling</option>
                                                                <option value="Îles Cook">Îles Cook</option>
                                                                <option value="Îles Féroé">Îles Féroé</option>
                                                                <option value="Îles Heard et MacDonald">Îles Heard et MacDonald</option>
                                                                <option value="Îles Malouines">Îles Malouines</option>
                                                                <option value="Îles Mariannes du Nord">Îles Mariannes du Nord</option>
                                                                <option value="Îles Marshall">Îles Marshall</option>
                                                                <option value="Îles Mineures Éloignées des États-Unis">Îles Mineures Éloignées des États-Unis</option>
                                                                <option value="Îles Salomon">Îles Salomon</option>
                                                                <option value="Îles Turks et Caïques">Îles Turks et Caïques</option>
                                                                <option value="Îles Vierges britanniques">Îles Vierges britanniques</option>
                                                                <option value="Îles Vierges des États-Unis">Îles Vierges des États-Unis</option>
                                                                <option value="Inde">Inde</option>
                                                                <option value="Indonésie">Indonésie</option>
                                                                <option value="Irak">Irak</option>
                                                                <option value="Iran">Iran</option><option value="Irlande du Sud">Irlande du Sud</option><option value="Islande">Islande</option><option value="Israël">Israël</option><option value="Italie">Italie</option><option value="Jamaïque">Jamaïque</option><option value="Japon">Japon</option><option value="Jersey">Jersey</option><option value="Jordanie">Jordanie</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kirghizistan">Kirghizistan</option><option value="Kiribati">Kiribati</option><option value="Koweït">Koweït</option><option value="Laos">Laos</option><option value="Lesotho">Lesotho</option><option value="Lettonie">Lettonie</option><option value="Liban">Liban</option><option value="Libéria">Libéria</option><option value="Libye">Libye</option><option value="Liechtenstein">Liechtenstein</option><option value="Lituanie">Lituanie</option><option value="Luxembourg">Luxembourg</option><option value="Macédoine">Macédoine</option><option value="Madagascar">Madagascar</option><option value="Malaisie">Malaisie</option><option value="Malawi">Malawi</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malte">Malte</option><option value="Maroc">Maroc</option><option value="Martinique">Martinique</option><option value="Maurice">Maurice</option><option value="Mauritanie">Mauritanie</option><option value="Mayotte">Mayotte</option><option value="Mexique">Mexique</option><option value="Moldavie">Moldavie</option><option value="Monaco">Monaco</option><option value="Mongolie">Mongolie</option><option value="Monténégro">Monténégro</option><option value="Montserrat">Montserrat</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibie">Namibie</option><option value="Nauru">Nauru</option><option value="Népal">Népal</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigéria">Nigéria</option><option value="Niue">Niue</option><option value="Norvège">Norvège</option><option value="Nouvelle-Calédonie">Nouvelle-Calédonie</option><option value="Nouvelle-Zélande">Nouvelle-Zélande</option><option value="Oman">Oman</option><option value="Ouganda">Ouganda</option><option value="Ouzbékistan">Ouzbékistan</option><option value="Pakistan">Pakistan</option><option value="Palaos">Palaos</option><option value="Panama">Panama</option><option value="Papouasie-Nouvelle-Guinée">Papouasie-Nouvelle-Guinée</option><option value="Paraguay">Paraguay</option><option value="Pays-Bas">Pays-Bas</option><option value="Pérou">Pérou</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Pologne">Pologne</option><option value="Polynésie française">Polynésie française</option><option value="Porto Rico">Porto Rico</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="R.A.S. chinoise de Hong Kong">R.A.S. chinoise de Hong Kong</option><option value="R.A.S. chinoise de Macao">R.A.S. chinoise de Macao</option><option value="régions éloignées de l’Océanie">régions éloignées de l’Océanie</option><option value="République centrafricaine">République centrafricaine</option><option value="République démocratique du Congo">République démocratique du Congo</option><option value="République dominicaine">République dominicaine</option><option value="République tchèque">République tchèque</option><option value="Réunion">Réunion</option><option value="Roumanie">Roumanie</option><option value="Royaume-Uni">Royaume-Uni</option><option value="Russie">Russie</option><option value="Rwanda">Rwanda</option><option value="Sahara occidental">Sahara occidental</option><option value="Saint-Barthélémy">Saint-Barthélémy</option><option value="Saint-Kitts-et-Nevis">Saint-Kitts-et-Nevis</option><option value="Saint-Marin">Saint-Marin</option><option value="Saint-Martin">Saint-Martin</option><option value="Saint-Pierre-et-Miquelon">Saint-Pierre-et-Miquelon</option><option value="Saint-Vincent-et-les Grenadines">Saint-Vincent-et-les Grenadines</option><option value="Sainte-Hélène">Sainte-Hélène</option><option value="Sainte-Lucie">Sainte-Lucie</option><option value="Samoa">Samoa</option><option value="Samoa américaines">Samoa américaines</option><option value="Sao Tomé-et-Principe">Sao Tomé-et-Principe</option><option value="Sénégal">Sénégal</option><option value="Serbie">Serbie</option><option value="Serbie-et-Monténégro">Serbie-et-Monténégro</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapour">Singapour</option><option value="Slovaquie">Slovaquie</option><option value="Slovénie">Slovénie</option><option value="Somalie">Somalie</option><option value="Soudan">Soudan</option><option value="Sri Lanka">Sri Lanka</option><option value="Suède">Suède</option><option value="Suisse">Suisse</option><option value="Suriname">Suriname</option><option value="Svalbard et Île Jan Mayen">Svalbard et Île Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Syrie">Syrie</option><option value="Tadjikistan">Tadjikistan</option><option value="Taïwan">Taïwan</option><option value="Tanzanie">Tanzanie</option><option value="Tchad">Tchad</option><option value="Terres australes françaises">Terres australes françaises</option><option value="Territoire britannique de l'océan Indien">Territoire britannique de l'océan Indien</option><option value="Territoire palestinien">Territoire palestinien</option><option value="Thaïlande">Thaïlande</option><option value="Timor oriental">Timor oriental</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinité-et-Tobago">Trinité-et-Tobago</option><option value="Tristan da Cunha">Tristan da Cunha</option><option value="Tunisie">Tunisie</option><option value="Turkménistan">Turkménistan</option><option value="Turquie">Turquie</option><option value="Tuvalu">Tuvalu</option><option value="Ukraine">Ukraine</option><option value="Union européenne">Union européenne</option><option value="Uruguay">Uruguay</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Viêt Nam">Viêt Nam</option><option value="Wallis-et-Futuna">Wallis-et-Futuna</option><option value="Yémen">Yémen</option><option value="Zambie">Zambie</option><option value="Zimbabwe">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <small tabindex="-1" id="deliveryStreetLbl__BV_description_" class="form-text text-muted">Adresse à laquelle les articles seront livrés</small>
                                                </div>
                                            </div> 

                                           
                                            <label data-v-20405c76="" for="client_phone" class="control-label">Portable</label> 
                                            <input data-v-20405c76="" placeholder="Téléphone portable du client" name="mobClient" id="mobClient" type="text" class="form-control">
                                            
                                            <label data-v-20405c76="" for="number" class="control-label">Nom de la société</label>
                                            <div data-v-20405c76="" class="controls">
                                                <div data-v-20405c76="" class="suggest-wrap">
                                                    <input placeholder="Nom de la société" name="socClient" id="socClient" autocomplete="off" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <div data-v-33681578="" id="">
                                                <button data-v-33681578="" style=" margin-bottom: 20px;" onclick="funclient2()" type="button" class="btn btn btn-default btn-alert btn-secondary">Choisir un client existant</button>
                                            </div>                                          
                            </div>
                    </div>
                </div>
            </div>
            <footer data-v-33681578="" class="modal-footer fixed">
                        <button data-v-33681578="" type="button" class="wuro-link" data-bs-dismiss="modal"  aria-label="Close">Annuler</button>
                        <button data-v-33681578="" type="button" name="eng"
                                class="btn btn btn-default btn-primary btn-secondary" onclick="clientFac()" data-bs-dismiss="modal"  aria-label="Close">Enregistrer
                        </button>
            </footer>
        </div>
    </div>
</div>