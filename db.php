<?php
$host="localhost";
$user="root";
$pass="";
$database="chatsystem";

$connection=new mysqli($host,$user,$pass,$database);

function formatDate($date){
	return date('g:i a',strtotime($date)); //to display time not date...for date: 'F j, Y, g:i a'
}

?>