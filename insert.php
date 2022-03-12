<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password']) &&
        isset($_POST['gender']) && isset($_POST['email']) &&
        isset($_POST['phoneCode']) && isset($_POST['phone'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phoneCode = $_POST['phoneCode'];
        $phone = $_POST['phone'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "tsf";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssii",$username, $password, $gender, $email, $phoneCode, $phone);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="a/a.css">
    
    <link rel="stylesheet" href="styles.css" >
      <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
  
  
  <style>
      
          
      
          h1
              {
                  color:black
              }
  
          p{
                  color:  cadetblue;
              }
  
          h2{
              color:wheat;
          }
  
          h3{
              color:wheat;
          }
  
          
          
  
          h1{
              font-family: 'Staatliches', cursive;
              font-style: italic;
              font-size: 85px;
              font-weight:85px;
              
          }
  
          p
          {    font-family: 'Staatliches', cursive;
              font-style: italic;
              font-size: 25px;
              font-weight: 35;
          }
  
          h3{
  
              font-family:  'Pangolin', cursive;
              font-style:italic;
              font-size: 35px;
          }
  
          h2{
              
              font-family: 'Staatliches', cursive;
              font-style: italic;
              font-size: 35px;
              font-weight: 45;
              
          }
          .background
              {
                 /* background-image: url("img/9.jpg"); */
                  width: 1500px;
                  height:780px;
                  background-size: 1520px;
                  background-repeat: no-repeat;
              }
              
      </style>
      
  

</head>

<body  style="background-color:black;">

    <header>
             <h1>Supreme Bank</h1>
    </header>


    <style>
        .scroll-left {
         height: 50px;	
         overflow: hidden;
         position: relative;
         background: rgb(255, 255, 0);
         color: orange;
         border: 1px solid orange;
        }
        .scroll-left p {
         position: absolute;
         width: 100%;
         height: 100%;
         margin: 0;
         line-height: 50px;
         text-align: center;
         /* Starting position */
         transform:translateX(100%);
         /* Apply animation to this element */
         animation: scroll-left 15s linear infinite;
        }
        /* Move it (define the animation) */
        @keyframes scroll-left {
         0%   {
         transform: translateX(100%); 		
         }
         100% {
         transform: translateX(-100%); 
         }
        }
        </style>
        
        <div class="scroll-left">
        <p>INDICESCRYPTOCURRENCY
Nifty Midcap 100	28,038.70 (0.91%)
S&P BSE SmallCap	26,898.29 (1.18%)
Nifty IT	35,399.10 (-0.12%)
Nifty Bank	34,475.60 (1.95%)
INDICES 
TOP GAINERSTOP LOSERS
BSE	2,619.45 (18.60%)	
Bharat Rasayan	13,674.00 (12.61%)	
Essel Propack	176.15 (12.20%)	
TTK Prestige	860.15 (11.46%)	
* NSE 500GAINERS 
GOLD
53,343.00
598.00 (1.13%)
 
USD/INR
76.32
-0.24 (-0.32%)
STOCK SEARCH</p>
        </div>





        <nav>
        <a href="form.html">Create Account</a>
        <a href="#">Mobile Banking</a>
        <a href="transfer.html">Transfer Money</a>
        <a href="#">Loan</a>
        <a href="form.html">Update account</a>
        <a href="#">Buy Premium</a>
        <a href="#">Students Zone</a>
        <a href="#">Apply for Credit Card</a>
        <a href="insert.php">Apply for Debit Card</a>
        <a href="#">Contact Us</a>
       
    </nav>


    <div class= "background">

        <h1 style="background-color:wheat;">Supreme Bank</h1>
        

<form action="http://localhost/tsf/index.html">
    <h2>Congratulations You have created accout sucessfully!</h2>
    <button class="container" type="Submit">HOME PAGE</button>

    </form>
</body>
</body>
</html>