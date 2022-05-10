<?php
include 'db.php';
include('pdf.php');
$mailto= $_POST['mailto'];
$mailfrom=$_POST['mailfrom'];
$mailsubject=$_POST['mailsubject'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$description=$_POST['description'];
$contentHtml = $_POST['content'];


$facture = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `espace` WHERE `id` = 120"));

$message="<html><body>";
$message .= '<h1>Cher(e) Cleint(s)</h1>';
 
	 
		  
		  
$message .='<p>
          <td style="font-family:Arial,Helvetica,sans-serif;color:#000000;text-align:center;font-size:18px;padding-top:10px;padding-bottom:10px;vertical-align:middle">
		  <span style="font-weight:700;color:#163860">En vente dès vendredi, chez votre marchand de journaux, les <span class="il">Figaro</span> Week-end</span><br> <br> <br> <span style="color:#163860">Retrouvez dans </span><span style="font-weight:700;color:#163860">Le <span class="il">Figaro</span> Magazine</span><span style="color:#163860"> notre </span><span style="font-weight:700;color:#163860">dossier spécial</span><span style="color:#163860"> sur le fiasco </span><br> <span style="color:#163860">d’Anne Hidalgo : sa gestion de Paris, sa candidature à la Présidence de la République… Portrait d’une élue qui veut toujours avoir raison envers et contre tous, et qui affiche à Paris un bilan plus que contrasté. </span><br> <br>&nbsp;</td></p>';
		  

$message .=	'<a href="https://www.flaticon.com/fr/sticker-gratuite/printemps_4433174" class="view link-icon-detail related-icon" title="printemps" data-id="4433174">
	<img alt="" width="640" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#000000;line-height:13px;display:block;border:none" class="m_-7981535783240864651t_w100p m_-7981535783240864651m_w100p CToWUd a6T" src="http://www.shoppassiondecor.fr/static/capture.jpg" tabindex="0">
		</a>';





$message .='<p> <td align="left" style="padding:0px;font-size:0px"><div style="text-align:left;color:rgb(129,129,130);line-height:1;font-family:Arial;font-size:12px">
Passiondecor - PASSION DECOR, 209 Avenue de la république 93800 Epinay sur seine France
Pour toute assistance, merci de nous contacter :
Tél. : 09 53 01 76 14
*Vous devez vérifier la conformité de la marchandise réceptionnée (emballage, contenu, etat) avant de signer le bon de livraison du transporteur pour signaler, le cas échéant, les dommages dus au transport sur les bons de livraison. Le livreur doit assister au déballage et attendre l’ouverture des colis.</td></p>';
		
$message .= '</body></html>';

$description = wordwrap($description, 100,"<br/>"); 
$client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `id` = 90232"));
$from= '';
$mailfrom = '';


$path = 'http://www.shoppassiondecor.fr';   
$file = $path . "/" . $filename;

$mailto = $client['email'];
$subject = 'Merci pour votre achat !'; 


$html = <<<'ENDHTML'
<html>
 <body>
 <script type="text/php">
 if (isset($pdf)) {
    // open the PDF object - all drawing commands will
    // now go to the object instead of the current page
    $footer = $pdf->open_object();

    // get height and width of page
    $w = $pdf->get_width();
    $h = $pdf->get_height();

    // get font
    $font = Font_Metrics::get_font("helvetica", "normal");
    $txtHeight = Font_Metrics::get_font_height($font, 8);

    // draw a line along the bottom
    $y = $h - 2 * $txtHeight - 24;
    $color = array(0, 0, 0);
    $pdf->line(16, $y, $w - 16, $y, $color, 1);
    
    // set page number on the left side
    $pdf->page_text(16, $y, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, $color);
    // set additional text
    $text = "Dompdf is awesome";
    $width = Font_Metrics::get_text_width($text, $font, 8);
    $pdf->text($w - $width - 16, $y, $text, $font, 8);

    // close the object (stop capture)
    $pdf->close_object();

    // add the object to every page (can also specify
    // "odd" or "even")
    $pdf->add_object($footer, "all");
}
 </script>
 <table data-v-561bb412="" class="quote-lines-table">
         <thead data-v-561bb412="" class="quote-lines-header">
             <tr data-v-561bb412="" style="background-color: #32baa8; color: rgb(255, 255, 255);">
                 <th data-v-561bb412="" style="min-width: 210px;">
                     <span data-v-561bb412="">Désignation</span>
                 </th>
                 <th data-v-561bb412="" class="text--right text--nowrap">
                     <span data-v-561bb412="">P.u. HT</span>
                 </th> 
                 <th data-v-561bb412="" class="text--right text--nowrap">
                     <span data-v-561bb412="">Qté.</span>
                 </th> 
                 <th data-v-561bb412="" class="text--right text--nowrap">
                     <span data-v-561bb412="">Montant HT</span>
                 </th>
                 <th data-v-561bb412="" class="text--right text--nowrap">
                     <span data-v-561bb412="">TVA</span>
                 </th>
                 <th data-v-561bb412="" class="text--right text--nowrap">
                     <span data-v-561bb412="">Montant TTC</span>
                 </th>
             </tr>
         </thead>
         <tbody data-v-561bb412="" class="table__body table__body--empty">
             
         </tbody>
     </table>

     <div data-v-561bb412="">
     <div data-v-248579a2="" data-v-561bb412="" class="document-summary-full">
         <div data-v-248579a2="" class="document_currency_summary"></div>
         <div data-v-248579a2="" class="document_summary" id="calcul">
             <table data-v-248579a2="">
                 <tbody data-v-248579a2="">
                     <tr data-v-248579a2="" style="background-color: #32baa8; color: rgb(255, 255, 255);">
                         <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif</th>
                     </tr> 
                     <tr data-v-248579a2="" class="sstitre transport" style="display: none;">
                         <td data-v-248579a2="" colspan="2">Transport</td>
                     </tr> <!----> <!----> <!---->
                                                                     <tr data-v-248579a2="">
                         <td data-v-248579a2="">Montant total HT</td> 
                         <td data-v-248579a2="" role="totalHT" class="r-number">
                              €</td>
                     </tr>
                     <tr data-v-248579a2="">
                         <td data-v-248579a2="">Montant total TVA</td>
                         <td data-v-248579a2="" role="totalTVA" class="r-number">
                              €</td>
                     </tr>
                     <tr data-v-248579a2="" class="total">
                         <td data-v-248579a2="">Montant total TTC</td>
                         <td data-v-248579a2="" role="total_ttc" class="r-number">
                              €</td>
                     </tr>
                 </tbody>
             </table>
             <br> 
                                                 </div>
     </div>
     <div data-v-561bb412="" class=" inline-block payment-block">
         <h6 data-v-561bb412="" class="not-visible">  Informations de paiement</h6>
         <div id="">
             <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
                 <div data-v-02611d7b="" class="limit-date">Validité de l'offre :21-11-2021  </div> 
                 <div data-v-02611d7b="" class="payment-mode">Mode de paiement : 
                     Espèces                                            </div> 
                 <div data-v-561bb412="" class="payment-delay">  Règlement à J+0</div>
             </div>

         </div>
     </div>
     <div data-v-561bb412="" class="inline-block shipping-block">
         <h6 data-v-561bb412="" class="not-visible"> Informations de livraison</h6>
         <div id="">
             <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
                 <div data-v-02611d7b="" class="payment-mode">Mode de livraison :   </div> 
                 
                                                              <div data-v-02611d7b="" class="payment-mode">Adresse de facturation :  19 rue Henri chevreau </div> 
                 <div data-v-02611d7b="" class="payment-mode">Code postal :  75020</div> 
                 <div data-v-02611d7b="" class="payment-mode">Ville :  PARIS </div>
                 <div data-v-02611d7b="" class="payment-mode">Pays :  France </div>

             </div>

         </div>
     </div>
     <div data-v-561bb412="" class="quote-footer">
         <div id="comm">

             <div data-v-561bb412="" class="quote-notes" data-bs-toggle="modal" data-bs-target="#modalinfocomm">
                 <div data-v-561bb412="" class="editable inline-block">
                     <span data-v-561bb412="" class="">
                 
             </span>
                 </div>
             </div> 
         </div>
         <div data-v-561bb412="" class="align-center"></div>
         <div data-v-561bb412="" class="quote-sign">
             <div data-v-561bb412="" class="row">
                 <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Bon pour accord</span>
                 </div>
                 <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Date, cachet et signature</span>
                 </div>
             </div>
             <div data-v-561bb412="" class="row">
                 <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Nom et fonction</span>
                 </div>
                 <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Précédé de la mention 'lu et approuvé'</span>
                 </div>
             </div>
         </div>
     </div>

 </div>

 </body>
</html>
ENDHTML;

$Url = '<span data-v-561bb412="">'. $mailto .'</span>';

$html1 = <<<'ENDHTML'
<div data-v-dc3a3862="" data-v-561bb412="" class="company-footer"
                                 style="color: rgb(0, 0, 0); background-color: transparent;  min-height: 20px;line-height: 10px;bottom: 0.4cm;">
                                <span data-v-dc3a3862="" class="align-center"> Passiondecor - PASSION DECOR, 209 Avenue de la république 93800 Epinay sur seine France <br></span>
                                <span data-v-dc3a3862="" class="align-center">Pour toute assistance, merci de nous contacter :<br></span>
                                <span data-v-dc3a3862="" class="align-center" > Tél. : 09 53 01 76 14<br></span>
                                <span data-v-dc3a3862="" class="align-center"> *Vous devez vérifier la conformité de la marchandise réceptionnée (emballage, contenu, etat) avant de signer le bon de livraison du transporteur
                                    pour signaler, le cas échéant, les dommages dus au transport sur les bons de livraison. Le livreur doit assister au déballage et attendre l’ouverture des colis.</span>
                            </div>
ENDHTML;
$html1 .= number_format($facture['frais_liv'], 2, ".", " ");


 $tvaVal = ((float)$facture['tva_liv'] * 100) / (float)$facture['frais_liv'];

    
$Url = '<table><tr data-v-248579a2=""><td data-v-248579a2="">Frais de port</td><td data-v-248579a2="" role="" class="r-number" id="" onchange="">' . $facture['frais_liv'] . '€</td></tr></table>';
 
$html3 = <<<ENDHTML
<span data-v-561bb412=""> $mailto</span>
ENDHTML;
$mailto1 = $client['email'];
$mail = $client['email'];
$tel = $client['tel'];
$adr = $client['adr'];
$ville = $client['ville'];
$pays = $client['pays'];
$cp = $client['cp'];
$civ = $client['civ'];
$prenom = $client['prenom'];
$nom = $client['nom'];
$soc = $client['nom_soc'];
$titre = $facture['titre'];
$facNum = $facture['num'];
$dateAdd = $facture['date_add'] ;
$html4 = <<<ENDHTML
<div data-v-561bb412="" class="quote-header">
<div data-v-561bb412="" class="quote-header">
<div data-v-561bb412="">
    <div data-v-561bb412=""  class="quote-title  inline-block " >
        <span data-v-561bb412="" class="">
             $titre
        </span>
    </div>
</div>
<div data-v-561bb412="">
<div data-v-561bb412="" class="quote-name inline-block">
    <span data-v-561bb412=""  >
        Numéro de Proforma : <br>
         $facNum  <br>

    </span>
    <span data-v-561bb412="">
        Proforma

    </span>
    <div data-v-561bb412="" class="quote-date">
        du
        $dateAdd
 
    </div>
</div>
</div>
<div data-v-561bb412="">
    <div data-v-561bb412="" class="row address-informations">
        <div data-v-561bb412="" class="company-infos col">
            <div data-v-561bb412="">&nbsp;</div>
            <div data-v-561bb412="" class="company-name">Passiondecor</div>
            <div data-v-561bb412="" class="company-phone">PASSION DECOR, 209 Avenue de</div>
            <div data-v-561bb412="" class="company_city">la république 93800 Epinay sur</div>
            <div data-v-561bb412="" class="company-name">seine France</div>

        </div>

        <div data-v-561bb412="" id="client" class="client-infos  inline-block col"  data-bs-toggle="modal" data-bs-target="#modalinfoc">

            <span data-v-561bb412="">
                <div data-v-561bb412="" class="grey-title">Adresse de facturation</div>
                <div data-v-561bb412="" class="contact_contact">
                     $soc <br>
                     $civ  $prenom $nom'
                </div>

                <div data-v-561bb412="" class="client_city">  $adr <br>  $cp $ville  $pays   </div>
                <div data-v-561bb412="" class="contact_phone"> $tel </div>
                <div data-v-561bb412="" class="contact_email"> $mail </div>
            </span>
        </div>

    </div>
</div>
</div>
</div>
ENDHTML;

//$html1 .= $mailto;
//$html1 .= <<<'ENDHTML'
//</span>
//ENDHTML;




//$htmll = file_get_contents("http://www.shoppassiondecor.fr/detail_espace_22_11.php?id=123");




$filename = md5(rand()) . '.pdf';

 
$pdf = new Pdf();
$pdf->load_html($html4);
$pdf->render();
$file = $pdf->output();
file_put_contents($filename, $file);
$content = $file;
$content = chunk_split(base64_encode($content)); 

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (RFC)
$eol = "\r\n";

// main header (multipart mandatory)
$headers = "From: PASSION DECOR <mailing@service.passiondecor.fr>" . $eol;
$headers .= 'BCC: benabbesbilel@gmail.com' . "\r\n";
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
$headers .= "Content-Transfer-Encoding: 7bit" . $eol;
$headers .= "This is a MIME encoded message." . $eol;

// message
$body = "--" . $separator . $eol;
//$body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
$body .= "Content-Type: text/html; charset=”UTF-8”" . $eol;
$body .= "Content-Transfer-Encoding: 8bit" . $eol;
$body .= $message . $eol;

// attachment
$body .= "--" . $separator . $eol;
//$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
//$body .= "Content-Transfer-Encoding: base64" . $eol;
//$body .= "Content-Disposition: attachment" . $eol;
//$body .= $content . $eol;
// On lui dit (dans le Content-type) que c'est un fichier PDF
$body .= 'Content-Type: application/pdf; name="'.$filename.'"' . $eol;
$body .= 'Content-Transfer-Encoding: base64' . $eol;
$body .= 'Content-Disposition: attachment; filename="'.$filename.'"' . $eol;
$body .= $content . $eol;

//SEND Mail
if (mail($mailto, $subject, $body, $headers , $message)) {
    echo "mail send ... OK"; // or use booleans here

} else {
    echo "mail send ... ERROR!";
 //   print_r( error_get_last() );
}























?>