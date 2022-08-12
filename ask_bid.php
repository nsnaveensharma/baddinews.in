<?php


// $request_body = file_get_contents('php://input');
// $data = json_decode($request_body, true);

date_default_timezone_set("Asia/Calcutta");

if ($_POST['bid_price'] && $_POST['email_id'] && $_POST['mobile']) {


    $bid_price = $_POST['bid_price'];
    $email_id = $_POST['email_id'];
    $mobile = $_POST['mobile'];

    if($bid_price == "" || $email_id == "" || $mobile == ""){

        $data = array(
            "result" => false,
            "message" => "Empty Fields are not allowed."
        );

    }
    elseif(!is_numeric($bid_price)){
       $data = array(
           "result" => false,
           "message" => "Bid Price is not in numbers."
       );
    }
    elseif (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
        $data = array(
            "result" => false,
            "message" => "Email ID is not valid."
        );
      }
    elseif(!is_numeric($mobile)){
        $data = array(
            "result" => false,
            "message" => "Bid Price is not in numbers."
        );
     }
     else{
        
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "info@baddinews.in";
        $to = $email_id;
        $subject = "Received Your Bid to Purchase Baddinews.in";
        $message = "Dear Sir/Madam,\n\nWe have receieved your bid of Rs. $bid_price for the contact number $mobile. We are in process of auction. We will contact you soon. If you have immediate need of this domain. Kindly revert back.\n\nThanks & Regards\nTeam Baddi News (baddinews.in)";
        $headers = "From:" . $from;
        if(mail($to,$subject,$message, "Cc: incarnation_enterprises@outlook.com", $headers)) {
            $data = array(
                "result" => true,
                "message" => "Sent the mail successfully."
            );
        } 
        else {
            $data = array(
                "result" => false,
                "message" => "Unable to sent mail, kindly mail your bid on incarnation_enterprises@outlook.com"
            );
        }

     }


     print json_encode($data, JSON_NUMERIC_CHECK);




}


?>