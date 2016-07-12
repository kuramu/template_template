<?php
/**
 *
 *	画像をアップロードし、メールに添付するためのプログラムプラグインです。
 *	使い方は、contact/images/tmpを作成し、
 *	フォームにてファイルをアップロード（名前はなんでもいいです。）
 *	
 *
 */
class Image{


	public $data = array();


	public function __construct(){
		if(!empty($_FILES)){
			$this->delete_in_image_dir();
			foreach($_FILES as $name => $file){
				$file = $this->check_image($file);
				$this->data[$name] = $file;
			}
		}
	}

	public function check_image($file = array()){
		try {
		    // 未定義である・複数ファイルである・$_FILES Corruption 攻撃を受けた
		    // どれかに該当していれば不正なパラメータとして処理する
		    if (
		        !isset($file['error']) ||
		        !is_int($file['error'])
		    ) {
		        throw new RuntimeException('パラメータが不正です');
		    }


		    // $_FILES['upfile']['error'] の値を確認
		    switch ($file['error']) {
		        case UPLOAD_ERR_OK: // OK
		            break;
		        case UPLOAD_ERR_NO_FILE:   // ファイル未選択
		            throw new RuntimeException('ファイルが選択されていません');
		        case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
		        case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
		            throw new RuntimeException('ファイルサイズが大きすぎます');
		        default:
		            throw new RuntimeException('その他のエラーが発生しました');
		    }

		    // ここで定義するサイズ上限のオーバーチェック
		    // (必要がある場合のみ)
		    // if ($file['size'] > 2000000) {
		    //     throw new RuntimeException('ファイルサイズが大きすぎます');
		    // }

		    // $_FILES['upfile']['mime']の値はブラウザ側で偽装可能なので
		    // MIMEタイプに対応する拡張子を自前で取得する
		    $finfo = new finfo(FILEINFO_MIME_TYPE);
		    if (!$ext = array_search(
		        $finfo->file($file['tmp_name']),
		        array(
		            'gif' => 'image/gif',
		            'jpg' => 'image/jpeg',
		            'png' => 'image/png',
		        ),
		        true
		    )) {
		        throw new RuntimeException('ファイル形式が不正です');
		    }

		    // ファイルデータからSHA-1ハッシュを取ってファイル名を決定する
		    if (!move_uploaded_file(
		        $file['tmp_name'],
		        $path = sprintf(dirname(__FILE__).'/uploads/%s.%s',
		            sha1_file($file['tmp_name']),
		            $ext
		        )
		    )) {
		        throw new RuntimeException('ファイル保存時にエラーが発生しました');
		    }

		    // ファイルのパーミッションを確実に0644に設定する
		    chmod($path, 0644);
		    /**
		     *	変数に情報を格納
		     *
		     */
		    $file['Upload']['path'] = $path;
		    $file['Upload']['name'] = basename($path);
		    return $file;

		}catch (RuntimeException $e) {

    		return $e->getMessage();
    	}
	}

	public function set_url($input_name = null, $options = array()){
		if(!empty($input_name)){
			if(!empty($this->data[$input_name]['Upload']['name'])){
				$defaults = array(
					'image_url' => function_exists('get_template_directory_uri') ? 
									get_template_directory_uri().'/contact/Controller/uploads/' : 
									$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/Controller/uploads/',
				);
				$options = array_merge($defaults, $options);
				//POSTに追加
				$_POST[$input_name]['name'] = $this->data[$input_name]['name'];
				$_POST[$input_name]['path'] = $this->data[$input_name]['Upload']['path'];
				return $options['image_url'].$this->data[$input_name]['Upload']['name'];
			}else{
				return empty($this->data[$input_name]) ? false : $this->data[$input_name];
			}
		}
	}

	public function delete_in_image_dir(){
		if (!$handle=opendir(dirname(__FILE__).'/uploads/')) die("ディレクトリの読み込みに失敗しました");
        while($filename=readdir($handle))
        {
                if(!preg_match("/^\./", $filename))
                {
                        if (!unlink(dirname(__FILE__)."/uploads//$filename")) die("ファイルの削除に失敗しました");
                }
        }
	}
	


}