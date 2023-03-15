<!doctype html>
<html>

<head></head>

<body>
    <?php

        // check the cookie - are they logged in?
        if ($_COOKIE['loggedin'] == 'yes') {
            print "<p><a href=\"data\admin_report.txt\">Admin Report</a></p>";
            $bannedtext = file_get_contents('data/banned.txt');
    ?>

    <form method="post" action="savetext.php">
        Banned words:
        <textarea name="banned"><?php print $bannedtext; ?></textarea>
        Clear log?
        <select name="clear">
            <option value="none">None</option>
            <option value="room1.txt">Room 1</option>
            <option value="room2.txt">Room 2</option>
            <option value="room3.txt">Room 3</option>
        </select>
        <input type="submit">
    </form>

    <?php
        }
        else {
    ?>

    <form method="post" action="adminprocess.php">
        Username:
        <input type="text" name="username"><br>
        Password:
        <input type="text" name="password">
        <input type="submit">
    </form>

    <?php
            }
    ?>


</body>

</html>