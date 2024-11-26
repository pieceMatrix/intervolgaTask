<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/core/index.php");
$students=new Student();
$stm1=$students->select()->where('id_group', $_POST['id_group']);
var_dump($stm1);
$subjects=new Subject();
//$stm2=$subjects->select()->where('id_group', $_POST['id_group']);
//придумать что-то получше
$stm2 = Database::prepare('
    SELECT DISTINCT 
    sb.name AS name
    FROM grades AS gr 
    JOIN subjects AS sb ON gr.id_subject = sb.id 
    JOIN students AS st ON gr.id_student = st.id
    WHERE id_group=:id_group')
;
$stm3 = Database::prepare('
   SELECT  SUM(grades.grade) AS sum
FROM grades
JOIN subjects ON grades.id_subject = subjects.id
JOIN students ON grades.id_student = students.id
WHERE students.id_group = :id_group
GROUP BY subjects.id')
;
$stm2->bindValue(':id_group',$_POST['id_group']);
$stm2->execute();
$stm3->bindValue(':id_group',$_POST['id_group']);
$stm3->execute();