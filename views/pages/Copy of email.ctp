<?php
echo "imap" .IMAPserverName; exit;
//Configure::write('debug', 2);
#exit;
//http://www.levijackson.net/page/parsing-an-email-message-with-phps-imap-functions
//$mbox = imap_open("{yourimapserver:143}", "yourimaplogin", "yourimapasswd");
$yesterday = date("d-M-Y", strtotime ("-15 days"));
$yesterday = date("d-M-Y", strtotime ("-5 days"));
$searchQuery = 'SINCE '.$yesterday;
echo "<br>since: " .$searchQuery ."<br>"; 
//exit;

$hostname = '{'.IMAPserverName.':143}INBOX';
//echo $hostname; exit;
$username = IMAPlogin;
$password = IMAPpasswd;

//echo "connect2: " .$hostname ." user: " .$username ." password: " .$password; exit;
 
// Initial connection to the inbox
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to mail: ' . imap_last_error());
 
/*
Une chaîne de caractères, délimitée par des espaces, dans laquelle les mots-clés suivants sont acceptés. Tous les arguments à plusieurs mots (e.g. FROM "joey smith") doivent être placés entre guillemets. Les résultats devront correspondre à toutes les entrées criteria.

    ALL - retourne tous les messages qui vérifient le reste du critère.
    ANSWERED - tous les messages avec le flag \\ANSWERED
    BCC "string" - tous les messages avec la chaîne "string" dans le champ Bcc
    BEFORE "date" - tous les messages avec Date : avant "date"
    BODY "string" - tous les messages avec "string" dans le corps
    CC "string" - tous les messages avec "string" dans le champ Cc
    DELETED - tous les messages effacés
    FLAGGED - tous les messages avec le flag \\FLAGGED (parfois interprété comme Important ou Urgent)
    FROM "string" - tous les messages avec la chaîne "string" dans le champ From
    KEYWORD "string" - tous les messages avec la chaîne "string" comme mot-clé
    NEW - tous les nouveaux messages
    OLD - tous les anciens messages
    ON "date" - tous les messages avec la date "date" comme champ Date
    RECENT - tous les messages avec le flag \\RECENT
    SEEN - tous les messages lus (avec le flag\\SEEN flag)
    SINCE "date" - tous les messages avec la date Date: après "date"
    SUBJECT "string" - tous les messages avec la chaîne "string" dans le champ Subject
    TEXT "string" - tous les messages avec le texte "string"
    TO "string" - tous les messages avec la chaîne "string" dans le champ To
    UNANSWERED - tous les messages non répondus
    UNDELETED - tous les messages non effacés
    UNFLAGGED - tous les messages non marqués
    UNKEYWORD "string" - tous les messages ne contenant pas le mot-clé "string"
    UNSEEN - tous les messages non lus
*/

// Grabs any e-mail that is not read
//$emails = imap_search($inbox,'UNSEEN');
$cond=date("U");
$cond=$cond-(7*24*3600);
$cond=date("d M Y",$cond);
$cond="11-Nov-2011";
//echo $cond; exit;


//$emails = imap_search($inbox,'SINCE '.$cond);
$emails = imap_search($inbox,$searchQuery);

if($emails) {
   foreach($emails as $email_number) {
    $title=imap_fetchheader($inbox, $email_number);
   	$message = imap_fetchbody($inbox,$email_number,1.1);
    if ($message == "") { // no attachments is the usual cause of this
    $title=imap_fetchheader($inbox, $email_number);
    $message = imap_fetchbody($inbox, $email_number, 1);
    }
    $from=preg_replace("/^.*From:/","",$title);
    $title=preg_replace("/^.*Subject:/","",$title);
    ################## todo bug
       #echo "#{$email_number->msgno}({$email_number->date}) - From:{$email_number->from {$overview->subject}\n}<br>"; 
    
   # echo "From: " .$from;
   # echo "<br>";
   # echo "Titre: " .$title;
   # echo "<br>Body<br>";                 
    //print_r(utf8_encode($message));
    echo utf8_encode($message);
    echo "<hr>";
 
   }// end foreach loop
} // end if($emails)
//imap_close($);
exit;
/*
 * http://learnwithachila.blogspot.com/2009/08/php-imap-class-for-reading-your-gmail.html
 * imap_reopen imap_check  retrieve_header imap_search imap_fetchstructure imap_header imap_fetchbody imap_body

function retrieve_message($mox,$messageid) 
{ 
   $message = array(); 
   $header = imap_header($this->mbox, $messageid); 
   $structure = imap_fetchstructure($this->mbox, $messageid);    
   $message['subject'] = $header->subject;  
   $message['fromaddress'] =   $header->fromaddress; 
   $message['toaddress'] =   $header->toaddress;  
   $message['ccaddress'] =   $header->ccaddress; 
   $message['date'] =   $header->date; 
   
  if ($this->check_type($structure)) 
  { 
   $message['body'] = imap_fetchbody($this->mbox,$messageid,"1"); ## GET THE BODY OF MULTI-PART MESSAGE 
   if(!$message['body']) {$message['body'] = '[NO TEXT ENTERED INTO THE MESSAGE]nn';} 
  } 
  else 
  { 
   $message['body'] = imap_body($this->mbox, $messageid); 
   if(!$message['body']) {$message['body'] = '[NO TEXT ENTERED INTO THE MESSAGE]nn';}  
  }  
    
  return $message;  
}  
*/
######### OK ##############

$mbox = imap_open("{yourimapserver:143}", "yourimaplogin", "yourimapasswd");
echo "<h1>Mailboxes</h1>\n";

$folders = imap_listmailbox($mbox, "{yourimapserver:143}", "*");
if ($folders == false) {
   echo "Appel échoué<br />\n";
} else {
   while (list($key, $val) = each($folders)) {
       echo $val . "<br />\n";
   }
}

echo "<h1>en-têtes dans INBOX</h1>\n";
 $num = imap_num_msg($mbox);
 echo "<h2># messages: " .$num ."</h2>";
$headers = imap_headers($mbox);
//sort($headers);
if ($headers == false) {
   echo "Appel échoué<br />\n";
} else {
   while (list ($key,$val) = each ($headers)) {
/*
 *    A    27)11-Oct-2011 =?ISO-8859-1?Q?Fr=E9 {NonJunk} fermeture anciens limesur (1710 chars)<br />
        28)12-Oct-2011 =?ISO-8859-1?Q?Fr=E9 {NonJunk} Re: login sur silene3 (ww (1924 chars)<br />
        29)17-Oct-2011 =?ISO-8859-1?Q?Fr=E9 {NonJunk} CMS pour les sites web de (7699 chars)<br />
        30)17-Oct-2011 Dominique Petitpierr {$Label1 NonJunk} attributs pour SP de sond (10626 chars)<br />
        31)18-Oct-2011 =?ISO-8859-1?Q?Fr=E9 {NonJunk} =?ISO-8859-1?Q?d=E9l=E9ga (121307 chars)<br />
        32)18-Oct-2011 =?ISO-8859-1?Q?Fr=E9 {NonJunk} script =?ISO-8859-1?Q?r=E (1682 chars)<br />


 */   	
       $id=preg_replace("/\).*$/","",$val);
       $id=preg_replace("/^.*  */","",$id);
       echo "id: " .$id ." <br>- " .$val . "<br />\n";
       
       retrieve_message($mbox,$id);
   }
}

imap_close($mbox);
exit;

?>