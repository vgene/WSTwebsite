<?php
$db = mysqli_connect("localhost", "usr_2016_112", "nub5#pelotas");
if (!$db) {
    print "Error - Could not connect to MySQL";
    exit;
}

$er = mysqli_select_db($db, "db_2016_112");
if (!$er) {
    print "Error - Could not select the guest database";
    exit;
}

$checked_list = $_POST["select"];
foreach((array)$checked_list as $index) {
    $query = "DELETE FROM guest WHERE Guest_ID=$index;";
    $result = mysqli_query($db, $query);
    if (!$result) {
        print "Error - the query could not be executed";
        $error = mysqli_error($db);
        print "$error";
        exit;
    }
}

?>

<script type="text/javascript">
    alert('Success. Thank you!');
    window.location="http://162.105.146.180:8112/homework/hw4/questionare.php";
</script>
