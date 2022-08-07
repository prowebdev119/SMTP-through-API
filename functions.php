<?php

//-- Create New Ticket
function CreateTicket($fileds)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => API_URL . 'tickets',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>$fileds,
      CURLOPT_HTTPHEADER => array(
        'x-api-key: '. API_KEY,
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $result = json_decode($response);
    
    return $result->ActionID;
}

//-- Get Ticket info By ticket Id
function GetTicketInfo($ticket_id)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => API_URL . 'tickets/' . $ticket_id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'x-api-key: '. API_KEY,
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    return json_decode($response);
}

//-- Get Agent info by Customer Id
function GetAgentInfoByCustomerId($customer_id)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => API_URL . 'agents/customer/' . $customer_id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'x-api-key: '. API_KEY,
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    return json_decode($response);
}

//--- Add Attachement
function AddAttachment($fileds)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => API_URL . 'customers/attachments',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>$fileds,
      CURLOPT_HTTPHEADER => array(
        'x-api-key: '. API_KEY,
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    return json_decode($response);
}

//-- Create new Alerts
function CreateAlert($fileds)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => API_URL . 'alerts',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>$fileds,
      CURLOPT_HTTPHEADER => array(
        'x-api-key: '. API_KEY,
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    return json_decode($response);
}


function GetAlertInfo()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => API_URL . 'alerts',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'x-api-key: '. API_KEY,
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    return json_decode($response);
}

