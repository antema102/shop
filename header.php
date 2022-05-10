<style>
    .show-params-alert {
        position: fixed!important;
        top: 236px !important;
        left: 47px;
        z-index: 99;
    }
    </style>
    <?php
    $adminn = mysqli_fetch_array(mysqli_query($link, "select * from user where email='" . $_SESSION['user'] . "'"));
    ?>

    <div class="notifications" style="width: 300px; top: 0px; right: 0px;">
        <span></span>
    </div> 
    <nav class="menu">

        <div class="actions left-menu">
            <a href="<?php echo url ?>" class="<?php
            $m=0;
            if ($m == 1) {
                echo 'router-link-active menu-selected';
            }
            ?>" >
                <li class="dropdown-item has-tooltip" data-original-title="null">
                    <i class="icon ion-ios-keypad" style="font-size: 27px !important;"></i>
                </li>
            </a>

            <a href="<?php echo url ?>facture.php" style="text-decoration:none" class="<?php
            if ($m == 5) {
                echo 'router-link-active menu-selected';
            }
            ?>" >
                <li class="dropdown-item has-tooltip" data-original-title="null">
                    <i class="fas fa-file-invoice-dollar" style="font-size: 27px !important;"></i>
                    <p class="title header-form" style="font-weight: bold;font-size: 1rem;color: #28b5bf;    margin-bottom: 0px!important;
">Factures</p>
                </li>
            </a>

            <a href="<?php echo url ?>espace.php" style="text-decoration:none" class="<?php
            if ($m == 6) {
                echo 'router-link-active menu-selected';
            }
            ?>" >
                <li class="dropdown-item has-tooltip" data-original-title="null">
                    <i class="fas fa-coins" style="font-size: 27px !important;"></i>
                    <p class="title header-form" style="font-weight: bold;font-size: 1rem;color: #28b5bf;    margin-bottom: 0px!important;
">Proformas</p>
                </li>
            </a>
<?php if ($adminn['role'] != '4') { ?>

            <a href="<?php echo url ?>avoir.php" style="text-decoration:none" class="<?php
            if ($m == 7) {
                echo 'router-link-active menu-selected';
            }
            ?>" >
                <li class="dropdown-item has-tooltip" data-original-title="null">
                    <i class="fas fa-receipt" style="font-size: 27px !important;"></i>
                    <p class="title header-form" style="font-weight: bold;font-size: 1rem;color: #28b5bf;margin-bottom: 0px!important;
">Avoirs</p>
                </li>
            </a>
            <a href="<?php echo url ?>devis.php" style="text-decoration:none" class="<?php
            if ($m == 4) {
                echo 'router-link-active menu-selected';
            }
            ?>" >
                <li class="dropdown-item has-tooltip" data-original-title="null">
                    <i class="fas fa-file-invoice" style="font-size: 27px !important;"></i>
                    <p class="title header-form" style="font-weight: bold;font-size: 1rem;color: #28b5bf;    margin-bottom: 0px!important;
">Devis</p>
                </li>
            </a>
            <a href="<?php echo url ?>client.php" class="<?php
            if ($m == 2) {
                echo 'router-link-active menu-selected';
            }
            ?> " style="text-decoration:none">
                <li class="dropdown-item has-tooltip" data-original-title="null">
                    <i class="fas fa-user-tag" style="font-size: 27px !important;"></i>
                    <p class="title header-form" style="font-weight: bold;font-size: 1rem;color: #28b5bf;    margin-bottom: 0px!important;
">Clients</p>
                </li>
<!--                <li class="dropdown-item has-tooltip" data-original-title="null">-->
<!--                   -->
<!--                </li>-->
            </a>


            <a href="<?php echo url ?>produit.php" style="text-decoration:none" class="<?php
            if ($m == 3) {
                echo 'router-link-active menu-selected';
            }
            ?>" >
                <li class="dropdown-item has-tooltip" data-original-title="null">
                    <i class="fab fa-product-hunt" style="font-size: 27px !important;"></i>
                    <p class="title header-form" style="font-weight: bold;font-size: 1rem;color: #28b5bf;    margin-bottom: 0px!important;
">Produits</p>
                </li>
            </a>
<?php } ?>
        </div>
        <div class="version"><strong> 1.0 </strong></div>
    </nav>
    <div data-v-f0cf7a16="">

        <header data-v-f0cf7a16="" class="header">
            <div class="col-md-6">
                <div data-v-f0cf7a16="" class="not-an-ad">
                    <div data-v-ec1d3686="" data-v-f0cf7a16="" class="carousel carousel--up carousel--slidable">
                        <ul data-v-ec1d3686="" class="carousel__list">
                            <li data-v-ec1d3686="" data-index="0" class="carousel__item carousel__item--active">
                                <span data-v-ec1d3686="">
                                    <div class="slide">
                                        <a href="<?php echo url ?>"> <img src="<?php echo url ?>static/logo-ilo.png" height="64px"></a>
                                    </div>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div> 
                <div data-v-f0cf7a16="" id="logo_title_container">
                    

                </div> 
            </div>
            <div class="col-md-6" style="text-align: right;padding-top: 15px;">
                <a class="logout" href="logout.php">
                    <i class="disconnect fa fa-sign-out"></i>Déconnexion
                </a>

            </div>
        </header> 


    </div> 
    <div id="__w_mobile_account_modal" class="hidden-desktop">
        <p class="text-center">
            <img src="" alt="User Avatar" class="img-circle">
        </p> 
        <div>
            <p id="__w_mobile_profile_name" class="text-center">Sabri Halila</p>
        </div> 
        <div>
            <p class="text-center">
                <a id="__w_mobile_profiles_settings">
                    <i aria-hidden="true" class="icon ion-ios-contact" style="margin-right: 10px;">

                    </i>Mon compte
                </a>
            </p>
        </div> 
        <div>
            <p class="text-center">
                <a id="__w_mobile_profiles_logout" class="logout">
                    <i class="disconnect icon ion-ios-power" style="margin-right: 10px;"></i> Déconnexion
                </a>
            </p>
        </div>
    </div> 
    <div id="__w_mobile_footer" class="hidden-desktop">
        <a class="mobile-links" href="<?php echo url ?>">
            <i class="icon ion-ios-keypad"></i>
        </a>
		
<?php if ($adminn['role'] != '4') { ?>
        <a class="mobile-links" href="<?php echo url ?>client.php">

            <i class="fas fa-user-tag"></i>
<!--            <i class="" aria-label="Clients"></i>-->
        </a>
		<?php } ?>
        <a class="mobile-links" href="<?php echo url ?>produit.php">
            <i class="fab fa-product-hunt"></i>
        </a>
        <a class="mobile-links" href="<?php echo url ?>devis.php">
            <i class="fas fa-file-invoice"></i>
        </a>
        <a class="mobile-links" href="<?php echo url ?>facture.php">
            <i class="fas fa-file-invoice-dollar"></i>
        </a> 

        <a class="mobile-links" href="<?php echo url ?>espace.php">
            <i class="fas fa-coins"></i>
        </a> 
        <a class="mobile-links" href="<?php echo url ?>logout.php">
            <i class="disconnect fa fa-sign-out"></i>
        </a> 

    </div> <!----> 

    <!---->
