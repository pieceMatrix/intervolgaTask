<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/core/index.php");

$groups = new Group();
$students = new Student();
$grades = new Grade();
$statement = $groups->getRecords();
//$statement = $groups->select()->where('id', 1);
$statement2 = $students->getRecords();

$statement3 = Database::query('
    SELECT 
        gr.id AS grade_id, 
        gr.grade, 
        st.fullname, 
        st.id AS student_id, 
        sb.name AS subject_name, 
        sb.id AS subject_id
    FROM grades AS gr 
    JOIN subjects AS sb ON gr.id_subject = sb.id 
    JOIN students AS st ON gr.id_student = st.id
');

$statement3->execute();
$statement3=$statement3->fetchall();
//$statement3=$grades->getJoinRecords([$groups, $students]);
// Получаем все записи
//if(isset($_POST['delete_group_id'])){
    
//}