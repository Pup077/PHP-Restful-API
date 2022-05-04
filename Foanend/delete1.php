<?php

    include_once('../config/func1.php'); //เอาคำสั่งจากfunction

    if (isset($_GET['id'])) { //รับค่า user
        $userid = $_GET['id']; 
        $deletedata = new DB_dog(); //ตั้งตัวแปรใหม่
        $sql = $deletedata->delete($userid); //เข้าถึงฟังกชั่น delet และลบข้อมูล

        if ($sql){ //เช็คความถูกต้อง
            echo "<script>alert('Record Deleted Successfully!');</script>";
            echo "<script>window.location.href='from.php'</script>";
        }
    }

?>