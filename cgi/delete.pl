#!/usr/bin/perl -w
# Process user data and update file

use CGI ":standard";

$LOCK = 2;
$UNLOCK = 8;

sub success {
    print "<script type=\"text/javascript\">alert('Delete Suceeded!');window.location=\"/homework/hw3/questionare.html\";</script>";
}

my @info;
my @selected_list = param("select");
my %selected = map {$_ => 1} @selected_list;
my $entry_count = 0;

open(DB, "<hw3_userdata.dat");
flock(DB, $LOCK);

while (my $line = <DB>) {
    if (exists($selected{$entry_count})) {
        $entry_count += 1;
        next;
    }
    $entry_count += 1;
    chomp $line;
    push @info, $line;
}

flock(DB, $UNLOCK);
close(DB);

open(DB, ">hw3_userdata.dat");
flock(DB, $LOCK);

while (my $output = shift(@info)) {
    print DB "$output\n";

}

flock(DB, $UNLOCK);
close(DB);
print header();
success()