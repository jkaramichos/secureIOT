<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>secureIOT Welcome Page</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            
            <?php
                //$output = exec ('echo "raspberry" | sudo -S python pythonTest.py');
                $output = exec('python3 pythonTest.py');
                print_r($output);
                
                //echo "</pre>";
            ?>
                <p>
                Welcome to secureIOT! A project for secure smart home devices.
                <p></p>
                Please click <a href="devices.php">here</a> to view your devices.
                </p>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
