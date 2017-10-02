<?php
date_default_timezone_set("Asia/Manila");
sleep(3);

$row = 0;
$all_daca = array();
$all_print_out = array();
if (($handle = fopen("../../../users/daryl.c.m.cabacungan/downloads/sc_req_item.csv", "r")) !== FALSE) {
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

    $chunk = array_chunk($array_details, 9);
    unset($chunk[0]);

    foreach($chunk as $v){
        $rq_num = $v[0];
        $ritm_num = $v[1];
        $short_desc = $v[2];
        $desc = $v[3];
        $desc = substr($desc, 0, 40);
        $req_by = $v[4];
        $state = $v[5];
        $date_cr = $v[6];
        $assign_grp = $v[7];
        $active = $v[8];
        /*
        echo "Request: $rq_num<br>";
        echo "RITM: $ritm_num<br>";
        echo "Short Description: $short_desc<br>";
        //echo "Description: $desc<br>";
        echo "Requested By: $req_by<br>";
        echo "State: $state<br>";
        echo "Date: $date_cr<br>";
        echo "Assignment Group: $assign_grp <br>";
        echo "Active: $active<br><hr>";
        */
        $print_out = "<tr>";
        $print_out .= "<td style='border:solid 1pt;'>$rq_num</td>";
        $print_out .= "<td style='border:solid 1pt;'>$ritm_num</td>";
        $print_out .= "<td style='border:solid 1pt;'>$short_desc</td>";
        $print_out .= "<td style='border:solid 1pt;'>$desc<br>";
        $print_out .= "<td style='border:solid 1pt;'>$req_by</td>";
        /*$print_out .= "<td style='border:solid 1pt;'>$state</td>";*/
        $print_out .= "<td style='border:solid 1pt;'>$date_cr</td>";
        
        /*$print_out .= "<td style='border:solid 1pt;'>$assign_grp</td>";*/
        /*$print_out .= "<td style='border:solid 1pt;'>$active</td>";*/
        $print_out .= "</tr>";

        array_push($all_print_out, $print_out);
    }

    $all_print_out_string = implode(" ", $all_print_out);

    echo $all_print_out_string;

    if($new_incident > 0)
    {
        $date_now = date("l, F j, Y - g:i A");
        $subject="Request Ticket Extract - $date_now";

        $message ="<span style='font-family:Graphik;font-size:14px;'>
                    Hi Ticket Extract POCs,<br><br>
                    New RITM ticket/s are assigned to our group. <br>Please assign this to <b>Jonathan P. Salen</b> immediately.
                    <br><br> New RITMs: <b>$new_incident</b> <br><br>
                    </span>";
        $message .= "<table style='font-family:Graphik;font-size:12px;'>";
        $message .="<tr style='text-align:center; background-color:#0008FF;font-weight:bold;'>
                    <td style='border:solid 1pt; background-color:#0008FF;'>Request Number</td>
                    <td style='border:solid 1pt; '>Request Item Number</td>
                    <td style='border:solid 1pt;'>Short Description</td>
                    <td style='border:solid 1pt;'>Details</td>
                    <td style='border:solid 1pt;'>Requested By</td>
                    <td style='border:solid 1pt;'>Creation Date</td>
                    
                    </tr>
                    ";
        $message .= "$all_print_out_string";
        $message .= "</table>";

        $message .= "
                    <br>
                    <span style='font-family:Graphik;'>
                         <a href='https://bankofirelandgroup.service-now.com/sc_req_item_list.do?sysparm_query=active%3Dtrue%5Eassignment_group%3D81bbbc924fe22e00123836618110c7bd%5Estate%3D-20'>
                            Go to ServiceNow
                        </a><br>
                        <a href='file://///MN2GVFS0001/Bank_Of_Ireland_Shared/01 Admin/BA/New Ticket log/Queued SR'>
                        Request Ticket Spreadsheet
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
        $to9 = "Stepheniel.Adia@boi.com";

        $to6 = "maricar.s.legaspi@accenture.com";
        $to7 = "jerry.ace.p.ferreria@accenture.com";
        $to8 = "timothy.u.chan@accenture.com";
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
    else{
         // starting outlook
        com_load_typelib("outlook.application");

        if (!defined("olMailItem")) {define("olMailItem",0);}

        $outlook_Obj = new COM("outlook.application") or die("Unable to start Outlook");

        $date_now = date("l, F j, Y - g:i A");
        $subject="Request Ticket Extract - $date_now";
        
        $to="daryl.c.m.cabacungan@accenture.com";
        $to2 = "jonathan.p.salen@accenture.com";
        $to3 = "elizardo.j.e.rosales@accenture.com";

        $to4 = "Gladys.Vesillas@boi.com";
        $to5 = "JenniferA.Roque@boi.com";
        $to9 = "Stepheniel.Adia@boi.com";

        $to6 = "maricar.s.legaspi@accenture.com";
        $to7 = "jerry.ace.p.ferreria@accenture.com";
        $to8 = "timothy.u.chan@accenture.com";
        $to_all_am = "PDC.BOI.AM@accenture.com";


        $message = "
            <span style='font-family:Graphik;font-size:14px;'>
                   Hi Ticket Extract POCs,<br><br>
                    There are no extracts that are assigned to our group at this time. <br>
                    </span>";

        $message .= "<br><br><br>
                    <span style='font-family:Graphik; font-size:15px;'><b>ASTEN</b></span><br>
                    <span style='font-family:Graphik;font-size:10px;'>
                        <i>Automated SNow Ticket Extractor Notification Tool<br>
                    daryl.c.m.cabacungan@accenture.com</i></span>
        ";


        //just to check if you are connected.
        echo "Loaded MS Outlook, version {$outlook_Obj->Version}\n";
        $oMsg = $outlook_Obj->CreateItem(olMailItem);

        $to = "daryl.c.m.cabacungan@accenture.com";

        $oMsg->Recipients->Add($to_all_am);
        $oMsg->Recipients->Add($to4);
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
