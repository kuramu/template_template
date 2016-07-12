<?php

class Validate{


	public $data = array();


	public function __construct(){
		$this->GetPostData();
	}

	public function GetPostData(){
		$this->data = $_POST;
	}
	/**
	 * リダイレクト処理
	 *
	 *
	 */
	public function validateCheck($url = null){
		if(!empty($_SESSION['validationError'])){

			foreach($_POST as $key => $value){
		        $_SESSION['requestData'][$key] = $value;
		    }
		    error_reporting(E_ALL);
		    ini_set('display_errors', 1);
		    header("Location: ". $url);
		    exit;
		}

	}


	/**
	 * バリデーションメイン
	 *
	 *
	 */
	public function validation($postKey, $method = array()){

		foreach($method as $rule => $field){
			$result = $this->{$rule}($postKey, $field['message']);

			//breakがあった場合は、引っ掛かった場合やめる
			if(!empty($field['break']) && $field['break']){
				if(!$result){
					return false;
				}
			}
		}

	}


	/**
	 * 必須項目用
	 *
	 */

	public function emptyData($postKey, $message = null){

		$errMessage = !empty($message) ? $message : '入力してください';

		$postData = $this->data[$postKey];
		if(empty($postData)){
			$_SESSION['validationError'][$postKey] = $errMessage;
		}else{
			return true;
		}
	}
	/**
	 * email用
	 *
	 *
	 */

	public function email($postKey, $message = null){

		$errMessage = !empty($message) ? $message : 'メールアドレスの形式が違います。';

		$postData = $this->data[$postKey];
		if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+\.([a-zA-Z]{2,3})$/", $postData)){
			$_SESSION['validationError'][$postKey] = $errMessage;
		}else{
			return true;
		}

	}
	/**
	 *
	 * 電話番号用
	 *
	 */
	public function tel($postKey, $message = null){

		$errMessage = !empty($message) ? $message : '入力してください';

		$postData = $this->data[$postKey];
		if(empty($postData)){
			$_SESSION['validationError'][$postKey] = $errMessage;
		}else{
			return true;
		}
	}


}