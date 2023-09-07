<?php
include_once "./handle/function.php";

$indexUserUpdate = $_GET['index'] ?? null ;

$user = findByIndex('./data/user.json', $indexUserUpdate);

if($_SERVER['REQUEST_METHOD'] == "POST") {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $index = $_REQUEST['index'];

     updateUser('./data/user.json',$index, $name, $email);
     header('Location: home.php');
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php
require_once("layouts/navbar.php");
?>

<form action="./edit.php?index=<?php echo $indexUserUpdate ?>" method="POST" class="form">
    Name<input type="text" name="name" value=<?php echo $user['name'] ?>>
    Email<input type="text" name="email"  value=<?php echo $user['email'] ?>>
    <button type="submit">Save</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
