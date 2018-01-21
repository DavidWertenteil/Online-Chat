/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
        function Form(name, rad)
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
           
            $(document).ready(function () {
                $("form").submit(function () {
                var myForm = new Form(document.forms["form"]["name"].value, $("input:checked").length);
                if (!myForm.nameOK()) { //if the name is bad.
                NotOk('.form-name', '#nameIkon', '#nameMessage', "Plaese enter a name.");
                    } else {
                isOk('.form-name', '#nameIkon', '#nameMessage');
                    }
                    ;
                 
                });
                $("button").click(function () {
                $("form").submit();
                });
                $(".form").submit(function (event) {
                event.preventDefault();
                });
            });


</script>-->