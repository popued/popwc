<?php
class Response{
	/**
    *按json方式输出通信数据
    *@param interger $code 状态码
    *@param string $message 提示信息
    *@param array $data 数据
    *return string
	*/
	public static function json($code,$message='',$data = array()){
		if(!is_numeric($code)){
			return '';
		}
		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data,
			);
		$result = json_encode($result);
		//echo $result;
		$callback=$_GET['callback']; 
		echo $callback."($result)";//回调获取json数据
		exit;
	}
}