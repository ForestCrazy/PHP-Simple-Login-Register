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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP - Simple Login</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="justify-content-md-center">
            <div class="d-flex justify-content-center">
                <h1>Login Form</h1>
            </div>
            <form action="" method="POST">
                <!-- action คือ สิ่งที่เอาไว้กำหนดว่าจะให้ส่งข้อมูลใน form เนีย ไปที่ไหน ส่วน method คือ การกำหนดรูปแบบการส่งข้อมูล -->
                <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" class="form-control" id="Username" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" name="submit_login" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
<?php
if (isset($_POST["submit_login"])) {
    // ถ้า มี submit_login ในรูปแบบ post เข้ามา ให้ทำงานในสโคปนี้
    require_once("connect.php");
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $password_sha = hash('sha256', $password);
    $query = 'SELECT * FROM account WHERE username = "' . $username . '" AND password = "' . $password_sha . '"';
    $result = $connect->query($query);
    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "<script>alert('Username or Password is not correct');</script>";
    }
}