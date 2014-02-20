<?php
$subject = "IMF Account Details";
$emailmsg = "Here's your IMF Account Details:\n*********************************\n";
require_once 'Swift-5.0.3/swift_required.php';
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('imf@syahiran.com')
  ->setPassword('imf123qwe');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance($subject)
  ->setFrom(array('imf@syahiran.com' => 'IMF NO-REPLY'))
  ->setTo(array("o2q@xose.net"))
  ->setBody($emailmsg);

$mailer->send($message);
?>