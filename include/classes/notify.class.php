<?PHP
function Send_Email_Notify($id=0,$msg='',$email,$Type=0) {
	# Check Config
	if (!MWM_EMAIL_ENABLED) {
		return true;
	}
	# Subject & Data
	switch ($Type) {
		case 1:  // status change				
			$Subject = "";			
			$Body  =$msg;
			break;
		case 2:  // comment added
			$Subject = "";
			$Body  = $msg;
			break;
		case 3: 
		case 4: 
			break;
		case 5:
			break;
	}		
	# Message
	$Message  = $Body;
	$To = $email;
	SwiftMail($From, $To, $Subject, $Message);
}

function SwiftMail($From, $To, $Subject, $Messa) {
	require(MWM_EMAIL_DIR."swift_required.php");
	$transport = Swift_SmtpTransport::newInstance();	
	$mailer = Swift_Mailer::newInstance($transport);	
	$message = Swift_Message::newInstance($Subject)
  	->setFrom(array(MWM_EMAIL_FROM => MWM_EMAIL_FROM_NAME))
	  ->setTo($To)
	  ->setBody($Messa,'text/html')
	  ;
	$numSent = $mailer->batchSend($message);	
}
?>
