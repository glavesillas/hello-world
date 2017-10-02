<!DOCTYPE HTML>
<HTML>
<head>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />

</head>
<body>
<div class="hidden">
<button id="extract_btn"><a id="extract_link" target="_blank" href="https://bankofirelandgroup.service-now.com/change_request_list.do?CSV&sysparm_query=requested_by%3D25b495c24ff6e240123836618110c745">
Extract</a></button>
</div>
<span id="div1"></span>

<script>
    setInterval(function(){ 
        deleteExtracted();
        extractFile();
        ajaxCall();
        }, 10000);

    function deleteExtracted(){
        $.ajax({
                url: "deleteChange.php", 
                success: function(result){
                $("#div1").html(result);
            }}); 
    }
    function extractFile(){
            window.location.href = $('#extract_link').attr('href');
            
    }

    function ajaxCall(){
         $.ajax({
                url: "ajax.php", 
                success: function(result){
                $("#div1").html(result);
            }});
    }
   
</script>


<?php
/*
$row = 0;
if (($handle = fopen("../../../users/daryl.c.m.cabacungan/downloads/change_request.csv", "r")) !== FALSE) {
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
        $message="Please check ServiceNow for new Change Tickets. New CH Count: $new_incident";        
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
*/
?>



 
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>
</HTML>