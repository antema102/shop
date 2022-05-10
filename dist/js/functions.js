            function clientf() {
                var client = document.getElementById("devc").value;

                $.ajax({
                    type: "POST",
                    url: "clientinfo.php?client=" + client,
                    success: function (data) {
                        document.getElementById("client").innerHTML = data;
                    }
                });
                $('.modal-body').find(':input').not(':input[type="radio"]').val('');
                $('.modal-body').find(':input[type="radio"]').removeAttr('checked');
            }

            function clientFac() {
             var clientDisplay = document.getElementById("clientList").style.display;
               if(clientDisplay != 'none'){
                clientf();
               } else {
                clientAdd();   
               }

            }
            function clientAdd() {
                var nomClient = document.getElementById("nomClient").value;
                var prenomClient = document.getElementById("prenomClient").value;
                var crClient = document.getElementById("crClient").value;
                var adrClient = document.getElementById("adrClient").value;
                var cpClient = document.getElementById("cpClient").value;
                var villeClient = document.getElementById("villeClient").value;
                var paysClient = document.getElementById("paysClient").value;
                var mobClient = document.getElementById("mobClient").value;
                var socClient = document.getElementById("socClient").value;
                var civ = $("input[type='radio'][name='radioOpenions']:checked").val();
                if (civ == undefined) {
                    civ = "";
                }

                $.ajax({
                    type: "POST",
                    url: "addclientFacture.php?nomClient=" + nomClient + "&prenomClient=" + prenomClient + "&civ=" + civ + "&crClient=" + crClient + "&adrClient=" + adrClient + "&cpClient=" + cpClient + "&villeClient=" + villeClient + "&paysClient=" + paysClient + "&mobClient=" + mobClient + "&socClient=" + socClient,
                    success: function (data) {
                        document.getElementById("client").innerHTML = data;
                    }
                });

                //$(".modal-body :input").val("");
                $('.modal-body').find(':input').not(':input[type="radio"]').val('');
                $('.modal-body').find(':input[type="radio"]').removeAttr('checked');
            }

            function funclient() {            
                document.getElementById("clientList").style.display = "none";
                document.getElementById("clientButt").style.display = "none";
                document.getElementById("ettt1").style.display = "none";
                document.getElementById("ettt2").style.display = "none";
                document.getElementById("ettt3").style.display = "none";               
                document.getElementById("etiqLink").style.display = "contents";
                document.getElementById("clientNv").style.display = "contents";
                document.getElementById("paysClient").querySelector('option[value="France"]').selected = true;
            }

            function funclient2() {
                document.getElementById("clientList").style.display = "contents"
                document.getElementById("clientButt").style.display = "contents";
                document.getElementById("clientNv").style.display = "none";
                $(".modal-body :input").val("");
            }
            function productFac() {
                var productDisplay = document.getElementById("productList").style.display;
                  if(productDisplay != 'none'){
                   productf();
                  } else {
                   productAdd();   
                  }
   
               }
            function productf() {
                var produit = document.getElementById("produit").value;
                var qte = document.getElementById("qte").value;
                var prd = document.getElementById("prdl");
                $('.error').remove();
                if(qte && produit) {
                    $.ajax({
                        type: "POST",
                        url: "produitinfo.php?produit=" + produit + "&qte=" + qte,
                        success: function (data) {
                            calcul();
                            //$("#client1").append(data);
                            $("#prdl").append(data);
                        }
                    });
                    $('#modalinfoprdTest').modal('hide');
                    $(".modal-body :input").val("");
                   // $('#modalinfoproduit .modal-body p').remove();
                } else {
                    $('#modalinfoprdTest footer').before().before('<p class="error" style="color:red">Vous n\'avez pas remplit tous les champs !</p>');     
               }  
            }
            function productAdd() {
                var produitRef = document.getElementById("ref").value;
                var produitNom = document.getElementById("nom").value;
                var produitCateg = document.getElementById("cat").value;
                var qnt = document.getElementById("quantite").value;
                var fournisseur = '';
                var fournisseurElt = document.getElementById("fournisseur");
                if(fournisseurElt != null){
                var fournisseur = fournisseurElt.value;
                }           
                var prixHT = document.getElementById("productPriceHT").value;
                var tva = document.getElementById("tva").value;
                var prixTTc = document.getElementById("productPriceTTC1").value;
                var coutAchat = document.getElementById("coutachat").value;
                var coefMultip = document.getElementById("productEcotax").value;
                var MargeCom = document.getElementById("margecomm").value;
                var courTransport = document.getElementById("courtransport").value;
                $('.error').remove();
                if(qnt && produitRef && produitNom && prixHT) {
                    $.ajax({
                        type: "POST",
                        url: "ajoutProduitTest.php?produitRef=" + produitRef + "&produitNom=" + produitNom + "&produitCateg=" + produitCateg + "&qnt=" + qnt + "&fournisseur=" + fournisseur + "&prixHT=" + prixHT + "&tva=" + tva + "&prixTTc=" + prixTTc + "&coutAchat=" + coutAchat + "&coefMultip=" + coefMultip + "&MargeCom=" + MargeCom + "&courTransport=" + courTransport,
                        success: function (data) {
                            calcul();
                          //  $("#client1").append(data);
                          $("#prdl").append(data);
                        }
                    });
                    $('#modalinfoprdTest').modal('hide');
                    $(".modal-body :input").val("");
                    //$('#modalinfoproduit .modal-body p').remove();
                } else {
                    $('#modalinfoprdTest footer').before().before('<p class="error" style="color:red">Vous n\'avez pas remplit tous les champs !</p>');     
               } 
            }
            function funProduct() {            
                document.getElementById("productList").style.display = "none";
                document.getElementById("productButt").style.display = "none";  
                $('.error').remove();
                $(".modal-body :input").val("");
                document.getElementById("productNew").style.display = "contents";
            }

            function funProduct2() {
                document.getElementById("productList").style.display = "contents"
                document.getElementById("productButt").style.display = "contents";
                document.getElementById("productNew").style.display = "none";
                $('.error').remove();
                $(".modal-body :input").val("");
            }
            function fee1() {
                //  document.getElementById("etttt1").style.display = "contents";
                //  document.getElementById("etttt2").style.display = "contents";
                //  document.getElementById("etttt3").style.display = "contents";
                  document.getElementById("etiqLink").style.display = "contents";
                  document.getElementById("ettt1").style.display = "none";
              }
              function fee2() {
                //  document.getElementById("etttt1").style.display = "contents";
                //  document.getElementById("etttt2").style.display = "contents";
                //  document.getElementById("etttt3").style.display = "contents";
                  document.getElementById("etiqLink").style.display = "contents";
                  document.getElementById("ettt2").style.display = "none";
              }
              function fee3() {
                //  document.getElementById("etttt1").style.display = "contents";
                //  document.getElementById("etttt2").style.display = "contents";
                //  document.getElementById("etttt3").style.display = "contents";
                  document.getElementById("etiqLink").style.display = "contents";
                  document.getElementById("ettt3").style.display = "none";
              }
              function fff() {
                  var x = document.getElementById("BV_popover_1");
                  if (x.style.display === 'none') {
                      $('#BV_popover_1').addClass('show');
                      document.getElementById("BV_popover_1").style.display = "unset";
                  } else {
                      document.getElementById("BV_popover_1").style.display = "none";
                  }
              }
              function fg() {
                  document.getElementById("BV_popover_1").style.display = "none";
              }
              function fe1() {
                  document.getElementById("ettt1").style.display = "contents";
                 // document.getElementById("etttt1").style.display = "none";
                 // document.getElementById("etttt2").style.display = "none";
                 // document.getElementById("etttt3").style.display = "none";
                  document.getElementById("BV_popover_1").style.display = "none";
                  document.getElementById("etiqLink").style.display = "none";
                  document.getElementById("crClient").value = 1;
              }
              function fe2() {
                  document.getElementById("ettt2").style.display = "contents";
                 // document.getElementById("etttt1").style.display = "none";
                 // document.getElementById("etttt2").style.display = "none";
                 // document.getElementById("etttt3").style.display = "none";
                  document.getElementById("BV_popover_1").style.display = "none";
                  document.getElementById("etiqLink").style.display = "none";
                  document.getElementById("crClient").value = 2;
              }
              function fe3() {
                  document.getElementById("ettt3").style.display = "contents";
                //  document.getElementById("etttt1").style.display = "none";
                //  document.getElementById("etttt2").style.display = "none";
                //  document.getElementById("etttt3").style.display = "none";
                  document.getElementById("BV_popover_1").style.display = "none";
                  document.getElementById("etiqLink").style.display = "none";
                  document.getElementById("crClient").value = 3;
              }
              function calculM() {
                var ht = document.getElementById("productPriceHT").value;
                var tva = document.getElementById("tva").value;
                $.ajax({
                    type: "POST",
                    url: "calcultvaproduit.php",
                    data: {
                        ht: ht,
                        tva: tva
                    },
                    success: function (data) {
                        document.getElementById("blockt1").innerHTML = data;
                    }
                });
            }
            function calculMargeM() {
                var ht = document.getElementById("productPriceHT").value;
                var coutachat = document.getElementById("coutachat").value;
                $.ajax({
                    type: "POST",
                    url: "calculmarge.php",
                    data: {
                        ht: ht,
                        coutachat: coutachat
                    },

                    success: function (data) {
                        document.getElementById("blockmarge").innerHTML = data;
                    }
                });
            }
