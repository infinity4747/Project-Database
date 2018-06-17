<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="style2.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style >
    body{
        background-color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center">
                        SIGN IN</h5>
                    <form class="form form-signup" action="sign_in.php"  method = 'post' enctype = 'multipart/form-data' role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name='Email'  placeholder="Email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" name='Password' placeholder="Password" />
                        </div>
                    </div>
                </div>
               <input type="submit" class="btn btn-primary btn-md" id="btn-chat">
                </form>
            </div>
            <a href="sign.php">Create account</a>
        </div>
    </div>
</div>
</div> 
    
<?php

    if(isset($_POST['Email']) && isset($_POST['Password'])){
        $connect =pg_connect("host=localhost dbname=project user=postgres password=1234")or die("Error");
        $Email = $_POST['Email'];
        $password = $_POST['Password'];      
        $query = "SELECT user_id FROM user_table where email='$Email' and password='$password'";
        $result = pg_query($connect, $query);
        while($row = pg_fetch_row($result)){
                if($row[0]==null){
                    echo "No such user";
                }
                else{
                    header("Location: index.php");
                }
            }
        
    }





?>