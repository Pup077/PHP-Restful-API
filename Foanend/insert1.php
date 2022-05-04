<?php

    include_once('../config/func1.php'); //เอาคำสั่งจากfunction

    $insertdata = new DB_dog(); //ตั้งตัวแปรใหม่

    if (isset($_POST['insert'])) { //เช็ตเมื่อกดปุ่ม รับค่าเก็บไว้ในตัวแปล
        $name = $_POST['name'];
        $description = $_POST['description'];
        $created = $_POST['created'];
        $modified = $_POST['modified'];

        $sql = $insertdata->insert($name, $description, $created, $modified); //เรียกคำสั่งและส่งค่า

        if ($sql){ //เช็คความถูกต้อง
            echo "<script>alert('Record Inserted Successfully!');</script>";
            echo "<script>window.location.href='from.php'</script>";
        } else {
            echo "<script>alert('Record Inserted Successfully!');</script>";
            echo "<script>window.location.href='insert.php'</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body bgcolor="#33CCCC" text="#CC99CC" background="../img/G4.jpg">

    <div class="container">
        <a href="../Foanend/from1.php" class="btn btn-primary">Go back</a>
        <hr>
        <h1 class="mt-5 text-primary">Categories</h1>
        <hr>
        <form action="" method="post">
                    <div class="mb-3">
                <label for="name" class="form-label ">name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label ">description</label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="mb-3">
                <label for="created">created</label>
                <input type="text" class="form-control" name="created" required>
            </div>
            <div class="mb-3">
                <label for="modified">modified</label>
                <input type="text" class="form-control" name="modified" required>
            </div>
            <button type="submit" name="insert" class="btn btn-success">Insert</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>