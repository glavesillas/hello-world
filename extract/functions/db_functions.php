<?php

include_once("connectionstring.php");


function checkCredentials($eid,$pw)
{

	echo "$eid, $pw";
}





//buttons pressed

//login button
if(isset($_POST['login-btn']))
{
	$eid = $_POST['eid'];
	$pw = $_POST['pw'];
	checkCredentials($eid, $pw);
}



?>