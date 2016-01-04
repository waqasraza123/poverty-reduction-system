<!DOCTYPE html>
<?php
$to = "mariahameed95@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";
echo $message;
// Always set content-type when sending HTML email
 $header = "From:mariahameed95@gmail.com \r\n";
//         $header = "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
		 
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true )
         {
            echo "Message sent successfully...";
         }
         else
         {
            echo "Message could not be sent...";
         }
      ?>