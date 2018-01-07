<!DOCTYPE html>
<html> 
    <head> 
        <title>Cars list</title> 
    </head> 
    <body> 
<?php
        // a placeholder to display the cookie value
        if (!empty($previous))
            echo "<p>You previously searched for: " . $previous . "</p>";
?>
        <h1>The car you are looking for is: 
<?php        
        echo $car;
?>
        </h1>
        <a href="javascript:history.back()">Back</a>
    </body>
        
</html>
