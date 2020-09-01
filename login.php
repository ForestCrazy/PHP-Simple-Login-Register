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
                <!-- name เนียคือตัวกำหนดว่าจะให้ข้อมูลเนียไปเก็บที่ไหน จะคล้ายๆกับตัวแปรที่สร้างหรือประกาศเอาไว้เพื่อเก็บค่าหรือข้อมูลไว้ในตัวแปร ส่วน placeholder คือข้อความที่แสดงในช่องกรอกข้อความจะแสดงต่อเมื่อไม่มีข้อมูลหรือข้อความใดๆอยู่ในช่องใส่ข้อมูล-->
            </form>
        </div>
    </div>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- tag script เนียเป็น tag สำหรับนำ javascript ทั้งจากในเครื่องหรือเซิร์ฟเวอร์อื่นๆ เข้ามาใช้งานในหน้าเว็บ -->
</body>

</html>
<?php
if (isset($_POST["submit_login"])) {
    // ถ้า มี submit_login ในรูปแบบ post เข้ามา ให้ทำงานในสโคปนี้

    require_once("connect.php");
    // ไปเอาไฟล์ connect.php เข้ามาใช้งานในไฟล์นี้ ในไฟล์ connect.php มีตัวแปรอะไรบ้าง ก็สามารถใช้งานตัวแปรนั้นข้ามไฟล์ได้เลย

    $username = $_POST["username"];
    // นำค่าจาก name="username" ในรูปแบบ post มาเก็บไว้ในตัวแปร username

    $password = $_POST["password"];
    // นำค่าจาก name="password" ในรูปแบบ post มาเก็บไว้ในตัวแปร password
    
    $query = 'SELECT * FROM account WHERE username = "' . $username . '" AND password = "' . $password . '"';
    // สร้างตัวแปร query มาไว้สำหรับเก็บคำสั่ง sql โดยคำสั่ง sql ที่ใช้เนียคือ ให้ไปหา username และ password ในฐานข้อมูล โดย username และ password ต้องตรงกันถ้า อย่างใดอย่างนึงผิดก็จะหาไม่เจอทันที

    $result = $connect->query($query);
    // สร้างตัวแปร result ขึ้นมาไว้ทำการ query คำสั่ง sql เข้าไปที่ sql server ก็คือนำคำสั่ง sql ในตัวแปร query ไปรันบน sql server แล้วเอาผลลัพธ์ที่รันมาเก็บไว้ในตัวแปร result

    if ($result->num_rows == 1) {
        // ถ้า จำนวนแถวที่ค้นหามี 1 แถว ให้ทำงานในสโคปนี้     num_rows เนียเป็นเหมือนคำสั่งที่เอาไว้นับจำนวนแถวที่ทำการ query ข้อมูลใน sql ไป
        /* 
        อธิบายเพิ่มเติมนิดนึง คือเราเก็บผลลัพธ์การ query หรือ การรัน คำสั่ง sql เนีย ไว้ในตัวแปร result
        ทีนี้เราก็เอาตัวแปร result มา -> กับ num_rows เพื่อนับจำนวนแถวที่ query ข้อมูลมาได้
        ถ้าจำนวนแถวมีแค่ 1 ก็คือมันจะมากกว่า 1 ไม่ได้แน่นอน เพราะในระบบ มี username นี้แค่ username เดียวจะไม่มีซ้ำแน่นอน
        ส่วน password ซ้ำได้ แต่มันเป็นข้อมูลที่เก็บในแถวเดียวกันกับ username ดังนั้นถ้า username ตรงแต่ password ไม่ตรง
        ก็หาไม่เจออยู่ดี หรือ username ไม่ตรงแต่ password ตรงก็หาไม่เจออยู่ดี

        username = "' . $username . '" AND password = "' . $password . '"
        สังเกตได้ว่าใช้ AND ก็คือต้องถูกต้องหรือต้องตรงกันทั้งคู่ถึงจะแสดงผลได้ 
        
        อาจจะงงหน่อยๆเพราะอธิบายไม่ค่อยเป็น555+
        */

        $_SESSION['username'] = $username;
        // กำหนด session ชื่อ username ให้เก็บชื่อผู้ใช้เอาไว้ ให้เบาร์เซอร์จำไว้ว่า เนียที่เราล็อกอินอยู่เนีย ล็อกอินด้วย username นี้นะ

        header("Location: index.php");
        // เป็นคำสั่งให้ redirect ไปที่ไฟล์หรือหน้า index.php เป็นคำสั่ง redirect ของ php    redirect คือการเปลี่ยนเส้นทาง หรือ เปลี่ยนหน้าเว็บไปหน้านั้นๆที่เรากำหนดไว้
    } else {
        // ถ้าเงื่อนไขข้างบนไม่ถูกต้อง เลยมาทำงานในสโคปนี้
        /*
        เงื่อนไขข้างบนของเราก็คือ ถ้า จำนวนแถวที่ค้นหามี 1 แถว ให้ทำงานในสโคปนั้น แต่ถ้ามันเป็น 0 หรือ หาไม่เจอเนีย หรือ มากกว่า 1 เช่น 2 3 4 (จริงๆมันจะมากกว่า 1 ไม่ได้นะ เพราะมันหาไม่เจอ)
        ให้มาทำงานตรงนี้

        อธิบาย if else เพิ่มเติมให้นิดนึง

        เริ่มการทำงาน
        if (เงื่อนไข) {
            สโคป 1
        } else {
            สโคป 2
        }
        จบการทำงาน

        ถ้าเงื่อนไขถูกต้อง จะทำงานที่สโคป 1 เลย จะไม่ทำงานที่ else ต่อนะ จะข้ามไปจบการทำงานเลย อันนี้สำคัญเลย คนที่หัดเขียนโปรแกรมใหม่ๆจะงงกันตรงนี้
        ถ้าเงื่อนไขไม่ถูกต้องจะทำงานที่ สโปค 2 หรือทำงานที่ else นั่นเอง ถ้าไม่มี else ได้มั้ย ได้ ก็ถ้าเงื่อนไขที่ if ไม่ถูกเนีย ก็จะจบการทำงานเลย
        else คือ ถ้าเงื่อนไขที่ if เนียไม่ถูกต้อง else ก็จะทำงาน

        หวังว่าจะไม่งงกันนะ 555
        */

        echo "<script>alert('Username or Password is not correct');</script>";
        // echo ของ php จะ echo เป็นภาษา html ตามโค้ดข้างบนคือ ใช้ tag script เพื่อเรียกใช้ภาษา javascript 
        /*
        alert ของ javascript คือกล่องข้อความที่แจ้งเตือนขึ้นมา โดยจะให้แจ้งเตือนว่า   Username or Password is not correct  
        */
    }
}