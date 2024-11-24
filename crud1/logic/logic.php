<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/crud/core/index.php");

//$groups = new Group();
$statement = Group::getRecords();
$statement2 = Student::getRecords();

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
$groups = new Group();
// Получаем все записи
if(isset($_POST['delete_group_id'])){
    
}