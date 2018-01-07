<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CodeIgniter Demos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">

            <h1>CodeIgniter demos:</h1>
            <div class="row">
                <div class="alert-warning col-xs-12">
                    <p>These demos uses a CodeIgniter preconfigured installation for XAMPP mySQL database.
                        In order to run these demos, you need to:</p>
                    <ul>
                        <li>Run XAMPP
                        <li>start Apache and mySQL servers
                        <li>open phpmyadmin (click on admin next to mySQL server) 
                            and import the file <a href="database.sql">database.sql</a>. 
                            There is a video on the course website showing you how to do it.
                    </ul>
                    Note that this NetBeans project can be used to start exercise 3 (you can use the model/view/controller : User_model/bootstrap-form/Login, others can be deleted). The
                    configuration should work as is. You may want to modify the default landing page (controller) in the application/config/routes.php file, 
                    edit the line :
                    <pre>$route['default_controller'] = 'welcome';</pre>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                <ol>
                    <li><a href="simple">Simple controller-view demo</a> </li>
                    <li><a href="simple/withparam/12345">controller with parameter</a>
                        : note the parameter is passed at the end of the URL http://localhost/simple/withparam/12345</li>
                    <li><a href="simple/withparam">controller with default param "undefined"</a>
                        : same example but the param is omitted in the URL and a default value is assigned by the controller</li>
                    <li><a href="car/car_list">simple DB query displaying a HTML table</a>
                        : this example uses a model that queries a database. The result of the query is passed by the controller to the view, as an array. The view generates a HTML table to display its value. </li>
                    <li><a href="car/car_list_links">simple DB query displaying a HTML table with links to another controller</a>: same example as above but links are inserted in the ID, these links are pointing to the controller below.</li>
                    <li><a href="car/id/3">display a car based on id param in URL</a>: a query in the database using a parameter (a car id). The view displays the specific row.</li>
                    <li><a href="car/id">missing param / displaying an error message</a>: the controller checks the presence of a car id param, if it is missing it passes a message (string) to the view. The view simply inserts the string in the defined placehodler.</li>
                    <li><a href="car/remember/1">Cookies demo (then click on next demo)</a>: same example as (6) but the car id parameter is stored in cookies</li>
                    <li><a href="car/remember/3">Cookies demo (remember previous)</a>: same as previous but on second time you open it it will display the previous car id stored in cookies.</li>
                    <li><a href="login">A simple BOOTSTRAP login form using the database (table USERS)</a>
                </ol>
                </div>
            </div>
        </div>
    </body>
</html>
