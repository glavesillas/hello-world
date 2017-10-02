<?php
date_default_timezone_set("Asia/Manila");
sleep(3);

$row = 0;
$all_daca = array();
$all_print_out = array();
if (($handle = fopen("../../../users/daryl.c.m.cabacungan/downloads/incident.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";

        $row++;
            for ($c=0; $c < $num; $c++) {


            }
            if($row == 0)
                {
                    $new_incident = 0;
                }
                else
                {
                    $new_incident1 = $row - 1;
                    $new_incident = $new_incident1;
                    $daca = implode("|||", $data);
                    array_push($all_daca, $daca);
                }
    }
    $ddd = implode("|||", $all_daca);

    $array_details = explode("|||", $ddd);

    $chunk = array_chunk($array_details, 5);
    
    //removing the first row (headers)
    unset($chunk[0]);

    foreach($chunk as $v){
        $inc_num =  $v[0];
        $desc =     $v[1];
        $caller =   $v[2];
        $date =     $v[3];
        $sev =      $v[4];
        
        echo "inc = $inc_num<br>
                desc = $desc<br>
                caller = $caller<br>
                date = $date<br>
                sev = $sev<br><br>
                ";

        $print_out = "<tr>";
        $print_out .= "<td style='border:solid 1pt;'>$desc aa</td>";
        $print_out .= "<td style='border:solid 1pt;'>$caller</td>";
        $print_out .= "<td style='border:solid 1pt;'>$date</td>";
        $print_out .= "<td style='border:solid 1pt;'>N/A</td>";
        $print_out .= "<td style='border:solid 1pt;'>$inc_num</td>";
        $print_out .= "<td style='border:solid 1pt;'>$sev</td>";
        $print_out .= "</tr>";

        array_push($all_print_out, $print_out);
    }

    $all_print_out_string = implode(" ", $all_print_out);

    //echo $all_print_out_string;

    if($new_incident > 0)
    {
        $date_now = date("l, F j, Y - g:i A");

        $new_time = date("l, F j, Y - g:i A", strtotime('-7 hours'));

        $subject="Incident Ticket Extract - $date_now Manila | $new_time Dublin";

        $message ="<span style='font-family:Graphik;font-size:14px;'>
                    Hi Incident Champions,<br><br>
                    New Incident ticket/s are assigned to our group. <br>Please look into this immediately.
                    <br><br> New Incidents: <b>$new_incident</b> <br><br>
                    </span>";
        $message .= "<table style='font-family:Graphik;font-size:12px;'>";
        $message .="<tr style='text-align:center; background-color:#0008FF;font-weight:bold;'>
                    <td style='border:solid 1pt; background-color:#0008FF;'>Ticket Details</td>
                    <td style='border:solid 1pt; '>Raised By</td>
                    <td style='border:solid 1pt;'>Date Opened</td>
                    <td style='border:solid 1pt;'>REQ Number</td>
                    <td style='border:solid 1pt;'>Incident Number</td>
                    <td style='border:solid 1pt;'>Priority</td>
                    </tr>
                    ";
        $message .= "$all_print_out_string";
        $message .= "</table>";

        $message .= "
                    <br>
                    <span style='font-family:Graphik;'>
                         <a href='https://bankofirelandgroup.service-now.com/incident_list.do?sysparm_query=assignment_groupDYNAMICd6435e965f510100a9ad2572f2b47744%5EstateIN1%2C-20%2C-21'>
                            Go to ServiceNow
                        </a><br>
                        <a href='file://///MN2GVFS0001/Bank_Of_Ireland_Shared/01 Admin/BA/New Ticket log/Queued Incident'>
                        Incident Ticket Spreadsheet
                        </a>
                    </span>
                    <br>
            ";

        //footer signature
        $message .= "<br><br><br>
                    <span style='font-family:Graphik; font-size:15px;'><b>ASTEN</b></span><br>
                    <span style='font-family:Graphik;font-size:10px;'>
                        <i>Automated SNow Ticket Extractor Notification Tool<br>
                    daryl.c.m.cabacungan@accenture.com</i></span>
        ";

        //recipients
        //$to="PDC.BOI.AM@accenture.com";
        $to="daryl.c.m.cabacungan@accenture.com";
        $to2 = "jonathan.p.salen@accenture.com";
        $to3 = "elizardo.j.e.rosales@accenture.com";
        
        $to5 = "JenniferA.Roque@boi.com";
        $to6 = "maricar.s.legaspi@accenture.com";
        $to7 = "jerry.ace.p.ferreria@accenture.com";
        $to8 = "timothy.u.chan@accenture.com";
        $to9 = "Stepheniel.Adia@boi.com";
        $to_all_am = "PDC.BOI.AM@accenture.com";


        // starting outlook
        com_load_typelib("outlook.application");

        if (!defined("olMailItem")) {define("olMailItem",0);}

        $outlook_Obj = new COM("outlook.application") or die("Unable to start Outlook");

        $headers = "Content-Type: text/html;";

        //just to check if you are connected.
        echo "Loaded MS Outlook, version {$outlook_Obj->Version}\n";
        $oMsg = $outlook_Obj->CreateItem(olMailItem);
        $oMsg->Recipients->Add($to_all_am);
        $oMsg->Recipients->Add($to5);
        $oMsg->Recipients->Add($to9);
        /*
        $oMsg->Recipients->Add($to2);
        $oMsg->Recipients->Add($to3);
        $oMsg->Recipients->Add($to4);
        $oMsg->Recipients->Add($to5);
        $oMsg->Recipients->Add($to6);
        $oMsg->Recipients->Add($to7);
        $oMsg->Recipients->Add($to8);
        */
        $oMsg->Subject=$subject;
        $oMsg->HTMLBody=$message;
        $oMsg->Save();
        $oMsg->Send();

    }
    
        fclose($handle);




}





?>
