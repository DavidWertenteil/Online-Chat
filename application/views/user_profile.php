<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>User Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
          
        <br>
        <br>
        
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th div class="col-md-10">Messages</th>
                      <th div class="col-md-2">Details</th>
                    </tr>
                </thead>
                
                <tbody>
                    
                    <?php foreach($messages as $message): ?>
                    <tr>
                        <th div class="col-md-10"> <?=$message['message']?> </th>
                        <th div class="col-md-2"> <?=$message['date']?> <br> <?=$message['name']?>  <br>
                            <?php if ($message["name"] == $name):?>
                            <a href= "<?php echo base_url('chat/delete_msg/'.$message['id']); ?>">
                               <button type="button" class="btn btn-default">Delete</button>
                            </a>
                            <?php endif;?>
                        </th>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
        
        
        <div class="container">
            <form class="form-horizontal" action="<?php echo site_url() ?>/chat/new_message" method="post" name="form">
                <div class="form-group">
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="msg" placeholder="Enter a message:" autofocus="autofocus" name="msg" required>
                    </div>
                  
                    <div class="col-md-2">
                        <button type='submit' class='btn btn-primary' id='btn' disabled="true">Enter</button>
                    </div>
                </div>
            </form>
        </div> 
        
        <!this script change the button state disable/enable>
        <script>
            $(document).ready(function(){
                $('#msg').keyup( function (){
                    if($('#msg').val().trim() !== "")                      
                        $('#btn').removeAttr('disabled');
                    else
                        $('#btn').attr('disabled','disabled');
                });
            });
        </script>
    </body>
</html>