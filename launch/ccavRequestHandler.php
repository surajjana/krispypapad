<html>
<head>
<title>Krispypapad | Payment Process</title>
</head>
<body>
<center>

<?php 

	include('Crypto.php');

	error_reporting(0);
	
	$merchant_data='';
	$working_key='7D9D1B56365DC282F2F83E8B1C9D4A04';//Shared by CCAVENUES
	$access_code='AVHA69EB15AS94AHSA';//Shared by CCAVENUES
	
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}


	$encrypted_data = encrypt($merchant_data,$working_key); // Method for encrypting the data.

	/*echo $encrypted_data;*/

?>

<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

