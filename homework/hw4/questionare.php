<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework4</title>
    <!-- Loading Bootstrap -->
    <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="hw4.css" rel="stylesheet">
    <script type="text/javascript" src="hw4.js"></script>
    <style>
        body {
            margin:0;
            padding:0;
            width: 100%;
            height: 100%;
        }


        div.header {
            background-color: #262626;
            margin: 0;
            padding-left: 15px;
            padding-top: 40px;
            padding-bottom: 20px;
            clear: both;
        }

        #questionare{
            width:40%;
            float: left;
            padding-top: 50px;
            padding-bottom: 50px;
            padding-left: 5%;
            padding-right: 5%;
        }

        #result{
            width:40%;
            float: right;
            padding-top: 50px;
            padding-bottom: 50px;
            padding-left: 5%;
            padding-right: 5%;
        }

        div.footer {
            background-color: #262626;
            clear: both;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        label.form-label{
            margin-bottom: 15px;
            margin-top: 15px;
            display: block;
        }

        input[type="submit"]{
            background-color: #737373;
            color: white;
            padding: 10px;
            margin: 10px;
        }

        input[type="text"]{
            width: 60%;
            margin: 0;
            padding: 10px;
            box-sizing: border-box;
            display: block;
        }

        form{
            display: inline;
        }

        table, th, td
        {
            color: #666666;
            border: 1px solid black;
            border-collapse: collapse;
            font-family: helvetica;
            font-size: 100%;
        }

        th, td
        {
            padding: 10px;
        }


    </style>
</head>

<body>

    <!-- header -->
    <div class="header">
    <h1>Web Software Technology - Week 4</h1>
    <h2>Survey Questionare</h2>
    <a class="header-link" href="../../index.html">Back To Homepage</a>
    <a class="header-link" href="hw4.html">Part1</a>
    <a class="header-link" href="questionare.php">Part2(questionare,this page)</a>
    </div>
    
    <div id="questionare">
        <h2>Survey Questionare</h2>
        <form action="addguest.php" method="post">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" name="name" required="required">
            <label class="form-label" for="age">Age</label>
            <input type="text" id="age" name="age" required="required">

            <label class="form-label">Gender</label>
            <input type="radio" id="male" name="gender" value="male">
            <label class="radio-label" for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label class="radio-label" for="female">Female</label>

            <label class="form-label" for="email">Email Address</label>
            <input type="text" id="email" name="email">
            <input type="submit" value="Submit" style="margin-left:0;">
        </form>
    </div>

    <div id="result">
        <h2>Survey Result</h2>
        <form action="deleteguest.php" method="post">
            <table id="mytable">
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                </tr>

                <!-- starting populate guest info -->
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
                $query = "SELECT * FROM guest;";
                $result = mysqli_query($db, $query);
                if (!$result) {
                    print "Error - the query could not be executed";
                    $error = mysqli_error($db);
                    print "$error";
                    exit;
                }

                $num_rows = mysqli_num_rows($result);

                for ($row_num=0; $row_num < $num_rows; $row_num++) {
                    $row = mysqli_fetch_array($result);
                    print "<tr><td><input type=\"checkbox\" name=\"select[]\" value=\"".($row["Guest_ID"])."\"></td><td>";
                    print htmlspecialchars($row["Guest_Name"]);
                    print "</td><td>".($row["Age"])."</td><td>".($row["Gender"])."</td><td>";
                    print htmlspecialchars($row["E_mail"]);
                    print "</td></tr>";
                }
                ?>
            </table>
            <input type="submit" value="Delete Selected" style="margin-left:0;">
        </form>
    </div>

    <div class="footer">
    <img alt="HTML Validation" src="../../img/valid-html401.png">
    <img alt="CSS Validation" src="../../img/valid-css.png">
    <p class="footer">
        © 2016 Web Software Technology - Ziyang Xu. All rights reserved.
    </p>
    </div>



</body>

</html>