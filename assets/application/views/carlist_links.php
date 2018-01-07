<!DOCTYPE html>
<html> 
    <head> 
        <title>Cars list</title> 
    </head> 
    <body> 
<?php
        // a placeholder to display some message
        if (!empty($error))
            echo "<h2>" . $error . "</h2>";
        else {
            // display the cars using a HTML table
?>
            <table> 
                <thead> <tr> <th>ID</th> <th>NAME</th> </tr> </thead> 
                <tbody> 
<?php
                    foreach ($cars as $key => $value) {
                    echo "<tr>";
                        echo "<td><a href='../car/id/";
                            echo $value["id"];
                            echo "'>" . $value["id"] . "</td>";
                        echo "<td>";
                            echo $value["name"];
                            echo "</td>";
                        echo "</tr>";
                    }
?> 
                </tbody> 
            </table> 
<?php        
        } 
?>
        <a href="javascript:history.back()">Back to demos</a>
    </body> 
</html>
