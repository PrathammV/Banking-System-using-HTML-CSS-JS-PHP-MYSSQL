<?php 

session_start();

$server= "localhost";
$username="root";
$passwd="";
$dbname = "a64";
$conn= mysqli_connect($server,$username,$passwd,$dbname);


if(isset($_POST['email'])){
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="select * from pratham where email='".$email."'and password='".$password."' limit 1";
    
    $result=mysqli_query($conn,$sql);

    echo mysqli_num_rows($result);
    if(mysqli_num_rows($result)==1){
        $_SESSION['email']=$email;
        echo '<script type="text/javascript">';
	    echo 'alert("Logged In Successfully!");';
	    echo 'window.location.href = "http://localhost/wtese_a64/after_login.php";';
        echo '</script>';
    }
    else{
        session_destroy();
        echo " You Have Entered Incorrect Password";
        echo '<script type="text/javascript">';
	    echo 'alert("Incorrect Password!");';
	    echo 'window.location.href = "http://localhost/wtese_a64/login.php";';
        echo '</script>';
        
    }
        
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="my.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">


<style>
    .container{
        
        text-align: center;
        margin:auto;
        width:80%;
        border-radius: 40px;
        padding-top: 145px;
        padding-bottom: 50px;
        color: rgb(41, 62, 155);
    }
body{
    background-image: url("https://images.pexels.com/photos/808510/pexels-photo-808510.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;}

</style>

</head>
<body>
	<div class="container">
	
	<h1>Login Page</h1>	
    <form name="myform" method="POST" action="#">
			<div class="form-input">
                <p>
				Email ID <br> <input type="text" name="email" placeholder="Enter the email"/>	
                </p>
			</div>
            <br>
			<div class="form-input">
                <p>
				Password <br> <input type="password" name="password" placeholder="password"/>
                </p>
			</div>
            <br><br>
			<input type="submit" onsubmit="validateform()" value="Login" class="btn-login"/>
            <input type="reset"  value="Reset" class="btn-login"/>
		</form>
	</div>



    <script type="text/javascript">

function validateform()
{  
	var eflag=0;
	var pflag=0;
	if(myform.email.value == "") 
	{
      alert("Error: Input is empty!");
      myform.email.focus();
      return false;
    }
    else
    {
    	eflag=1;
    }
    
  	if(myform.password.value=="")
  	{  
  	alert("Password is empty");  
  	return false;  
  	}  
  	else
  	{
  		pflag=1;
  	}
  	if(eflag==1 && pflag==1)
  	{
  		return true;
  	}
}  

</script>
</body>
</html>