<?php
session_start();
// เริ่มการทำงานของ session
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

    <title>PHP - Simple Register</title>

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
            <h1>Register Form</h1>
        </div>
        <form action="" method="POST">
            <!-- 
                action คือ สิ่งที่เอาไว้กำหนดว่าจะให้ส่งข้อมูลใน form เนีย ไปที่ไหน 
                method คือ การกำหนดรูปแบบการส่งข้อมูล 
            -->
            
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" class="form-control" id="Username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="submit_register" class="btn btn-primary">Submit</button>
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
</body>

</html>
<?php
if (isset($_POST["submit_register"])) {
    // ถ้า มี submit_register ในรูปแบบ post เข้ามา ให้ทำงานในสโคปนี้

    require_once("connect.php");
    // ไปเอาไฟล์ หรือ นำไฟล์ connect.php เข้ามาใช้งานในไฟล์นี้ ในไฟล์ connect.php มีตัวแปรอะไรบ้าง ก็สามารถใช้งานตัวแปรนั้นในไฟล์นี้ได้เลย

    $username = $_POST["username"];
    // นำค่าจาก name="username" ในรูปแบบ post มาเก็บไว้ในตัวแปร username

    $password = $_POST["password"];
    // นำค่าจาก name="password" ในรูปแบบ post มาเก็บไว้ในตัวแปร password

    $user_check = 'SELECT * FROM account WHERE username = "' . $username . '"';
    // สร้างตัวแปร user_check มาไว้สำหรับเก็บคำสั่ง sql โดยคำสั่ง sql ที่ใช้เนียคือ ให้ไปหา username ในฐานข้อมูล

    $result = mysqli_query($connect, $user_check);
    // สร้างตัวแปร result ขึ้นมาไว้ทำการ query คำสั่ง sql เข้าไปที่ sql server ก็คือนำคำสั่ง sql ในตัวแปร user_check ไปรันบน sql server แล้วเอาผลลัพธ์ที่รันมาเก็บไว้ในตัวแปร result

    if ($result->num_rows == 0) {
        // ถ้า จำนวนแถวที่ค้นหามี 1 แถว ให้ทำงานในสโคปนี้
        /*
        อธิบายเพิ่มเติมนิดนึง คือเราเก็บผลลัพธ์การ query หรือ การรัน คำสั่ง sql เนีย ไว้ในตัวแปร result
        ทีนี้เราก็เอาตัวแปร result มา -> กับ num_rows เพื่อนับจำนวนแถวที่ query ข้อมูลมาได้
        ถ้าจำนวนแถวมี 0 แถว (หรือก็คือไม่มีชื่อผู้ใช้นี้ในฐานข้อมูล) ให้ทำงานในสโคปนี้

        ก็คือที่เราต้องหาชื่อผู้ใช้ก่อนเนียเพราะว่าป้องกันการสมัครซ้ำ
        โดย ให้หาในฐานข้อมูลก่อนว่ามี username ที่สมัครมามั้ย
        ถ้าไม่มีก็ให้ทำการสมัครสมาชิกต่อได้เลย (บันทึก username และ password เข้าฐานข้อมูล)
        แต่ถ้ามี ก็จะไม่ผ่านเงื่อนไขตรง   if ($result->num_rows == 0)
        */

        $query = 'INSERT INTO account (username, password) VALUES ("' . $username . '", "' . $password . '")';
        // สร้างตัวแปร query มาไว้สำหรับเก็บคำสั่ง sql โดยคำสั่ง sql ที่ใช้เนียคือ insert หรือ นำเข้าข้อมูลเข้าสู่ ฐานข้อมูล
        /*
        อธิบายเสริมเกี่ยวกับคำสั่ง insert ของ sql นิดนึง
        รูปแบบคำสั่ง insert เนียจะประมาณนี้
        INSERT INTO ชื่อตาราง (ชื่อคอลัมน์1,ชื่อคอลัมน์2,ชื่อคอลัมน์3,ชื่อคอลัมน์...) VALUES ('ค่าที่1','ค่าที่2','ค่าที่3','ค่าที่...')

        เขียนครั้งแรกๆอาจจะงงๆถ้าหัดเขียนบ่อยๆ จะเข้าใจมากขึ้น
        */

        $result = mysqli_query($connect, $query);
        // นำตัวแปร result มาเก็บผลการ query sql ตัวแปรสามารถใช้ซ้ำได้ เผื่อบางคนจะงงว่าทำไม result ถึงซ้ำ เพราะ query ที่เก็บใน result ก่อนหน้าไม่ได้ใช้แล้ว จึงสามารถนำตัวแปร result มาเก็บค่าใหม่ได้เลย

        if ($result) {
            /* 
            ตรงนี้งงแน่ๆถ้าเป็นคนที่เพิ่งหัดเขียน php คือใน result ที่บอกว่าเก็บ query เนียจะเก็บค่าเป็น boolean ก็คือ True False
            ถ้าเป็น True เนียก็คือ query สำเร็จ ไม่มี error อะไร
            ถ้าเป็น False ก็คือ query ไม่สำเร็จ มี error
            อธิบาย if else เสริมก็คือ

            if (True) {
                จะทำงานแค่ในนี้ เพราะ if เป็น True
            } else {
                จะไม่มีทางทำงานในนี้แน่นอน
            }

            if (False) {
                จะไม่มีทางทำงานในนี้แน่นอนเพราะ if เป็น False
            } else {
                จะทำงานในนี้เพราะ if เป็น false หรือก็คือเงื่อนไขข้างบนไม่ถูกต้องเลยมาทำงานที่ else
            }

            เลยนำมาใช้งานเพื่อตรวจสอบว่าทำการบันทึกข้อมูลเข้าฐานข้อมูลสำเร็จมั้ย
            */

            $_SESSION['username'] = $username;
            // กำหนด session ชื่อ username ให้เก็บชื่อผู้ใช้เอาไว้ ให้เบาร์เซอร์จำไว้ว่า เนียที่เราล็อกอินอยู่เนีย ล็อกอินด้วย username นี้นะ

            echo "<script>window.location='index.php'</script>";
            // window.location เป็นคำสั่งให้ redirect ไปที่ไฟล์หรือหน้าที่กำหนดไว้ ตามโค้ดด้านบนคือไปที่หน้า index.php
            /*
            redirect คือการเปลี่ยนเส้นทาง หรือ เปลี่ยนหน้าเว็บไปหน้านั้นๆที่เรากำหนดไว้
            */

        } else {
            echo "<script>alert('Something went wrong');</script>";
            // จะทำงานเมื่อ query error หรือ เป็น false ให้แจ้งเตือนว่ามีบางอย่างไม่ถูกต้อง
            /*
            echo ของ php จะ echo เป็นภาษา html ตามโค้ดข้างบนคือ ใช้ tag script เพื่อเรียกใช้ภาษา javascript
            alert ของ javascript คือกล่องข้อความที่แจ้งเตือนขึ้นมา โดยจะให้แจ้งเตือนว่า   Something went wrong
            */
        }
    } else {
        // ตรงนี้ดูดีๆนะ ว่าเป็น else ของ if ไหน ตอนนี้มี if else ใน if else อยู่พยายามดูให้ดีๆ

        echo "<script>alert('Username already exists');</script>";
        // จะทำงานเมื่อมีอยู่ในฐานข้อมูล แจ้งเตือนว่า ชื่อผู้ใช้นี้ ถูกใช้ไปแล้ว
        /*
        echo ของ php จะ echo เป็นภาษา html ตามโค้ดข้างบนคือ ใช้ tag script เพื่อเรียกใช้ภาษา javascript
        alert ของ javascript คือกล่องข้อความที่แจ้งเตือนขึ้นมา โดยจะให้แจ้งเตือนว่า   Username already exists
        */
    }
}
