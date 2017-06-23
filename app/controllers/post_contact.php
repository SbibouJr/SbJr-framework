<?php /*
***************************************************
***************************************************
************ CONTROLLER / POST_CONTACT ************
***************************************************
***************************************************
*/
	$message = false;

	if (isset($_POST['message']) && isset($_POST['email']) && isset($_POST['name'])){
		$email = 'Expediteur 

		Pseudo :    '.htmlspecialchars($_POST['name']).'
		Email :    '.htmlspecialchars($_POST['email']).'

		message :

		'.htmlspecialchars($_POST['message']);

		mail("yourMail@domain.com","SbJrFramework",$email);

		$message = true;
	}

	header("location: ../../#contact?send=".$message);
