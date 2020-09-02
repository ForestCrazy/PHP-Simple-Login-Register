<?php
session_start();
// เป็นการเริ่มการทำงานของ session
/*
session มีคุณสมบัติทุกอย่างเหมือนกับตัวแปรปกติ สามารถเก็บค่าข้อความหรือตัวเลขได้ แต่มีความพิเศษคือค่าตัวแปรจะยังคงอยู่ไม่ว่าจะเปลี่ยนหน้าไปหน้าใดก็ตาม 
ตัวแปรเซสชั่นนิยมนำมาใช้ในการจดจำการล็อกอิน หากมีการปิดหน้าเว็บข้อมูลใน session จะหายไปทันที

สำคัญ session_start ต้องอยู่บน tag html หรือ อยู่บนสุดของโค้ด
*/
?>
<!DOCTYPE html>
<html lang="en">
<!-- เป็นการกำหนดภาษาพื้นฐานของหน้าเว็บ -->

<head>
    <meta charset="UTF-8">
    <!-- กำหนดรูปแบบของตัวอักษร ถ้าไม่ใส่อาจจะทำให้การแสดงผลของตัวอักษรในบางภาษาแสดงผลไม่ถูกต้องได้ -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- กำหนดขนาดหน้าจอ ความกว้าง=ความกว้างของหน้าจอ อัตราส่วน 1.0 -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 
        X-UA-Compatible คือการกำหนดเอนจิ้นหรือตัวเรนเดอร์หน้าเว็บ
        IE=edge เป็นการกำหนดให้เรนเดอร์หน้าเว็บด้วยตัวเอนจิ้นเวอร์ชั่นล่าสุด
     -->

    <title>PHP - Simple Login/Register</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- 
            container เป็น class ของ bootstrap 4 
            ลักษณะการทำงานคือ จะเป็นกล่องที่อยู่กลางจอ สำหรับหน้าจอใหญ่ๆ
            ส่วน หน้าจอขนาดเล็กหรือหน้าจอโทรศัพท์เนียจะขยายให้เต็มจอ

            ในส่วนนี้ต้องมีพื้นฐานเรื่อง bootstrap 4
        -->

        <?php
        if (isset($_SESSION["username"])) {
            // ถ้ามีการล็อกอินอยู่แล้วให้ทำงานใน {} นี้    
        ?>
            <h2>Welcome! <?php echo $_SESSION["username"]; ?></h2><br>
            <a href="register.php">Goto Register page</a><br><br>
            <a href="logout.php">Logout</a>
        <?php } else {
            // แต่ถ้าเงื่อนไขที่ผ่านมาไม่ถูกต้องทั้งหมด ก็คือไม่มีการล็อกอินที ให้มาทำงานที่ else    
        ?>
            <h2>You are not logged in.</h2><br>
            <a href="register.php">Goto Register page</a><br><br>
            <a href="login.php">Goto Login page</a>
        <?php } ?>
        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>