<?php
// get all users into user.json
include_once "./handle/function.php";

$indexUserDelete = $_GET['index'] ?? null ;
if (!empty($indexUserDelete)){
    // thuc hien xoa
    deleteUser('./data/user.json', $indexUserDelete);
    header('Location: home.php');
}

$users = getAllUsers('./data/user.json');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
    require_once("layouts/navbar.php");
?>

<div class="container">
    <table class="table">
        <tr>
            <td>STT</td>
            <td>Name</td>
            <td>Email</td>
            <td></td>
        </tr>
        <?php foreach ($users as $index => $user): ?>
            <tr>
                <td><?php echo $index + 1 ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td>
                    <a href="?index=<?php echo $index ?>">Delete</a>
                    <a href="edit.php?index=<?php echo $index ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>