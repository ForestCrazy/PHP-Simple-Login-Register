<?php
session_start();
// เริ่มการทำงาน session

session_destroy();
// ทำลาย หรือ ยกเลิก session ทั้งหมดที่เรากำหนดไว้

header("Location: index.php");
// ให้ redirect หรือ พา ไปหน้า index.php
?>