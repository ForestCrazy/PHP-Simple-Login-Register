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
<html lang="th">
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

    <title>PHP - Simple Login</title>

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

        <div align="center">
            <h1>Login Form</h1>
        </div>

        <form action="" method="POST">
            <!-- 
            action คือ สิ่งที่เอาไว้กำหนดว่าจะให้ส่งข้อมูลใน form เนีย ไปที่ไหน 
            method คือ การกำหนดรูปแบบการส่งข้อมูล

            ตามโค้ดข้างบนเนียคือส่งไปที่ หน้านี้หน้าเดิม แต่ถ้าต้องการจะส่งไปหน้าอื่นก็ใส่ชื่อไฟล์ที่ต้องการจะส่งไป โดยส่งไปในรูปแบบ POST
            -->

            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" class="form-control" id="Username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="submit_login" class="btn btn-primary">Submit</button>
            <!--
                type เป็นการกำหนดรูปแบบ หรือ ประเภท ของตัวรับข้อมูล
                    type="text" เป็นการรับข้อมูลแบบข้อความธรรมดา
                    type="password" เป็นการรับข้อมูลแบบรหัสผ่านต่างกับ text ก็คือจะเปลี่ยนจากข้อความธรรมดาให้มีการ hidden หรือ ปกปิด สิ่งที่พิมพ์เข้าไปไว้แล้วแสดงเป็นจุดดำแทน
                name เนียคือตัวกำหนดว่าจะให้ข้อมูลเนียไปเก็บที่ไหน จะคล้ายๆกับตัวแปรที่สร้างหรือประกาศเอาไว้เพื่อเก็บค่าหรือข้อมูลไว้ในตัวแปร 
                placeholder คือข้อความที่แสดงในช่องกรอกข้อความจะแสดงต่อเมื่อไม่มีข้อมูลหรือข้อความใดๆอยู่ในช่องใส่ข้อมูล
                required เป็นการกำหนดให้มีการร้องขอข้อมูล หรือง่ายๆก็คือ ช่องกรอกข้อมูลนี้ห้ามว่างต้องมีการกรอกข้อมูล
            -->
        </form>
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
    /*
    จาก action="" ก็คือส่งมาหน้านี้หน้าเดิม
    ถ้ากด submit มาก็จะมี ข้อมูลจากฟอร์ม ที่ถูกส่งเข้ามาด้วยในหน้านี้
    พอมี ข้อมูลจากฟอร์ม ก็จะผ่านเงื่อนไขแล้วทำงานในนี้ได้เลย 
    */

    require_once("connect.php");
    // ไปเอาไฟล์ หรือ นำไฟล์ connect.php เข้ามาใช้งานในไฟล์นี้ ในไฟล์ connect.php มีตัวแปรอะไรบ้าง ก็สามารถใช้งานตัวแปรนั้นในไฟล์นี้ได้เลย

    $username = $_POST["username"];
    // นำค่าจาก name="username" ในรูปแบบ post มาเก็บไว้ในตัวแปร username

    $password = $_POST["password"];
    // นำค่าจาก name="password" ในรูปแบบ post มาเก็บไว้ในตัวแปร password
    
    $query = 'SELECT * FROM account WHERE username = "' . $username . '" AND password = "' . $password . '"';
    // สร้างตัวแปร query มาไว้สำหรับเก็บคำสั่ง sql โดยคำสั่ง sql ที่ใช้เนียคือ ให้ไปหา username และ password ในฐานข้อมูล โดย username และ password ต้องตรงกันถ้า อย่างใดอย่างนึงผิดก็จะหาไม่เจอทันที

    $result = mysqli_query($connect, $query);
    // สร้างตัวแปร result ขึ้นมาไว้ทำการ query คำสั่ง sql เข้าไปที่ sql server ก็คือนำคำสั่ง sql ในตัวแปร query ไปรันบน sql server แล้วเอาผลลัพธ์ที่รันมาเก็บไว้ในตัวแปร result

    if (mysqli_num_rows($result) == 1) {
        // ถ้า จำนวนแถวที่ค้นหามี 1 แถว ให้ทำงานในสโคปนี้     mysqli_num_rows เนียเป็นเหมือนคำสั่งที่เอาไว้นับจำนวนแถวที่ทำการ query ข้อมูลใน sql ไป
        /* 
        อธิบายเพิ่มเติมนิดนึง คือเราเก็บผลลัพธ์การ query หรือ การรัน คำสั่ง sql เนีย ไว้ในตัวแปร result
        ทีนี้เราก็เอาตัวแปร result มา mysqli_num_rows เพื่อนับจำนวนแถวที่ query ข้อมูลมาได้
        ถ้าจำนวนแถวมีแค่ 1 ก็คือมันจะมากกว่า 1 ไม่ได้แน่นอน เพราะในระบบ มี username นี้แค่ username เดียวจะไม่มีซ้ำแน่นอน
        ส่วน password ซ้ำได้ แต่มันเป็นข้อมูลที่เก็บในแถวเดียวกันกับ username ดังนั้นถ้า username ตรงแต่ password ไม่ตรง
        ก็หาไม่เจออยู่ดี หรือ username ไม่ตรงแต่ password ตรงก็หาไม่เจออยู่ดี

        username = "' . $username . '" AND password = "' . $password . '"
        สังเกตได้ว่าใช้ AND ก็คือต้องถูกต้องหรือต้องตรงกันทั้งคู่ถึงจะแสดงผลได้
        */

        $_SESSION['username'] = $username;
        // กำหนด session ชื่อ username ให้เก็บชื่อผู้ใช้เอาไว้ ให้เบาร์เซอร์จำไว้ว่า เนียที่เราล็อกอินอยู่เนีย ล็อกอินด้วย username นี้นะ

        echo "<script>window.location='index.php'</script>";
        // window.location เป็นคำสั่งให้ redirect ไปที่ไฟล์หรือหน้าที่กำหนดไว้ ตามโค้ดด้านบนคือไปที่หน้า index.php
        /*
        redirect คือการเปลี่ยนเส้นทาง หรือ เปลี่ยนหน้าเว็บไปหน้านั้นๆที่เรากำหนดไว้
        */
        
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
