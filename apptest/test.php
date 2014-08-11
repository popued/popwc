<?php
	include('../apptest/app.php');//改成服务器相对应路径
	include('../system/config/database.php');//改成服务器相对应路径
	$link=new mysqli ( $config['master']['host'] ,  $config['master']['username'] ,  $config['master']['password'] ,$config['master']['dbname']);
	if(!$link){
		echo "ERROR:".mysqli_connect_error();
		exit;
	}
	$link->set_charset ($config['charset']);//一定要设置为utf8
	/*$charset  =  mysqli_character_set_name ( $link );
	printf  ( "Current character set is %s\n" , $charset );*/
	$query="select *from aws_question";
	if($result = $link->query($query)){
		$num_rows = $result->num_rows;
		for($i=0;$i<$num_rows;$i++){
			$query="select *from aws_question where question_id=".($i+1);
			if ($result = $link->query($query)) {
				$row = $result->fetch_assoc();
				$rows["question_item"."$i"] =$row;
			}
		}
		Response::json(200,'success',$rows);
}
