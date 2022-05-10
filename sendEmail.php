<?php
include 'db.php';
include('pdf.php');


$description=$_POST['description'];

$mailto = $_GET['emailClient'];
$host = $_GET['host'];
$fileName = $_GET['fileName'];
$protocol = $_GET['protocol'];
$fileId = $_GET['fileId'];

$message="<html><body>";

 
	$message .='<p> 
		  <table cellpadding="0" cellspacing="0" border="0" width="120" align="center" style="margin:auto;width:120px" class="m_4197201061503405501t_w80px m_4197201061503405501m_w80px" role="presentation">
<tbody><tr>
<td style="padding-bottom:10px;text-align:center" class="m_4197201061503405501t_pb5px m_4197201061503405501m_pt0px m_4197201061503405501m_pb5px">
<a href="https://passiondecor.net/fr/" style="color:#000000;outline:none;border:none" title="PASSION DÉCOR" target="_blank" data-saferedirecturl="https://passiondecor.net/fr/"><img src="http://www.shoppassiondecor.fr/static/passion-decor-logo.jpg" alt="Passiondecor" width="200" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:13px;display:block;border:none" class="m_4197201061503405501t_w100p m_4197201061503405501m_w100p CToWUd">
</a>
</td>
</tr>
</tbody></table>
</p>';

$message .='<p>	  
		  <table cellpadding="0" cellspacing="0" border="0" width="640" align="center" style="margin:auto;width:640px" class="m_-8726938381304068146t_w100p m_-8726938381304068146m_w100p">
<tbody><tr>
<td>
<table cellpadding="0" cellspacing="0" border="0" width="640" align="center" style="opacity:1;margin:auto;background-color:#7D3C98;width:640px" class="m_-8726938381304068146t_w100p m_-8726938381304068146m_w100p">
<tbody><tr>
<td>
<table cellpadding="0" cellspacing="0" border="0" width="640" align="center" style="margin:auto;width:640px" class="m_-8726938381304068146t_w100p m_-8726938381304068146m_w100p" role="presentation">
<tbody><tr>
<td style="font-family:Arial,Helvetica,sans-serif;color:#fff;text-align:center;font-size:43px;padding-top:50px;padding-bottom:7px;vertical-align:middle;font-weight:bold" class="m_-8726938381304068146t_fz40px m_-8726938381304068146t_pt52px m_-8726938381304068146t_pb6px m_-8726938381304068146m_fz40px m_-8726938381304068146m_pb5px">
<a href="https://passiondecor.net/fr/" style="color:#fff;display:block;text-decoration:none;outline:none" title="PASSION DÉCOR" target="_blank" data-saferedirecturl="https://passiondecor.net/fr/">Merci !
</a>
</td>
</tr>
</tbody></table>
<table cellpadding="0" cellspacing="0" border="0" width="64" align="center" style="margin:auto;clear:both;width:64px" class="m_-8726938381304068146t_w10p m_-8726938381304068146m_w10p" role="presentation">
<tbody><tr>
<td height="5" style="height:5px;font-size:5px;line-height:5px;vertical-align:bottom" class="m_-8726938381304068146m_h10px m_-8726938381304068146m_fz10px m_-8726938381304068146m_lh10px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" style="width:100%;clear:both">
<tbody><tr>
<td style="border-top:1px solid #fff;height:2px;font-size:2px;line-height:2px" class="m_-8726938381304068146m_h4px m_-8726938381304068146m_fz4px m_-8726938381304068146m_lh4px">&nbsp;</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table cellpadding="0" cellspacing="0" border="0" width="640" align="center" style="margin:auto;clear:both;width:640px" class="m_-8726938381304068146t_w100p m_-8726938381304068146m_w100p" role="presentation">
<tbody><tr>
<td height="50" style="height:50px;font-size:50px;line-height:50px" class="m_-8726938381304068146t_h52px m_-8726938381304068146t_fz52px m_-8726938381304068146t_lh52px">
&nbsp;
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
		  </p>';	  
		  
$message .='<p>
 
 <table align="center">
    <td style="font-family:Arial,Helvetica,sans-serif;color:#000000;text-align:center;font-size:18px;padding-top:10px;padding-bottom:10px;vertical-align:middle">
		 <br>
		    
		  
		  <span style="color:#163860">Merci pour votre confiance. Vous trouverez en pièce jointe le detail de votre commande</span> <br>
		  <span style="color:#163860">Nous vous souhaitons une belle décoration avec nos produits design et de qualité.</span> <br>
		  
		  <span style="color:#163860">Votre équipe</span>
		  <span style="font-weight:700;color:#163860">PASSION <span class="il">DÉCOR</span></span>
		   <span style="color:#163860">toujours à vos côtés.</span><br>
		  <span style="color:#163860">Au plaisir de vous revoir très bientôt !</span> <br>
		  <span style="color:#163860"><span class="il">passiondecor.net !</span> </span><br>&nbsp;</td>
		
