<!DOCTYPE HTML>
<HTML>
<head>


</head>
<body>

<button id="extract_btn"><a id="extract_link" target="_blank" href="https://bankofirelandgroup.service-now.com/incident_list.do?CSV&sysparm_query=assignment_groupDYNAMICd6435e965f510100a9ad2572f2b47744%5EstateIN1%2C-20%2C-21">
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
    $('#extract_link')[0].click();
}
</script>


<?php
//delete file
if(isset($_POST['d_btn'])) {
    unlink("../../../users/daryl.c.m.cabacungan/downloads/incident.csv"); 
}

$row = 0;
if (($handle = fopen("../../../users/daryl.c.m.cabacungan/downloads/incident.csv", "r")) !== FALSE) {
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

        $subject="New Incidents";        
        $message="Please check ServiceNow for new Incidents. New incident: $new_incident";        
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>
</HTML>