<?php
class StudentTable{
	static public function get_all(){
   $statment = Database::query('SELECT id.groups, ...');
   $statment->execute();
    return  $statment->fetchall();
}
}