</table>
		  </p>';
		  
		  
$message .=	'<a href="" class="view link-icon-detail related-icon" title="printemps" data-id="4433174">	
<table cellpadding="0" cellspacing="0" border="0" width="64" align="center" style="margin:auto;clear:both;width:64px" class="m_6477671938919898942t_w10p m_6477671938919898942m_w10p" role="presentation">
<tbody><tr>
<td height="5" style="height:5px;font-size:5px;line-height:5px;vertical-align:bottom" class="m_6477671938919898942m_h10px m_6477671938919898942m_fz10px m_6477671938919898942m_lh10px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" style="width:100%;clear:both">
<tbody><tr>
<td style="border-top:1px solid #fff;height:2px;font-size:2px;line-height:2px" class="m_6477671938919898942m_h4px m_6477671938919898942m_fz4px m_6477671938919898942m_lh4px">&nbsp;</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table cellpadding="0" cellspacing="0" border="0" width="640" align="center" style="margin:auto;clear:both;width:640px" class="m_6477671938919898942t_w100p m_6477671938919898942m_w100p" role="presentation">
<tbody><tr>
<td height="50" style="height:50px;font-size:50px;line-height:50px" class="m_6477671938919898942t_h52px m_6477671938919898942t_fz52px m_6477671938919898942t_lh52px">
&nbsp;
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table></a>';





$message .=	'<a href="" class="view link-icon-detail related-icon" title="" data-id="4433174">	

<table cellpadding="0" cellspacing="0" border="0" width="300" align="center" style="" class="m_-4191148184275708509t_w100p m_-4191148184275708509m_w100p">
<tbody>
<tr>
<td style="padding-top:0px;padding-bottom:0px;text-align:center" class="m_-4191148184275708509m_pr10px m_-4191148184275708509m_pl10px">
<a href="" style="text-align: center" class="view link-icon-detail related-icon" title="" data-id="4433174">
	<img alt="" width="300" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#000000;line-height:13px;display:block;border:none" class="m_-7981535783240864651t_w100p m_-7981535783240864651m_w100p CToWUd a6T" src="http://www.shoppassiondecor.fr/static/merci.jpg" tabindex="0">
		</a>


</td>
<tr> 
</tbody>
</table>
</a>';
 

	
		
$message .= '</body></html>';
 
		  
		  
		  /*$message .='<p >
 
 <table align="center">
    <td style="font-family:Arial,Helvetica,sans-serif;color:#000000;text-align:center;font-size:8px;padding-top:2px;padding-bottom:10px;vertical-align:middle">
		 <br>
		   <span style="color:#163860">
Passiondecor - PASSION DECOR, 209 Avenue de la république 93800 Epinay sur seine France
Pour toute assistance, merci de nous contacter :</span><br>
  <span style="color:#163860">
Tél. : 09 53 01 76 14<br></span>
<span style="color:#163860">*Vous devez vérifier la conformité de la marchandise réceptionnée (emballage, contenu, etat) avant de signer le bon de livraison du transporteur pour signaler, 
le cas échéant, les dommages dus au transport sur les bons de livraison. Le livreur doit assister au déballage et attendre l’ouverture des colis.</span>
		  
		   
		  </td>
		
</table>
		  </p>';*/
		  

		  
		  
$description = wordwrap($description, 100,"<br/>"); 

$pathFile = $protocol . "//". $host . $fileName . $fileId;
$result11 = file_get_contents($pathFile);
$result11 = utf8_decode($result11);
$doc = new DomDocument( "1.0", "utf-8" );
$doc->loadHtml($result11);
$xpath = new DomXPath($doc);

$result1 = $doc->saveHTML($xpath->query('//*[@id="contentEmail"]')->item(0));

//$mailto = $client['email'];
$subject = 'Merci pour votre achat !'; 

