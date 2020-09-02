<?php
session_start();
// เริ่มการทำงาน session

session_destroy();
// ทำลาย หรือ ยกเลิก session ทั้งหมดที่เรากำหนดไว้

echo "<script>window.location='index.php'</script>";
// window.location เป็นคำสั่งให้ redirect ไปที่ไฟล์หรือหน้าที่กำหนดไว้ ตามโค้ดด้านบนคือไปที่หน้า index.php
/*
redirect คือการเปลี่ยนเส้นทาง หรือ เปลี่ยนหน้าเว็บไปหน้านั้นๆที่เรากำหนดไว้
*/
?>