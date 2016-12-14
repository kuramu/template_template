$(function(){

$(".form").submit(function(){
		$("p.error").remove();
		$("dl dd").removeClass("error");

$(":text,textarea,:password").filter(".validate").each(function(){

	//半角カタカナはNG
	$(this).filter(".hankakukata-ng").each(function(){
		if($(this).val() && $(this).val().match(/^[｡-ﾟ]/g)){
			$(this).parent().prepend("<p class='error'>・半角カタカナは使用しないでください</p>")
		}
	})

	//半角英数字のみOK
	$(this).filter(".haneisuji-ok").each(function(){
		//if($(this).val() && !$(this).val().match(/^[a-zA-Z0-9]*$/g)){
		if($(this).val() && !$(this).val().match(/^[a-zA-Z0-9\-\:]+$/g)){
			$(this).parent().prepend("<p class='error'>・半角英数字で入力してください</p>");
		}
	})

	//全角英数字はNG
	$(this).filter(".zenkakuei-ng").each(function(){
		if($(this).val().match(/^[０-９ａ-ｚＡ-Ｚ]+/g)){
			$(this).parent().prepend("<p class='error'>・全角英数字は使用しないでください</p>")
		}
	})

	//全角カタカナのみOK
	$(this).filter(".zenkakukana-ok").each(function(){
		if($(this).val() && !$(text-cuncheck5in12inis).val().match(/^[ァ-ン]/g)){
			$(this).parent().prepend("<p class='error'>・全角カタカナで入力してください</p>")
		}
	})

	//全角カタカナはNG
	$(this).filter(".zenkakukana-ng").each(function(){
		if($(this).val().match(/^[ァ-ン]/g)){
			$(this).parent().prepend("<p class='error'>・全角カタカナは使用しないでください</p>")
		}
	})

	//必須項目のチェック
	$(this).filter(".required").each(function(){
		if($(this).val()==""){
			$(this).parent().prepend("<p class='error'>・必須項目です</p>");
		}
	})

	//2つ以上のinputには一つしかエラーメッセ表示させない。エラー内容は中身を変える※ddを使用してます
	$(this).filter(".required-ng2").each(function(){
		if($(this).val().match(/^[｡-ﾟ]*$/g)){
			$(this).parent().prepend("<p class='error'>・必須項目です</p>");
			count = $(this).parent("dd").find("p.error").length;
			if(count >= 2){
				$(this).parent("dd").find("p.error").remove();
			$(this).parent().prepend("<p class='error'>・必須項目です</p>");
			}else{

			}
		}
	})

	//3つ以上のinputには一つしかエラーメッセ表示させない。エラー内容は中身を変える※ddを使用してます
	$(this).filter(".required-ng3").each(function(){
		if($(this).val().match(/^[｡-ﾟ]*$/g)){
			$(this).parent().prepend("<p class='error'>・必須項目です</p>");
			count = $(this).parent("dd").find("p.error").size;
			if(count >= 3){
				$(this).parent("dd").find("p.error").remove();
			$(this).parent().prepend("<p class='error'>・必須項目です</p>");
			}else{

			}
		}
	})


	//郵便番号のチェック
	$(this).filter(".yuubin").each(function(){
		if(!$(this).val().match(/^(?:\d{3}-?\d{4}$|^\d{3}-?\d{2}$|^\d{3}$)*$/)){
			$(this).parent().prepend("<p class='error'>正しい郵便番号の形式を入力してください</p>")
		}
	})

	//電話番号のチェック　※ハイフンありでもなしでも通る記述
	$(this).filter(".tel-ba").each(function(){
		if($(this).val() && !$(this).val().match(/^\d{10,12}|\d{2,5}-\d{2,4}-\d{4}$/)){
			$(this).parent().prepend("<p class='error'>正しい電話番号の形式を入力してください</p>")
		}
	})

	//数値のチェック
	$(this).filter(".number").each(function(){
		if(isNaN($(this).val())){
			$(this).parent().prepend("<p class='error'>数値のみ入力可能です</p>")
		}
	})

	//メールアドレスのチェック
	/*
	class属性に「mail_check」と付いている要素に対しては、前に入力したメールアドレス欄と内容が一致しているか照合します。


　照合先のフォームは、name属性の値を使って指定します。「メールアドレス確認」の入力フォームのname属性の値を取得し、取得した値から「_check」を取り除いたname属性を持つ要素が照合先のフォーム部品です。name属性から_checkを取り除くのはreplace()(関連記事)で、name属性が付いている要素は属性セレクター(関連記事)で取得できます。
　今回のサンプルでは、「メールアドレスの確認」のname属性は「mail_check」ですので、「_check」を取り除いた「mail」というname属性を持つ入力フォームと照合しています。
<dl>
	<dt>メールアドレス</dt>
	<dd><input name="mail" class="validate mail" type="text" placeholder="入力してください"></dd>
</dl>
<dl>
	<dt>メールアドレス確認</dt>
	<dd><input name="mail_check" class="validate mail_check" type="text" placeholder="入力してください"></dd>
</dl>
	*/

	//メールアドレスのチェック
	$(this).filter(".mail").each(function(){
		if($(this).val() && !$(this).val().match(/.+@.+\..+/g)){
			$(this).parent().prepend("<p class='error'>・メールアドレスの形式が異なります</p>")
		}
	})

	//メールアドレス確認のチェック
	$(this).filter(".mail_check").each(function(){
		if($(this).val() && $(this).val()!=$("input[name="+$(this).attr("name").replace(/^(.+)_check$/, "$1")+"]").val()){
			$(this).parent().prepend("<p class='error'>・メールアドレスと内容が異なります</p>")
		}
	})

	/*
	<dl>
		<dt>パスワード</dt>
		<dd><input type="text" class="validate required pass hankakukata-ng"></dd>
	</dl>
	<dl>
		<dt>パスワード確認</dt>
		<dd><input type="text" class="validate required pass_check hankakukata-ng"></dd>
	</dl>
	*/
	//入力内容一致の確認のチェック
	$(this).filter(".pass_check").each(function(){
		if($(this).val() != $(".pass").val()){
			$(this).parent().prepend("<p class='error'>・同じパスワードを入力してください</p>")
		}
	})

	//正しいURL形式かチェック
	$(this).filter(".url_check").each(function(){
		if($(this).val() && !$(this).val().match(/^(?:http|https):\/\/[\w,.:;&=+*%$#!?@()~\'\/-]+$/)){
			$(this).parent().prepend("<p class='error'>URLの形式が異なります</p>")
		}
	})

	//inputテキスト5文字以上12文字以内の入力制限
	$(this).filter(".text-cuncheck5in12in").each(function(){
		var counter = $(this).val().size;
		if(counter == 0){
		}
		else if(counter < 5){
			$(this).parent().prepend("<p class='error'>5文字以上12文字以内で入力してください</p>");
		}
		else if(counter > 12){
			$(this).parent().prepend("<p class='error'>5文字以上12文字以内で入力してください</p>");
		}
	})







})//$(function(){$(".form").submit(function(){


/*
同意するのチェック
<ul class="privacy-te-bottom">
<li><input name="q1" id="la1" type="radio" class="validate-doi required"><label for="la1">同意する</label</li>
<li><input name="q1" id="la2" type="radio"><label for="la2">同意しない</label></li>
</ul>
*/
	//同意するのチェック
	$(":radio").filter(".validate-doi").each(function(){
	$(this).filter(".required").each(function(){
		if($("#la1:checked").size() == 0){
			$(this).parent().prepend("<p class='error'>・同意するにチェックしてください。</p>")
		}
	})
	})

//チェックボックスのチェック
/*
次は、チェックボックスのバリデーションです。チェックボックスはラジオボタンのようにグルーピングする機能がありませんので、親要素（dd要素）に「checkboxRequired」というclass属性を付け、その子要素のチェックボックスが選択されているか調べます。
<dd class="checkboxRequired">
	<ul>
	<li><input type="checkbox" id="c1" name="a"><label for="c1">check1</label></li>
	<li><input type="checkbox" id="c2" name="b"><label for="c2">check2</label></li>
	<li><input type="checkbox" id="c3" name="c"><label for="c3">check3</label></li>
	</ul>
</dd>
class属性が「checkboxRequired」の要素の子要素にあるチェックボックスのsize()が0、つまり何もチェックが付いてない場合のみエラーを表示します。
*/


		$(".checkboxRequired").each(function(){
			if($(":checkbox:checked",this).size()==0){
				$(this).prepend("<p class='error'>選択してください</p>")
			}
		})

//セレクトボックス選択してるかチェック
//複数の場合都度追加する
	$(".sec-c").each(function(){
		if($(".sec-c option:selected").val() == ""||$(".sec-c2 option:selected").val() == ""){
			$(".sec-c").parent().prepend("<p class='error'>・選択してください</p>")
		}
	})

//ラジオボタンのチェック
/*
　ラジオボタンのバリデーションは、class属性に「validate」と「required」の両方が設定されている要素を対象に実施します。同じname属性（ここでは「gender」)が設定されているラジオボタンのうち、チェックの入っているボタンが1つ以上存在するかを調べます。

　チェックの入っているボタンは、:checked(関連記事)セレクターで特定でき、セレクターに合致する要素の数はsize()を使って調べられます。size()で調べた結果、チェックの入っているボタンの数が0の場合に、エラーメッセージを表示します。

ラジオボタンは、name属性が同じinput要素のいずれかにclass属性「validate」「required」が設定されていればチェックできます。
<input type="radio" value="男性" name="gender" id="man" class="validate required" /> <label for="man">男性</label>
<input type="radio" value="女性" name="gender" id="woman" /><label for="woman">女性</label>
*/
	$(":radio").filter(".validate").each(function(){
	$(this).filter(".required").each(function(){
		if($(":radio[name="+$(this).attr("name")+"]:checked").size() == 0){
			$(this).parent().prepend("<p class='error'>・選択してください</p>")
		}
	})
	})


	//ラジオボタンノチェック。一つでも選択されてないとエラーがでる
	$(":radio").filter(".validate-a").each(function(){
	$(this).filter(".required").each(function(){
		if($(".raij-a:checked").size() == 0){//任意のclassをcheck対象のラジオボタン全てに入れる
			$(this).parent().prepend("<p class='error'>一つ選択してください。</p>")
		}
	})
	})

/*
<ul class="privacy-te-bottom">
	<li><input type="checkbox" class="validate required" id="doi" name="q1"><label for="la1">同意する</label></li>
	<li><input type="checkbox" id="la2" name="q1"><label for="la2">同意しない</label></li>
</ul>
*/
	//同意チェックboxバージョン　チェックボックスのチェック
	$(":checkbox").filter(".validate").each(function(){
	$(this).filter(".required").each(function(){
	if($("#doi:checked").size()==0){
		$(this).parent().prepend("<p class='error'>・同意するにチェックしてください。</p>")
	}
	})
	})





    if($("p.error").size() > 0){
            $('html,body').animate({ scrollTop: $("p.error:first").offset().top-40 }, 'slow');
            //$("p.error").parent().addClass("error");

        	/*
        	//エラーと同時にinputの背景色を変える方法 ※parents("dd")のセレクターは都度変える
			$("p.error").each(function(){
				$(this).parents("dd").find("input,select,textarea").css('background-color', '#ffb8a7').addClass("erayo");
			})

			$(".erayo").each(function(){
				if($(this).parents("dd").find(".error").length){
					$(this).css('background-color', '#ffb8a7').addClass("erayo");
				}else{
					$(this).css('background-color', '#ffffff').removeClass("erayo");
				}
			})
			*/


            return false;
    }



})
})






/*
説明　　　　　　　　　正規表現　　　　　　　　　　　備考
半角英字　　　　　　　^[a-zA-Z]*$
半角英数字　　　　　　^[a-zA-Z0-9]*$
ASCII文字　　　　　　　^[ -~]*$
<>&　　　　　　　　　　^[＆amp;＆gt;＆lt;]{1,5}$　　表現上＆を大文字にしてます
¥　　　　　　　　　　　　^[¥¥]*$
半角記号　　　　　　　　^[ -/:-@¥[-¥`¥{-¥~]*$
半角カタカナ　　　　　　^[｡-ﾟ]*$
ひらがな　　　　　　　　^[ぁ-ん]*$
カタカナ　　　　　　　　^[ァ-ヶ]*$
すべての漢字　　　　　　^[亜-黑]*$
全角英数字　　　　　　　^[ａ-ｚＡ-Ｚ０-９]*$
全角記号　　　　　　　　^[、-◯]*$ これうまくいかない
全角記号(キーボードにあるもの)　　　　　^[！”＃＄％＆’（）＊＋－．，／：；＜＝＞？＠￥＾＿～｛｜｝「」　]*$
全角全部(記号はキーボードにあるもの)　^[ぁ-んァ-ヶ亜-黑ａ-ｚＡ-Ｚ０-９！”＃＄％＆’（）＊＋－．，／：；＜＝＞？＠￥＾＿～｛｜｝「」　]*$
全角特殊文字　　　　　　　^[○×]*$ 　　　　　　　　　　自分で書くしかない？
桁数を指定(1桁から5桁)　^[a-zA-Z0-9]{5,10}$
5桁以上の繰り返し　　　　^[a-zA-Z0-9]{5,}$
5桁以下の繰り返し　　　　^[a-zA-Z0-9]{1,5}$ 　　　　　{,5}だとだめー
定数(trueもしくはfalse)　^true$｜^false$ 　　　　　表記上｜は大文字にしてます
改行　　　　　　　　　　　　^[A-Z¥r¥n]*$ 　　　　　　　テキストエリアなど。ただし先頭に改行を入れると消える


//ASCII文字
!"#$%&'()*+-.,/0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[¥]^_`abcdefghijklmnopqrstuvwxyz{|}~半角空白
//半角記号
!"#$%&'()*+-.,/:;<=>?@[¥]^_`{|}~半角空白
//全角記号（キーボードにあるもの）
！”＃＄％＆’（）＊＋－．，／：；＜＝＞？＠￥＾＿～｛｜｝「」　
//半角カタカナ
ｰ｡｢｣､･ｦｧｨｩｪｫｬｭｮｯﾀｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾐﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜﾝﾞﾟ
*/