$x = '?';
$y = '€';
$result1 = str_replace($x, $y, $result1);
$char1 = 'Ajouter un commentaire';
$result1 = str_replace($char1,'<br>', $result1);
$char2 = 'Bon pour accord';
$char3 = "Précédé de la mention 'lu et approuvé'";
$char4 = 'Nom et fonction';
$char5 = 'Date, cachet et signature';
$result1 = str_replace($char2,'', $result1);
$result1 = str_replace($char3,'', $result1);
$result1 = str_replace($char4,'', $result1);
$result1 = str_replace($char5,'', $result1); 
$result1 = <<<ENDHTML
<!DOCTYPE html>
<body>
<style>
.test {
    margin-top: 20px;
}
.padT {
    padding-top: 100px;
}
.colR{
    float: left;
    width: 50%;
}
.colL{
    float: left;
    width: 50%;
}
.logoStyle {
    height: 100px;
}
.document_summary[data-v-248579a2] {
    margin-top: 19px;
    display: inline-block;
    width: 100%;
    left: 50%;
    float: right;
}
.page > .content .address-informations[data-v-561bb412] {
    padding: 0 15px;
    line-height: 17px;
    font-size: 12px;
    text-align: left;
}
.page > .content .client-infos[data-v-561bb412] {
    display: inline-block;
}
.page > .content .company-infos[data-v-561bb412] {
    margin-bottom: 8px;
    display: inline-block;
}
.page > .content > .quote-lines[data-v-561bb412] {
    width: 100%;
    color: #263238;
    font-size: 12.5px !important;
}
.page > .content .quote-notes[data-v-561bb412] {
    text-align: left;
    margin: 10px 0;
}
.quote-sign[data-v-561bb412] {
    margin-top: 16px;
    height: 67px;
}
.page > .content > .quote-lines > .quote-lines-table[data-v-561bb412] {
    width: 100%;
    outline: 1px solid #EEE;
    position: relative;
}
table {
    display: table;
    caption-side: bottom;
    border-collapse: collapse;
    box-sizing: border-box;
    text-indent: initial;
    white-space: normal;
    line-height: normal;
    font-weight: normal;
    font-size: medium;
    font-style: normal;
    color: -internal-quirk-inherit;
    text-align: start;
    border-spacing: 2px;
    border-color: grey;
    font-variant: normal;
}
.bodyC {
    border-color: ghostwhite;
    border-style: solid;
    border-width: 0.1px;
}
.subtitle[data-v-561bb412] {
    padding: 0px 6px;
    font-weight: 400;
}
.company-footer[data-v-dc3a3862] {
    position: absolute;
    font-size: 11px;
    text-align: center;
    width: 100%;
    left: 0px;
    padding: 0 0.5cm;
	color: rgb(0, 0, 0);
    background-color: transparent;
    min-height: 20px;
    line-height: 10px;
    bottom: 0.4cm;
}
</style>
$result1
</body>
</html>
ENDHTML;
//$filename = md5(rand().'.pdf');
$filename = 'deco.pdf';


 //dompdf library
$pdf = new Pdf();
/*$pdf->set_option( 'isHtml5ParserEnabled', true);
$pdf->set_option( 'isRemoteEnabled', true);
$pdf->set_option( 'defaultMediaType', 'all' );
$pdf->set_option( 'isFontSubsettingEnabled', true );
$pdf->set_option( 'isPhpEnabled', true );
$pdf->set_option( 'isJavascriptEnabled', true );
$pdf->set_option('defaultFont', 'OpenSans');

$pdf->loadHtml( $result1, 'UTF-8' );

$pdf->render();
$file = $pdf->output();*/
//file_put_contents($filename, $file);
//$content = $file;
$content = chunk_split(base64_encode($file)); 

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (RFC)
$eol = "\r\n";

// main header (multipart mandatory)
$headers = "From: PASSION DECOR <mailing@service.passiondecor.fr>" . $eol;
//$headers .= 'BCC: benabbesbilel@gmail.com, contact@passiondecor.net, passiondecor1@gmail.com' . "\r\n";
$headers .= 'BCC: benabbesbilel@gmail.com' . "\r\n";
$headers .= "MIME-Version: 1.0" . $eol;
//$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
//$headers .= "Content-Transfer-Encoding: 7bit" . $eol;
//$headers .= "This is a MIME encoded message." . $eol;
$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= "This is a MIME encoded message.".$eol;

// message
$body = "--" . $separator . $eol;
//$body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
$body .= "Content-Type: text/html; charset=”UTF-8”" . $eol;
$body .= "Content-Transfer-Encoding: 8bit" . $eol .$eol;
//$body .= $emailClient . $eol;
$body .= $message . $eol;

// attachment
$body .= "--" . $separator . $eol;
//$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
//$body .= "Content-Transfer-Encoding: base64" . $eol;
//$body .= "Content-Disposition: attachment" . $eol;
//$body .= $content . $eol;
// On lui dit (dans le Content-type) que c'est un fichier PDF
//$body .= 'Content-Type: application/pdf; name="'.$filename.'"' . $eol;
$body .= "Content-Type: application/pdf; name=\"".$filename."\"".$eol; 
$body .= 'Content-Transfer-Encoding: base64' . $eol;
//$body .= 'Content-Disposition: attachment; filename="'.$filename.'"' . $eol;
$body .= "Content-Disposition: attachment".$eol.$eol;

$body .= $content . $eol; 
$body .= "--".$separator."--";


//SEND Mail
if (mail($mailto, $subject, $body, $headers , $message)) {
    echo "mail send ... OK"; // or use booleans here

} else {
    echo "mail send ... ERROR!";
    print_r( error_get_last() );
}























?>