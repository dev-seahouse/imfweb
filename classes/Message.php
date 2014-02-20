<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Job.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Applicant.php");
require_once($_SERVER["DOCUMENT_ROOT"] . '/imfweb/Swift-5.0.3/swift_required.php');

/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/8/14
 * Time: 9:25 PM
 */
class Message
{
    private $db_connection;
    private $errors;


    public function __construct()
    {
        $this->db_connection = null;


    }

    public function sent_message($job_id, $company_id, $company_name)
    {

        $job = new Job();
        $applicant = new Applicant();
        $result_set = $job->get_job_by_jid($job_id);
        while ($row = $result_set->fetch_array(MYSQLI_ASSOC)) {
            $scopename = $row['ScopeName'];
            $jobdate = date("d M Y", strtotime($row['JobDate']));
            $jobstarttime = date("h:i A", strtotime($row['JobStartTime']));
        }

        $result_set = $applicant->get_applicants_detail_for_msg($job_id);
        $count = $result_set->num_rows;
        $registration_ids = array();
        if ($count > 0) {
            $subject = "(URGENT) IMF Job Cancellation Notice";
            $emailmsg = "Dear IMF User\n\nWe regret to inform you that the following Job that you've recently applied for\nhave been Cancelled by the Management due to unforeseen circumstances.\n*********************************\n" . $company_name . "\nPosition: " . $scopename . "\nJob Date: " . $jobdate . "\nStart Time: " . $jobstarttime . "\n*********************************\nRegards.\nThis is an automated generated email.";
            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
                ->setUsername('imf@syahiran.com')
                ->setPassword('imf123qwe');

            $mailer = Swift_Mailer::newInstance($transport);
            $message = Swift_Message::newInstance($subject)
                ->setFrom(array('imf@syahiran.com' => 'IMF NO-REPLY'))
                ->setBody($emailmsg);
            while ($row = $result_set->fetch_array(MYSQLI_ASSOC)) {
                $message->addBcc($row['Email'], $row['Firstname'] . ' ' . $row['Lastname']);
                if (!($row['NotificationRegID'] === NULL)) {
                    $registration_ids[] = $row['NotificationRegID'];
                }
            }
            $result = $mailer->send($message);

            // Prepare GSM
            $msg = array
            (
                'title' => 'Job Cancellation Notice',
                'message' => 'An applied job have been cancelled!',
                'vibrate' => 1,
                'sound' => 1,
                'msgcnt' => $job_id
            );
            $fields = array
            (
                'registration_ids' => $registration_ids,
                'data' => $msg
            );
            $headers = array
            (
                'Authorization: key=AIzaSyBHQcwr3aVGVNukW50vSXHj-6pzR1mZTtc',
                'Content-Type: application/json'
            );

            $result .= " [GSM Log:]";
            // Sent GSM
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result .= curl_exec($ch);
            curl_close($ch);

            return $result;
        }


    }


    //-- get company data


}