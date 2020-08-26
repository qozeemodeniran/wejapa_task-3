<?php
$color = $_GET["favcol"];
?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <!--    <link href="css/main.css" rel="stylesheet" media="all">-->
</head>

<body style="background-color:<?php echo $color; ?>;">
<h1>Submitted Details</h1>
<?php
$fname = $_GET["firstname"];
echo "$fname <br>";
$lname = $_GET["secondname"];
echo "$lname <br>";
$email = $_GET["email"];
echo "$email <br>";
$dob = $_GET["dob"];
echo "$dob <br>";
$favcol = $_GET["favcol"];
echo "$favcol <br>";
$gender = $_GET["gender"];
echo "$gender <br>";
$dept = $_GET["dept"];
echo "$dept<br>";
?>
</body>
</html>