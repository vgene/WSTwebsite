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

$name = mysqli_real_escape_string($db, stripslashes($_POST['name']));
$age = mysqli_real_escape_string($db, stripslashes($_POST['age']));
$gender = mysqli_real_escape_string($db, stripslashes($_POST['gender']));
$email = mysqli_real_escape_string($db, stripslashes($_POST['email']));

$query = "INSERT INTO guest(Guest_Name, Gender, Age, E_mail) VALUES('$name', '$gender', '$age', '$email');";

$result = mysqli_query($db, $query);

if (!$result) {
    $error = mysqli_error($db);
    print "alert('Error - the query could not be executed,error:$error');";
    exit;
}
else{
    print "alert('Adding Guest Suceeded!');";
}

}

?>

    window.location="http://162.105.146.180:8112/homework/hw4/questionare.php";
</script>