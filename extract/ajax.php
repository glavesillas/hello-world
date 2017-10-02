<?php

sleep(3);

$row = 0;
if (($handle = fopen("../../../users/daryl.c.m.cabacungan/downloads/change_request.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
            for ($c=0; $c < $num; $c++) {
                //$extracted =  $data[$c] . "<br>";
            }
            if($row == 0)
                {
                    $new_incident = 0;
                }
                else
                {
                    $new_incident1 = $row - 1;
                    $new_incident = $new_incident1;
                }
    }
    if($new_incident > 0)
    {

        $subject="New Change Ticket Assigned to you";        
        $message="Please check ServiceNow for new Change Tickets. New CH Count: $new_incident 
            
            See extracted tickets: https://bankofirelandgroup.service-now.com/change_request_list.do?sysparm_query=requested_by%3D25b495c24ff6e240123836618110c745  
            
        ";

       
        $to="daryl.c.m.cabacungan@accenture.com";

        // starting outlook        
        com_load_typelib("outlook.application"); 

        if (!defined("olMailItem")) {define("olMailItem",0);}

        $outlook_Obj = new COM("outlook.application") or die("Unable to start Outlook");

        //just to check you are connected.        
        echo "Sending Email. Loaded MS Outlook, version {$outlook_Obj->Version}\n";        
        $oMsg = $outlook_Obj->CreateItem(olMailItem);        
        $oMsg->Recipients->Add($to);
        $oMsg->Subject=$subject;        
        $oMsg->Body=$message;        
        $oMsg->Save();        
        $oMsg->Send();    

    }
        fclose($handle);




}





?>