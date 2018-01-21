<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Please Register</h2>
            <form class="form-horizontal" action="<?php echo site_url() ?>/register/checkregister" method="post" name="form">
                <?php if ($error != "") { ?>
                    <div class="form-group alert alert-danger">
                        <label class="col-sm-6">
                            <?php echo $error; ?>
                        </label>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group form-name">
                    <label class="control-label col-sm-2" for="usr">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="usr" value="<?php echo $name ?>" required>
                        <span id="nameIkon"></span>
                        <p id="nameMessage"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value="<?php echo $password ?>" required>
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" id="send">Register Now</button>
                    </div>
                </div>
            </form>

        </div>


        <script>
            function Form(name)
            {
                this.name = name.replace(/ /g, "");
                this.nameOK = function () {
                    return (this.name !== "");
                };

                this.formOK = function () {
                    return (this.nameOK());
                };
            }
            ;
            function NotOk(nameClass, nameId, nameMessage, message)
            {
                $(nameClass).removeClass('has-success has-feedback');
                $(nameId).removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(nameClass).addClass('has-error has-feedback');
                $(nameId).addClass("glyphicon glyphicon-remove form-control-feedback");
                $(nameMessage).text(message);
            }
            ;
            function isOk(nameClass, nameId, nameMessage)
            {
                $(nameClass).removeClass('has-error has-feedback');
                $(nameId).removeClass("glyphicon glyphicon-remove form-control-feedback");
                $(nameClass).addClass('has-success has-feedback');
                $(nameId).addClass("glyphicon glyphicon-ok form-control-feedback");
                $(nameMessage).text("");
            }


            $("form").submit(function () {
                var myForm = new Form(document.forms["form"]["name"].value, $("input:checked").length);
                if (!myForm.nameOK()) { //If the name is bad.
                    NotOk('.form-name', '#nameIkon', '#nameMessage', "Plaese enter a name.");
                } else {
                    isOk('.form-name', '#nameIkon', '#nameMessage');
                }
                ;

            });
            $("button").click(function () {
                $("form").submit();
            });
            $(".form-horizontal").submit(function (event) {
                event.preventDefault();
            });



        </script>
    </body>
</html>

