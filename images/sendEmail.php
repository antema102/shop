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
$message .= '<h1>Salut John!</h1>';
$message .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin efficitur, velit quis eleifend fringilla, urna lectus finibus est, ut aliquam nulla tellus vel ipsum. Pellentesque in vulputate leo, sit amet mattis sem. Sed id gravida turpis, et luctus augue. Ut vitae ipsum volutpat, cursus dui sit amet, egestas mi. Etiam bibendum, dolor in sollicitudin facilisis, diam odio ultricies ligula, sit amet rutrum diam justo at eros. Nam mollis efficitur vestibulum. Aenean mi enim, tempus et ornare et, convallis vitae odio. Aliquam tincidunt, massa hendrerit volutpat faucibus, nulla erat lobortis nulla, vitae egestas lectus est sit amet nibh. Ut pretium ligula non risus sollicitudin, porta laoreet sem viverra. Praesent vulputate purus massa, vitae luctus nunc rutrum quis. Vestibulum dignissim semper urna, in rhoncus tortor. Quisque volutpat massa nisl, sit amet elementum nibh lobortis id. Vestibulum mollis leo ex, non aliquam risus lobortis a.</p>';
$message .= '<a href="https://www.flaticon.com/fr/sticker-gratuite/printemps_4433174" class="view link-icon-detail related-icon" title="printemps" data-id="4433174">
            <img src="https://cdn1.passiondecor.net/img/passion-decor-logo-1508710214.jpg" data-src="https://cdn1.passiondecor.net/img/passion-decor-logo-1508710214.jpg" alt="printemps" title="printemps" width="64" height="64" class="lzy lazyload--done" srcset="src="http://www.shoppassiondecor.fr/static/logo.jpg">
        </a>';
	
	
$message .=	'<a href="https://www.flaticon.com/fr/sticker-gratuite/printemps_4433174" class="view link-icon-detail related-icon" title="printemps" data-id="4433174">
	<img alt="" width="640" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#000000;line-height:13px;display:block;border:none" class="m_-7981535783240864651t_w100p m_-7981535783240864651m_w100p CToWUd a6T" src="https://ci5.googleusercontent.com/proxy/NrnHc__kAmJiAv9zK6gdPSFxzg3d6V37fDNjLVTvzhuLmvh33-WSXj4ehx-VJD4FftRfCoad0Tmu9Jar9IoSHxhzbLSRNjRgR4ki69-LAA6qgTC9yio1MbJPuh9q=s0-d-e1-ft#http://emc2.lefigaro.fr/images/DOL/EMAILS_MARKETING/2021/s43/Fig_Mag/2.jpg" tabindex="0">
		</a>';
		
		
		$message .= '<a href="https://www.flaticon.com/fr/sticker-gratuite/printemps_4433174" class="view link-icon-detail related-icon" title="printemps" data-id="4433174">
            <img src="/var/www/html/images/capture slide 3333333333333.JPG" data-src="/var/www/html/images/capture slide 3333333333333.JPG" alt="printemps" title="printemps" width="64" height="64" class="lzy lazyload--done" srcset="src="/var/www/html/images/capture slide 3333333333333.JPG">
        </a>';
		
		
		 
		
		
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
                     <span data-v-561bb412="">D??signation</span>
                 </th>
                 <th data-v-561bb412="" class="text--right text--nowrap">
                     <span data-v-561bb412="">P.u. HT</span>
                 </th> 
                 <th data-v-561bb412="" class="text--right text--nowrap">
                     <span data-v-561bb412="">Qt??.</span>
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
                         <th data-v-248579a2="" colspan="2" class="first-line">R??capitulatif</th>
                     </tr> 
                     <tr data-v-248579a2="" class="sstitre transport" style="display: none;">
                         <td data-v-248579a2="" colspan="2">Transport</td>
                     </tr> <!----> <!----> <!---->
                                                                     <tr data-v-248579a2="">
                         <td data-v-248579a2="">Montant total HT</td> 
                         <td data-v-248579a2="" role="totalHT" class="r-number">
                              ???</td>
                     </tr>
                     <tr data-v-248579a2="">
                         <td data-v-248579a2="">Montant total TVA</td>
                         <td data-v-248579a2="" role="totalTVA" class="r-number">
                              ???</td>
                     </tr>
                     <tr data-v-248579a2="" class="total">
                         <td data-v-248579a2="">Montant total TTC</td>
                         <td data-v-248579a2="" role="total_ttc" class="r-number">
                              ???</td>
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
                 <div data-v-02611d7b="" class="limit-date">Validit?? de l'offre :21-11-2021  </div> 
                 <div data-v-02611d7b="" class="payment-mode">Mode de paiement : 
                     Esp??ces                                            </div> 
                 <div data-v-561bb412="" class="payment-delay">  R??glement ?? J+0</div>
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
                 <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Pr??c??d?? de la mention 'lu et approuv??'</span>
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
                                <span data-v-dc3a3862="" class="align-center"> Passiondecor - PASSION DECOR, 209 Avenue de la r??publique 93800 Epinay sur seine France <br></span>
                                <span data-v-dc3a3862="" class="align-center">Pour toute assistance, merci de nous contacter :<br></span>
                                <span data-v-dc3a3862="" class="align-center" > T??l. : 09 53 01 76 14<br></span>
                                <span data-v-dc3a3862="" class="align-center"> *Vous devez v??rifier la conformit?? de la marchandise r??ceptionn??e (emballage, contenu, etat) avant de signer le bon de livraison du transporteur
                                    pour signaler, le cas ??ch??ant, les dommages dus au transport sur les bons de livraison. Le livreur doit assister au d??ballage et attendre l???ouverture des colis.</span>
                            </div>
ENDHTML;
$html1 .= number_format($facture['frais_liv'], 2, ".", " ");


 $tvaVal = ((float)$facture['tva_liv'] * 100) / (float)$facture['frais_liv'];

    
$Url = '<table><tr data-v-248579a2=""><td data-v-248579a2="">Frais de port</td><td data-v-248579a2="" role="" class="r-number" id="" onchange="">' . $facture['frais_liv'] . '???</td></tr></table>';
 
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
        Num??ro de Proforma : <br>
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
            <div data-v-561bb412="" class="company_city">la r??publique 93800 Epinay sur</div>
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
$body .= "Content-Type: text/html; charset=???UTF-8???" . $eol;
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
    print_r( error_get_last() );
}























?>