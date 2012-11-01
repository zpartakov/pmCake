
<?php

   $YourFile = "/home/radeff/.thunderbird/c8x1lvh2.default/ImapMail/mail.infomaniak.ch/INBOX";
    $YourFile = "/home/radeff/.thunderbird/c8x1lvh2.default/ImapMail/mail.infomaniak.ch/Junk";
    $YourFile = "/home/radeff/.thunderbird/c8x1lvh2.default/ImapMail/imap.unige-1.ch/security";
        $YourFile = "/home/radeff/.thunderbird/c8x1lvh2.default/ImapMail/imap.unige.ch/wait";
        $inbox = imap_open($YourFile,$username,$password) or die('Cannot connect to mail: ' . imap_last_error());
        print_r($inbox); exit;
        $fd = fopen($YourFile, "r");
$email = "";

while (!feof($fd)) {
	
    $email .= fread($fd, 1024);
    
    //echo $email ."<br>";
}
fclose($fd);
   // handle email
$lines = explode("\n", $email);

// empty vars
$from = "";
$subject = "";
$headers = "";
$message = "";
$splittingheaders = true;    
print_r($email);
?>