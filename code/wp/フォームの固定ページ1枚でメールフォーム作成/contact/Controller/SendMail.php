<?php



/**

 *	参考サイト：http://web.creator-world.net/2008/08/php-mail.html

 *			http://blog.livedoor.jp/k_shin_pro/archives/19300857.html

 *

 */





class SendMail {



	public $data = array();

	public $mailto = "";//宛先ユーザー用

	public $mailadmin = "";//宛先管理者用

	public $subject="";//件名ユーザー用

	public $subadmin ="";	//件名管理者用

	public $mailfrom = ""; //送信元

	public $content = "";

	public $content_admin = "";

	public function GetInfo() {

		if (empty($this->data)) {

			$pos = $_POST;

			foreach($pos as $key => $value) {

				$this->data[$key]['key'] = $key;

				$this->data[$key]['content'] = $_POST[$key];

			}

		}

	return $this->data;

	}



	public function __construct() {

		$this->GetInfo();

	}





	public function Send() {



		//メール送信

		mb_language("Ja");

		mb_internal_encoding("UTF-8") ;



		$header  = "From: " . $this->mailfrom. "\r\n";



	    // temp

	    $header .= "MIME-Version: 1.0\r\n";

	    $header .= "Content-Type: multipart/mixed; boundary=\"__PHPRECIPE__\"\r\n";

	    $header .= "\r\n";



	    $content_start  = "--__PHPRECIPE__\r\n";

	    $content_start .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n";

	    $content_start .= "\r\n";


	    // メールテンプレートを読み込む
		if(!empty($this->content)){

			$this->content = mb_convert_encoding(file_get_contents($this->content,true), 'UTF-8', 'auto');

		}else{

			$this->content = mb_convert_encoding(file_get_contents("default.txt",true), 'UTF-8', 'auto');//メールテンプレート  メールテンプレートファイルへのパス

		}



		if(!empty($this->content_admin)){

			$this->content_admin = mb_convert_encoding(file_get_contents($this->content_admin,true), 'UTF-8', 'auto');

		}else{

			$this->content_admin = mb_convert_encoding(file_get_contents("default_admin.txt",true), 'UTF-8', 'auto');//メールテンプレート  メールテンプレートファイルへのパス

		}



		// 住所
		$my_address = '';
		// 売却物件所在地
		$sale_property_location = '';

		foreach($this->data as $key => $value) {
			switch($key){
				case 'post' :  $my_address .= '郵便番号:'.$value['content']."\r\n"; break;
				case 'area' :  $my_address .= 'ご住所:'.$value['content']; break;
				case 'address' :  $my_address .= " ".$value['content']."\r\n"; break;
				case 'sale_property_location' : $sale_property_location .= $value['content'] === '上記の住所と同じ' ? '上記の住所と同じ'."\r\n" : ''; break;
				case 'sale_property_post' : $sale_property_location .= !empty($value['content']) ? '郵便番号:'.$value['content']."\r\n" : ""; break;
				case 'sale_property_area' : $sale_property_location .= !empty($value['content']) ? 'ご住所:'.$value['content'] : ""; break;
				case 'sale_property_address' : $sale_property_location .= !empty($value['content']) ? " ".$value['content']."\r\n" : ""; break;
				default :
					$this->content = str_replace("%%".strtoupper($value['key'])."%%",$value['content'],$this->content);//置き換え単語
					$this->content_admin = str_replace("%%".strtoupper($value['key'])."%%",$value['content'],$this->content_admin);//置き換え単語
					break;
			}
		}
		// 住所、売却物件所在地を置き換える
		$this->content = str_replace("%%MY_ADDRESS%%",$my_address,$this->content);//置き換え単語
		$this->content_admin = str_replace("%%MY_ADDRESS%%",$my_address,$this->content_admin);//置き換え単語
		$this->content = str_replace("%%SALE_PROPERTY_LOCATION%%",$sale_property_location,$this->content);//置き換え単語
		$this->content_admin = str_replace("%%SALE_PROPERTY_LOCATION%%",$sale_property_location,$this->content_admin);//置き換え単語

		$this->content = $content_start.$this->content;

		$this->content_admin = $content_start.$this->content_admin;

		$this->content .= "\r\n--__PHPRECIPE__\r\n";

		$this->content_admin .= "\r\n--__PHPRECIPE__\r\n";

		$this->content = str_replace(array("\r\n","\n\r"), "\n", $this->content);

		$this->content_admin = str_replace(array("\r\n","\n\r"), "\n", $this->content_admin);
		
		mb_send_mail(trim($this->mailadmin),$this->subadmin,$this->content_admin,trim($header), "-f ".$this->mailfrom);//管理者向け送信処理 (宛先,件名,本文,送信元)

		mb_send_mail(trim($this->mailto),$this->subject,$this->content,trim($header),"-f ".$this->mailfrom);	//ユーザー向け送信処理 (宛先,件名,本文,送信元)



	}


}



