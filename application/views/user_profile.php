<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>User Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <table class="table table-bordered table-striped">
                        <tr>
                            <th colspan="2"><h4 class="text-center">User Info</h3></th>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td><?php echo $name ?></td>
                        </tr>
                        <tr>
                            <td>User Email</td>
                            <td><?php echo $email ?></td>
                        </tr>
 
                    </table>


                </div>
            </div>
            <a href="<?php echo base_url('login/logout'); ?>" >  
                <button type="button" class="btn btn-primary">Logout</button>
            </a>
        </div>
    </body>
</html>