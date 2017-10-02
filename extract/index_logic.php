<!DOCTYPE HTML>
<HTML>

<body>



<a target="_blank" href="https://bankofirelandgroup.service-now.com/change_request_list.do?CSV&sysparm_query=requested_by%3D25b495c24ff6e240123836618110c745">
	<button>Extract</button></a>




<form method="POST">
	<button type="submit" name="d_btn">Delete</button>

</form>

<?php
$row = 0;
if (($handle = fopen("../../../users/daryl.c.m.cabacungan/downloads/change_request.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
            for ($c=0; $c < $num; $c++) {
                echo $data[$c] . "|\n";
            

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
    echo "New incidents: $new_incident";
    fclose($handle);
}



if(isset($_POST['d_btn'])) {
unlink("../../../users/daryl.c.m.cabacungan/downloads/change_request.csv"); 
	

}
?>







</body>
</HTML>