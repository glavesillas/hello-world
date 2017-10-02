<!DOCTYPE HTML>
<HTML>
<head>


</head>
<body>

<button id="extract_btn"><a id="extract_link" target="_blank" href="https://bankofirelandgroup.service-now.com/sc_req_item_list.do?CSV&sysparm_query=active%3Dtrue%5Eassignment_group%3D81bbbc924fe22e00123836618110c7bd%5Estate%3D-20">
Extract</a></button>



<!-- FOR CHANGE TICKETS 
<a  id="extract_link" target="_blank" href="https://bankofirelandgroup.service-now.com/change_request_list.do?CSV&sysparm_query=requested_by%3D25b495c24ff6e240123836618110c745">
    <button>Extract</button></a>
-->
<form method="POST">
	<button type="submit" name="d_btn" id="delete_btn">Delete</button>

</form>


<script>setInterval(function(){ 
    deleteFile();
    extractFile();
    
    
}, 10000);

function deleteFile(){
    $('#delete_btn').click();
}
function extractFile(){
    //$('#extract_link')[0].click();
    window.location.href = $('#extract_link').attr('href');
}
</script>


<?php
//delete file
if(isset($_POST['d_btn'])) {
    unlink("../../../users/daryl.c.m.cabacungan/downloads/sc_req_item.csv"); 
}

$row = 0;
if (($handle = fopen("../../../users/daryl.c.m.cabacungan/downloads/sc_req_item.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
            for ($c=0; $c < $num; $c++) {
                //echo $data[$c] . "|\n";
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

        $subject="New RITMs Assigned to your Group";        
        $message="Please check ServiceNow for new RITMs. New RITMs Count: $new_incident";        
        $to="daryl.c.m.cabacungan@accenture.com";

        // starting outlook        
        com_load_typelib("outlook.application"); 

        if (!defined("olMailItem")) {define("olMailItem",0);}

        $outlook_Obj = new COM("outlook.application") or die("Unable to start Outlook");

        //just to check you are connected.        
        echo "Loaded MS Outlook, version {$outlook_Obj->Version}\n";        
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


    <script></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>
</HTML>