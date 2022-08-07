<?php

include('config.php');
include('functions.php');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$from_address="ticketsys@onemaksys.com";
$to = 'automail480514315@ticketing.atera.com'; 


$first_name = $_POST['first_name'];
$last_name = $_POST['first_name'];
$from = $_POST['from_email'];
$priority = $_POST['priority'];
$regarding = $_POST['regarding'];
$description = $_POST['description'];
$urltoredirectafterwork = '/';

$file = $_FILES['filetosend']['tmp_name']; 
$file_type = $_FILES['filetosend']['type']; 
$filename = $_FILES['filetosend']['name']; 

//*********CREATE Create Helpdesk Ticket */
$fileds = '{
    "TicketTitle": "'. $regarding .'",
    "Description": "' . $description . '",
    "TicketPriority": "' . $priority . '",
    "TicketImpact": "No Impact",
    "TicketStatus": "Open",
    "TicketType": "Incident",
    "EndUserFirstName": "' . $first_name . '",
    "EndUserLastName": "' . $last_name . '",
    "EndUserEmail": "' . $from . '"
  }';

  $ticket_id = CreateTicket($fileds);
  $tickect_info = GetTicketInfo($ticket_id);

  $ticket_number = $tickect_info->TicketNumber;
  $customer_id = $tickect_info->CustomerID;


    if($filename != "")
    {
        $file_content = file_get_contents($file);
        $base64_string = base64_encode($file_content);

        $attached = '{
            "CustomerId": '. $customer_id .',
            "Name": "' . $filename . '",
            "ContentBased64": "' . $base64_string . '"
        }';
        $attachmentInfo = AddAttachment($attached);
    }

    if(DeviceGuid != ''){
        $alert_fileds = '{
            "DeviceGuid": "' . DeviceGuid . '",
            "Title": "' . $ticket_number . '",
            "CustomerID": '. $customer_id .',
            "Severity": "Information",
            "AlertMessage": "' . $description . '",
            "AlertCategoryID": "General",
            "TicketID ": ' . $ticket_id . '
          }';

          $alertInfo = CreateAlert($alert_fileds);
    }

  //******** END Helpdesk Ticket function */



$htmlContent = '<p><b>Subject:</b> ' . $regarding . '</p><p><b>Email:</b> ' . $from . '</p><p><b>Ticket ID:</b> ' . $ticket_id . '</p><p><b>Ticket Number:</b> ' . $ticket_number . '</p>';
$htmlContent .= '<p><b>Ticket Priority:</b> ' . $priority . '</p>
                   <p><b>Description:</b><br/>' . $description . '</p>';




$fromName = 'ONEMAK Tickets';

$emailSubject = '[#' . $ticket_id . ']';

$content = '';

if($filename != ""){
    $content = file_get_contents($file);
}
//$content = chunk_split(base64_encode($content));
$encoding='base64'; 
$type=" application/octet-stream";

$mail = new PHPMailer(true);

//Server settings
$mail->isSMTP();
$mail->SMTPDebug = false;
$mail->Host       = SMTP_SERVER;
$mail->SMTPAuth   = true; 
//$mail->SMTPAutoTLS = true;
$mail->Username   = SMTP_USER;
$mail->Password   = SMTP_PASSWORD;
$mail->SMTPSecure = 'tls'; 
$mail->Port       = SMTP_PORT;

///$mail->From = $_POST['email'];
$mail->setFrom($from_address, 'ONEMAK Tickets');
//
$mail->addAddress("automail480514315@ticketing.atera.com");
//$mail->addCC("h98119@gmail.com");


if($filename != ""){
    $mail->AddStringAttachment($content,$filename,$encoding,$type);
}

$mail->isHTML(true);

$mail->Subject = $emailSubject;
$mail->Body =  $htmlContent;


try {
    $mail->send();
    echo "Your ticket has been generated!";
} catch (Exception $e) {
    echo "Your Ticket submission failed, please try again." . $mail->ErrorInfo;
}
header("refresh:2;url=$urltoredirectafterwork");

?>