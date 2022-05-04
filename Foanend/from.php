<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>หน้าหลัก</title>
</head>

<body background="../img/G4.jpg">
    <div class="container">
        <a href="../Foanend/index.html" class="btn btn-primary">Go back</a>
        <hr>
        <h1 class="mt-5 text-warning">products</h1>
        <a href="insert.php" class="btn btn-success">Go to Insert</a>
        <hr>
        <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <th>#</th>
                <th class="bg-info text-white">name</th>
                <th class="bg-warning text-white">description</th>
                <th class="bg-success text-white">price</th>
                <th class="bg-info text-white">category_id</th>
                <th class="bg-warning text-white">created</th>
                <th class="bg-success text-white">modified</th>
                <th class="bg-info text-white">edit</th>
                <th class="bg-warning text-white">delete</th>
            </thead>
            <tbody>
                <?php

                include_once('../config/func.php');
                $fetchdata = new DB_con();
                $sql = $fetchdata->fetchadata();
                while ($row = mysqli_fetch_array($sql)) {


                ?>

                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['category_id'] ?></td>
                        <td><?php echo $row['created'] ?></td>
                        <td><?php echo $row['modified'] ?></td>
                        <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                <?php

                }
                ?>
            </tbody>
    </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>