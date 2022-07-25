<?php include('header.php'); ?>
<br> <br><br><br>
<div class="col-md-12">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 text-center alert alert-success">
				<h5>
					<?php
					$to =$_POST['email'];
					$from = "info@congofirstchoice.com";
					$name ='First Choice';
					$subject = 'Merci de nous avoir rejoint';
					$number = '+243977743843';
					$cmessage = 'Votre inscription à la newsletter Marketing de Congo First Choice a bien été prise en compte <br>
					Tout les derniers samedis du mois, vous recevez des un condensé des conseils aux techniques des ventes pour Booster votre efficacité commerciale. <br>
					Vous pouvez nous contacter directement aux <br>

					+243998957572';

					$headers = "From: $from";
					$headers = "From: " . $from . "\r\n";
					$headers .= "Reply-To: ". $from . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$csubject = "Confirmation email.";
					$logo = 'assets/images/first.jpg';
					$link = 'www.firstchoice.com';

					$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
					$body .= "<table style='width: 100%;'>";
					$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
					// $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
					$body .= "</td></tr></thead><tbody><tr>";
					$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
					$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
					$body .= "</tr>";
					$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
					$body .= "<tr><td></td></tr>";
					$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
					$body .= "</tbody></table>";
					$body .= "</body></html>";


					if (mail($to, $subject, $body, $headers)) {
					echo 'Email envoyé avec succes';
					}else{
					echo 'Erreur du systeme de messagerie';
					}


          //        $newsletters = $_POST['newsletters'];
          //        if ($newsletters) {
          //          $myqwery=$db->prepare("INSERT INTO newsletters (email) VALUES (:newsletters)");
				      // $myqwery->execute(array(
				      // 'newsletters'=> $newsletters,
				      // ));
             
					?>
				</h5>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
<?php include('footer.php');?>

