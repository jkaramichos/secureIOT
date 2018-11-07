<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>secureIOT Devices Page</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <p>You are currently logged in as <?php echo htmlentities($_SESSION['username']); ?>.</p>
                
                <p> Your devices: </p>
                
                <?php
                    $curr_user = htmlentities($_SESSION['username']);
                    $query="SELECT * from $curr_user";
                    $result=$mysqli->query($query);
                    
                    $menu = array();                 
                    while ($row = $result->fetch_assoc()){
                        $menu[] = array (
                            "device_id" => $row['device_id'],
                            "device_name" => $row['device_name']
                        );
                    }
                ?>
                
                
                
                <!-- Create a table of your devices -->
                <table style="width:100$">
                    <thead>
                        <tr>
                            <th><?php echo implode('</th><th>', array_keys(current($menu))); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $row): array_map('htmlentities', $row); ?>
                        <tr>
                            <td><?php echo implode('</td><td>', $row); ?></td>
                        </tr>
                        
                        <?php endforeach; ?>
                    </tbody>   
                </table>
            
            <!-- Add a new device -->
            <p>Enter the device information to add a new device:</p>

            <form action="includes/process_add_device.php" method="post" name="add_device_form">
                Device Name: <input type="text" name="device_name_text"/>
                <input type="submit" class="button" name="add_device_btn" value="Add Device" />
            </form>
            
            <p>Return to <a href="welcome_page.php">welcome page</a></p>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
