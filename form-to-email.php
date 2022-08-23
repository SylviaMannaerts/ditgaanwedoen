<?php 
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

$formcontent="From: $name \n Message: $message";
$recipient = "snmannaerts@gmail.com";
$subject = "Ditgaanwedoen.nl Contact \n $subject"";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Dankjewel voor je bericht!" . " -" . "<a href='ditgaanwedoen.nl' style='text-decoration:none;color:#ff0099;'> Terug naar de website </a>";
?>






<?php
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>
