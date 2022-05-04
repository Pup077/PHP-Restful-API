<?php

    include_once('../config/func.php'); //เอาคำสั่งจากfunction

    $updatedata = new DB_con(); //ตั้งตัวแปรใหม่

    if (isset($_POST['update'])) { //รับค่าจากปุ่ม

        $userid = $_GET['id']; 
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];
        $created = $_POST['created'];
        $modified = $_POST['modified'];

        $sql = $updatedata->update($name, $description, $price, $category_id, $created, $modified, $userid); //เรียกฟังคชั่นและส่งค่า
        
        if ($sql){ //เช็คความถูกต้อง
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='from.php'</script>";
        } else {
            echo "<script>alert('Record Inserted Successfully!');</script>";
            echo "<script>window.location.href='update.php'</script>";
        }
    }

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>

    <div class="container"> 
        <a href="../Foanend/from.php" class="btn btn-primary">Go back</a>
        <hr>
        <h1 class="mt-5">Update Page</h1>
        <hr>
        <?php

             $userid = $_GET['id'];  
             $updateuser = new DB_con();
             $sql = $updateuser->fetchonerecord($userid); //รับข้อมูลและหาuserนั้นๆ
            while($row = mysqli_fetch_array($sql)) {
    ?>

    <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label ">name</label>
                <input type="text" class="form-control" name="name" 
                    value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label ">description</label>
                <input type="text" class="form-control" name="description" 
                    value="<?php echo $row['description']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label ">price</label>
                <input type="text" class="form-control" name="price"
                    value="<?php echo $row['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label ">category_id</label>
                <input type="text" class="form-control" name="category_id" 
                    value="<?php echo $row['category_id']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="created">created</label>
                <input type="text" class="form-control" name="created" 
                    value="<?php echo $row['created']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="modified">modified</label>
                <input type="text" class="form-control" name="modified" 
                    value="<?php echo $row['modified']; ?>" required>
            </div>
            <?php } ?>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>