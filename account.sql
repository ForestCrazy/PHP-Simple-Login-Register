SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";


CREATE TABLE IF NOT EXISTS `account` (
/* CREATE TABLE IF NOT EXISTS คือ ให้สร้างตารางถ้าตารางนั้นไม่ได้มีอยู่ในฐานข้อมูล เป็นการป้องกันการสร้างตารางซ้ำ */
  `id` int(10) NOT NULL AUTO_INCREMENT,
  /* 
  int คือ การกำหนดประเภทของข้อมูลเป็น integer หรือ ตัวเลขแบบจำนวนเต็มนั่นเอง
  (10) คือการกำหนดความยาวสูงสุดของข้อมูลในฟิลด์ให้มีความยาวสูงสุดที่ 10 ตัว
  NOT NULL คือห้ามปล่อยให้ช่องหรือฟิลด์นี้เป็นค่าว่างเปล่า
  AUTO_INCREMENT เป็นการให้ sql เรียงเลขให้โดยอัตโนมัติ
  */
  
  `username` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  /*
  varchar คือ การกำหนดประเภทของข้อมูลเป็น ข้อมูลตัวอักขระ
  (300) คือการกำหนดความยาวสูงสุดของข้อมูลในฟิลด์ให้มีความยาวสูงสุดที่ 300 ตัว
  CHARACTER SET เป็นการกำหนดรูปแบบตัวอักษร
  NOT NULL คือห้ามปล่อยให้ช่องหรือฟิลด์นี้เป็นค่าว่างเปล่า
  */
  
  `password` varchar(600) NOT NULL,
  /*
  varchar คือ การกำหนดประเภทของข้อมูลเป็น ข้อมูลตัวอักขระ
  (600) คือการกำหนดความยาวสูงสุดของข้อมูลในฟิลด์ให้มีความยาวสูงสุดที่ 600 ตัว
  NOT NULL คือห้ามปล่อยให้ช่องหรือฟิลด์นี้เป็นค่าว่างเปล่า
  */
  
  `createtime` datetime DEFAULT CURRENT_TIMESTAMP,
  /*
  datetime คือ การกำหนดประเภทของข้อมูลเป็น วันที่และเวลา
  DEFAULT คือ การกำหนดค่าเริ่มต้นของฟิลด์นี้เมื่อมีข้อมูลเพิ่มเข้ามา
  CURRENT_TIMESTAMP คือ วันที่และเวลาที่ข้อมูลถูกเพิ่มเข้ามาในฐานข้อมูล
  
  จากโค้ด `createtime` datetime DEFAULT CURRENT_TIMESTAMP, เนียคือ
  กำหนดให้ CURRENT_TIMESTAMP เป็นค่าเริ่มต้นดังนั้นถ้ามีการเพิ่มข้อมูลเข้ามาแค่ username และ password
  sql server จะทำการนำเวลามาใส่ให้อัตโนมัติเพราะมีการกำหนด เป็นค่าเริ่มต้น ไว้
  */
  
  PRIMARY KEY (`id`)
  /*
  เป็นการกำหนดให้ฟิลด์ id เป็น primary key
  */
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
/*
AUTO_INCREMENT=1 คือ การกำหนดตัวเลขที่เริ่มต้นที่จะให้ sql เรียงเลขให้ตามโค้ดคือ ให้เริ่มที่เลข 1
*/
