<?php

session_start();

$email=$_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

    .container
    {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

    }
    .container:hover {
  background-color: blue;
  color: white;
}

</style>
<body>

<form action="http://localhost/wtese_a64/home.html">
    <button class="container" type="Submit">Logout</button>

    </form>
</body>
</html>


