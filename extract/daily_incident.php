<!DOCTYPE HTML>
<HTML>
<head>


</head>
<body>

<!-- https://bankofirelandgroup.service-now.com/sc_req_item_list.do?CSV&sysparm_query=active%3Dtrue%5Eu_caller_id%3D53da63124f6a2e00123836618110c7f3
    https://bankofirelandgroup.service-now.com/sc_req_item_list.do?CSV&sysparm_query=active%3Dtrue%5Eassignment_group%3D81bbbc924fe22e00123836618110c7bd%5Estate%3D-20
    
    incident
    https://bankofirelandgroup.service-now.com/incident_list.do?CSV&sysparm_query=assignment_groupDYNAMICd6435e965f510100a9ad2572f2b47744%5EstateIN1%2C-20%2C-21
 
    incident raised this month
    https://bankofirelandgroup.service-now.com/incident_list.do?sysparm_query=assignment_group%3D81bbbc924fe22e00123836618110c7bd%5EORassignment_group%3D85bbbc924fe22e00123836618110c7bc%5Eopened_atONThis%20month%40javascript%3Ags.beginningOfThisMonth()%40javascript%3Ags.endOfThisMonth()
    
    updated priority
    https://bankofirelandgroup.service-now.com/incident_list.do?sysparm_query=assignment_groupDYNAMICd6435e965f510100a9ad2572f2b47744%5EstateIN1%2C-20%2C-21
 -->

<button id="extract_btn"><a id="extract_link" target="_blank" href="https://bankofirelandgroup.service-now.com/incident_list.do?CSV&sysparm_query=assignment_groupDYNAMICd6435e965f510100a9ad2572f2b47744%5EstateIN1%2C-20%2C-21">
Extract</a></button>

<span id='milli'></span>

<span id="div1"></span>

<script>

    //setInterval
    //setTimeout
    setInterval(function(){
        deleteExtractedRITM();
        extractFile();
        ajaxCall();
        }, 900000);
    //300000 -> 5mins
    //600000 -> 10mins
    //900000 -> 15mins
    //10000 -> 10 seconds
    function deleteExtractedRITM(){
        $.ajax({
                url: "deleteInc.php",
                success: function(result){
                $("#div1").html(result);
            }});
    }
    function extractFile(){
            window.location.href = $('#extract_link').attr('href');

    }
    function openSnow(){
            //window.location.href = $('#snow_link').attr('href');
            window.open("https://bankofirelandgroup.service-now.com/navpage.do");
    }

    function ajaxCall(){
         $.ajax({
                url: "daily_ajaxincident.php",
                success: function(result){
                $("#div1").html(result);
            }});
    }


//
function refreshAt(hours, minutes, seconds) {
    var now = new Date();
    var then = new Date();

    if(now.getHours() > hours ||
       (now.getHours() == hours && now.getMinutes() > minutes) ||
        now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
        then.setDate(now.getDate() + 1);
    }
    then.setHours(hours);
    then.setMinutes(minutes);
    then.setSeconds(seconds);

    var timeout = (then.getTime() - now.getTime());
    setTimeout(function() { window.location.reload(true); }, timeout);
    console.log("refreshed at " + timeout);
}




</script>






    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>
</HTML>
