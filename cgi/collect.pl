#!/usr/bin/perl -w
# Process user data and update file

use CGI ":standard";

sub error {
    print "<script type=\"text/javascript\">alert('Error. Data not complete or error opening file.');window.location=\"/homework/hw3/questionare.html\";</script>";
    exit(1);
}

sub success {
    print "<script type=\"text/javascript\">alert('Submit Succeeded!');window.location=\"/homework/hw3/questionare.html\";</script>";
}

print header();

$LOCK = 2;
$UNLOCK = 8;

my($name, $age, $gender, $email) = (param("name"), param("age"), param("gender"), param("email"));

if (($name eq "") || ($age eq "") || ($gender eq "")  || ($email eq "")){
	error();
}

open(DB, ">>hw3_userdata.dat") or error();
flock(DB, $LOCK);
	
print DB "$name|";
print DB "$age|";
print DB "$gender|";
print DB "$email\n";

# print DB "$name\n";
# print DB "$age\n";
# print DB "$gender\n";
# print DB "$email\n";

flock(DB, $UNLOCK);
close(DB);

success();