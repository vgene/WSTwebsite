#!/usr/bin/perl -w
# Process user data and update file

use CGI ":standard";

$LOCK = 2;
$UNLOCK = 8;

open(DB, "<hw3_userdata.dat");
flock(DB, $LOCK);

print header('application/json');
print '[';

my $first = 1;

while (my $line = <DB>) {
    if ($first == 1) {
        $first = 0;
    }
    else {
        print ", ";
    }

    print '{';
    
    chomp $line;
    my @info = split /\|/, $line;
    print "\"name\": \"";
    print @info[0];
    
    print "\", \"age\": \"";
    print @info[1];

    print "\", \"gender\": \"";
    print @info[2];

    print "\", \"email\": \"";
    print @info[3];

    print "\"}";
}
print ']';

flock(DB, $UNLOCK);
close(DB);