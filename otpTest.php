<?php
include_once('wp-load.php');
if($_POST['approach'] == 'verify'){
	$intPhoneNumber = trim($_POST['intphonenumber']);
	$intOtpProvide = trim($_POST['otpvalue']);
	global $wpdb;
	$isrecordAvailable = $wpdb->get_row( "SELECT * FROM wp_otp WHERE otp = $intOtpProvide and phonenumber = $intPhoneNumber and status ='started' ", ARRAY_A );
	//print_r($mylink);

	if ( null !== $isrecordAvailable ) {
		$wpdb->update(  'wp_otp',  array(  'status' => 'verified' ), array( 'id' => $isrecordAvailable['id'] ),  array(  '%s' ), array( '%d' ) );
	 	echo "verified.";
	} else {
	 	echo "wrong otp";
	}
}else if($_POST['approach'] == 'generate'){
	global $wpdb;
	$intPhoneNumber = trim($_POST['intphonenumber']);
	$intRandotp = rand('1000','9999');
	$isrecordAvailable = $wpdb->get_row( "SELECT * FROM wp_otp WHERE phonenumber = $intPhoneNumber and status ='started' ", ARRAY_A );
	if ( null !== $isrecordAvailable ) {
	 	echo "in";
	 	$wpdb->update(  'wp_otp',  array(  'otp' => $intRandotp ), array( 'id' => $isrecordAvailable['id'] ),  array(  '%s' ), array( '%d' ) );
	 	echo $wpdb->show_errors();
	 	echo "otp updated.";
	} else {
	 	$wpdb->insert('wp_otp', array(  'otp' => $intRandotp,  'phonenumber' => $intPhoneNumber, 'status'=> 'started' ), array(  '%s', '%s', '%s' )  );
		echo "true";
	}

	
}else {
	echo "not allowed";
}


?>