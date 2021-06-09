<?php
$Emailerror =" "; 
$nameerror =" ";
$GENDERerror =" ";
$WEBSITEerror =" " ;
if (isset($_POST["submit"]))
{
if (empty($_POST["NAME"])){
	$nameerror = "Name required";
}
else {
	$Name = test_user_input($_POST["NAME"]);
	if (!preg_match("/^[A-Za-z .]*$/",$Name)){
		$nameerror ="only letter and white spaces are allowed";
	}
}
if (empty($_POST["GENDER"])){
	$GENDERerror = "GENDER required";
}
else {
	$gen = test_user_input($_POST["GENDER"]);
}
if (empty($_POST["WEBSITE"])){
	$WEBSITEerror = "WEBSITE required";
}
else {
	$web = test_user_input($_POST["WEBSITE"]);
	if (!preg_match("/(https:|ftp:)\/\/+[a-zA-z0-9 .\-_\?\$=&\#\~`!]+\/.[a-zA-z0-9 .\-_\?\$=&\#\~`!]*/",$web)){
		$WEBSITEerror ="please check the entry";
	}
}
if (empty($_POST["E-mail"])){
	$Emailerror = "E-mail required";
}
else {
	$email = test_user_input($_POST["E-mail"]);
	if (!preg_match("/[A-Za-z0-9._-]{3,}@[A-Za-z0-9._-]{3,}[.]{1}[A-Za-z0-9._-]{2,}/",$email)){
		$Emailerror ="check your email address";
	}
}
if ((!empty($_POST["NAME"])) && (!empty($_POST["E-mail"])) && (!empty($_POST["GENDER"])) && (!empty($_POST["WEBSITE"]))){
if ((preg_match("/^[A-Za-z .]*$/",$Name)==true) &&	(preg_match("/(https:|ftp:)\/\/+[a-zA-z0-9 .\-_\?\$=&\#\~`!]+\/.[a-zA-z0-9 .\-_\?\$=&\#\~`!]*/",$web)==true) && (preg_match("/[A-Za-z0-9._-]{3,}@[A-Za-z0-9._-]{3,}[.]{1}[A-Za-z0-9._-]{2,}/",$email)==true))
{
echo "<h2> yuor submit info </h2><br>";
echo "NAME : {$_POST["NAME"]}<br>";
echo "EMAIL : {$_POST["E-mail"]}<br>";
echo "GENDER : {$_POST["GENDER"]}<br>";
echo "WEBSITE : {$_POST["WEBSITE"]}<br>";
echo "COMMENT : {$_POST["Comment"]}<br>";
}
else {
	echo '<span class = "Error">please complete and fill it correctly</span>';
}
}






}
?>
<?php function test_user_input($data) {
	return $data;
} 
?>

<!DOCTYPE>


 
<html> 
     <head>
           <title> FORM PROJECT </title>
     </head>
<style type="text/css">
	input [type ="text"],input[type ="email"],textarea{

		border: 1px solid-dashed;
		background-color:rgb(221,216,212);
		width: 600px;
		padding: .5em;
		font-size: 1.0em;
	}  
.Error{
	color: red;
}

</style>
      <body> 
<h2> FORM FOR INFO. </h2>
<form action ="form.php" method="POST">
<legend>* PLEASE FILL IT CORRECTLY.</legend>
<fieldset>
NAME :<br>
<input class ="input" type="text" name="NAME" > 
<span class = "Error">*<?php echo "$nameerror : "?></span><br>
E-mail :<br>
<input class ="input" type="text" name="E-mail" > 
<span class = "Error">*<?php echo "$Emailerror : "?></span><br>
GENDER :<br>
<input class ="radio" type="radio" name="GENDER" value="FEMALE">FEMALE
<input class ="radio" type="radio" name="GENDER" value="MALE">MALE
<input class ="radio" type="radio" name="GENDER" value="OTHERS">OTHERS

<span class = "Error">*<?php echo "$GENDERerror : "?></span><br>
WEBSITE :<br>
<input class ="input" type="text" name="WEBSITE" > 
<span class = "Error">*<?php echo "$WEBSITEerror : "?></span><br>
COMMENT :<br>
<textarea name="Comment" rows="5" cols ="25" > </textarea>
<br>
<br>
<input type="submit" name ="submit" value="submitted">
</fieldset>
</form> 
      	</body> 
</html> 