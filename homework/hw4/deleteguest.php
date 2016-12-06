<script type="text/javascript">


<?php
$db = mysqli_connect("localhost", "usr_2016_112", "nub5#pelotas");
if (!$db) {
    print "alert('Error - Could not connect to MySQL');";
    exit;
}

$er = mysqli_select_db($db, "db_2016_112");
if (!$er) {
    print "alert('Error - Could not select the guest database');";
    exit;
}

$checked_list = $_POST["select"];
foreach((array)$checked_list as $index) {
    $query = "DELETE FROM guest WHERE Guest_ID=$index;";
    $result = mysqli_query($db, $query);


    if (!$result) {
        $error = mysqli_error($db);
        print "alert('Error - the query could not be executed,error:$error');";
        exit;
    }
    else{
        print "alert('Delete Suceeded!');";
    }
}
?>
window.location="http://162.105.146.180:8112/homework/hw4/questionare.php";
</script>

