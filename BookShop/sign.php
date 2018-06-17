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
                        SIGN UP</h5>
                    <form class="form form-signup"  method = 'post'  role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name='Name' placeholder="Full name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input type="text" class="form-control" name='Email' placeholder="Email Address" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" name="Password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-md" id="btn-chat"> </form>
            </div>
            <a href="sign_in.php">I have acccount</a>
        </div>
    </div>
</div>
</div> 
<?php

    if(isset($_POST['Email']) && isset($_POST['Password']) &&isset($_POST['Name'])){
        $connect =pg_connect("host=localhost dbname=project user=postgres password=1234")or die("Error");
        $Email = $_POST['Email'];
        $password = $_POST['Password'];      
        $Name=$_POST['Name'];
        $id_dates = date('Y-m-d H:i:s');
        $query = "SELECT user_id FROM user_table where email='$Email'";
        $result = pg_query($connect, $query);
        while($row = pg_fetch_row($result)){
                if($row[0]!=null){
                    echo "You have account";
                    die();
                }
        }
        if (strlen($password)<8 ) {
            echo 'Password must have at least 8 symbols';
        }
        $query2 = "INSERT INTO user_table(full_name,email,password,user_time) values('$Name','$Email','$password','$id_dates')";
        $result2 = pg_query($connect, $query2);
        if (!$result2) {
            echo "Something wrong";
        }
         else
            header("Location: sign_in.php");
}




?>