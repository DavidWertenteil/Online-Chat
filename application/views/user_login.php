<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chat</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Please sign in</h2>
            <form class="form-horizontal" action="<?php echo site_url() ?>/login/checklogin" method="post">
                <?php if ($error != "") { ?>
                    <div class="form-group alert alert-danger">
                        <label class="col-sm-6">
                            <?php echo $error; ?>
                        </label>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
                <!-- For registration : -->
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <p> Not yet registered? </p>
                        <br/>
                        <a href="register" >  
                            <button type="button" class="btn btn-primary">Register</button>
                        </a>
                    </div>
                </div>
            </form>

        </div>

    </body>
</html>

