$(function(){


    //全角英数字を半っ買うセイ数字に変換
    $('.fm').change(function(){
        var txt  = $(this).val();
        var han = txt.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)});
        $(this).val(han);
    });



$(".form").submit(function(){
        $(".error").remove();
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

    //全角ひらがなのみOK
    $(this).filter(".zenkakuhira-ok").each(function(){
        if($(this).val() && $(this).val().match(/[^ぁ-んー]/)){
            $(this).parent().prepend("<p class='error'>・全角ひらがなで入力してください</p>")
        }
    })
    //全角カタカナのみOK
    $(this).filter(".zenkakukana-ok").each(function(){
        if($(this).val() && !$(this).val().match(/[ア-ンー 　]*/)){
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


    //郵便番号のチェック1ハイフンあり7桁
    $(this).filter(".yuubin1").each(function(){
        if(!$(this).val().match(/^\d{3}[-]\d{4}$/)){
        }else if($(this).val() == ""){
            $(this).parent().prepend("<p class='error'>正しい郵便番号の形式を入力してください</p>")
        }
    })
    //郵便番号のチェック2ハイフンなし7桁
    $(this).filter(".yuubin2").each(function(){
        if(!$(this).val().match(/^\d{7}$/)){
        }else if($(this).val() == ""){
            $(this).parent().prepend("<p class='error'>正しい郵便番号の形式を入力してください</p>")
        }
    })
    //郵便番号のチェック3ハイフンあり・なし両方
    $(this).filter(".yuubin3").each(function(){
        if(!$(this).val().match(/^\d{3}[-]\d{4}$|^\d{3}[-]\d{2}$|^\d{3}$|^\d{5}$|^\d{7}$/)){
            $(this).parent().prepend("<p class='error'>正しい郵便番号の形式を入力してください</p>")
        }
    })




    //電話番号のチェック※ハイフンありでもなしでも通る記述
    $(this).filter(".tel-nashiari").each(function(){
        if($(this).val() && !$(this).val().match(/^\d{10,12}|\d{2,5}-\d{2,4}-\d{4}$/)){
        }else if($(this).val() == ""){
            $(this).parent().prepend("<p class='error'>正しい電話番号の形式を入力してください</p>")
        }
    })

    //電話番号のチェック ハイフンあり3桁だと通らない
    //0から始まる2桁以上4桁以下-１桁以上4桁以下-3桁以上4桁以下
    $(this).filter(".tel-ari").each(function(){
        if($(this).val() && !$(this).val().match(/^0\d{1,4}-\d{1,4}-\d{3,4}$/)){
            $(this).parent().prepend("<p class='error'>正しい電話番号の形式を入力してください</p>")
        }
    })
    //電話番号のチェック※ハイフンなし
    $(this).filter(".tel-nashi").each(function(){
        if($(this).val() && $(this).val().match(/^\d{10}$|^\d{11}$/)){
        }else if($(this).val() == ""){
        }else{
            $(this).parent().prepend("<p class='error'>ハイフン無しで電話番号を入力してください</p>")
        }
    })

    //数字全角ても半角でも通るが数字以外は通らない
    $(this).filter(".zen-han").each(function(){
        //match(/^\d{2,5}\-?[1-9]{2,4}\-?\d{4}$/)
        if($(this).val() && $(this).val().match(/^[０-９]+|^[0-9]+$/)){
        }else if($(this).val() == ""){
        }else{
            $(this).parent().prepend("<p class='error'>数値のみ入力可能です</p>")
        }
    })

    //数値のチェック
    $(this).filter(".number").each(function(){
        if(isNaN($(this).val())){
            $(this).parent().prepend("<p class='error'>数値のみ入力可能です</p>")
        }
    })

    //メールアドレスの2重チェック
    /*
    <dl class="cf">
        <dt class="pt10">メールアドレス<span>必須</span></dt>
        <dd><p class="ml0 box-pora-01 "><input type="text" name="email" placeholder="例）contact@pop-asahi.com" class="mail validate required mail-c"><span class="block doc-textpink-01">※半角英数字</span></p>
        </dd>
    </dl>
    <dl class="cf">
        <dt>メールアドレス確認<span>必須</span></dt>
        <dd>
            <input class="validate mail-check" type="text" name="">
        </dd>
    </dl>
    */

    //メールアドレスのチェック
    $(this).filter(".mail").each(function(){
        if($(this).val() && !$(this).val().match(/.+@.+\..+/g)){
            $(this).parent().prepend("<p class='error'>・メールアドレスの形式が異なります</p>")
        }
    })
    $(this).filter(".mail-check").each(function(){
        if($(this).val() != $(".mail-c").val()){
            $(this).parent().prepend("<p class='error'>・メールアドレスと内容が異なります</p>")
        }
    })

    //メールアドレスのチェック2    「アカウント名@ドメイン名」をチェック
    //他のパターン    xxx@xxx.xxx data = /.+@.+\..+/; xxx@～.com data = /.+@.+\.com$/　（末尾固定） xxx@xxx.comかxxx@xxx.ne.jp data = /.+@.+\.ne\.jp$|.+@.+\.com$/;　（末尾固定） xxx@abc.ne.jp data=/.+@.*abc\.ne\.jp.*/（@以降に特定ドメインを含む）
    $(this).filter(".mail2").each(function(){
        if($(this).val() && !$(this).val().match(/^\S+@\S+\.\S+$/)){
            $(this).parent().prepend("<p class='error'>・メールアドレスの形式が異なります</p>")
        }
    })






    /*パスワードの2重チェック
    <dl class="cf">
        <dt>パスワード<span>必須</span></dt>
        <dd>
            <input class="w250p required pass validate hankakukata-ng" type="text" name="">
        </dd>
    </dl>
    <dl class="cf">
        <dt>パスワード確認<span>必須</span></dt>
        <dd>
            <input class="w250p required pass_check validate hankakukata-ng" type="password" name="">
        </dd>
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
        var counter = $(this).val().length;
        if(counter == 0){
        }
        else if(counter < 5){
            $(this).parent().prepend("<p class='error'>5文字以上12文字以内で入力してください</p>");
        }
        else if(counter > 12){
            $(this).parent().prepend("<p class='error'>5文字以上12文字以内で入力してください</p>");
        }
    })







});//$(":text,textarea,:password").filter(".validate").each(function(){


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
/*

    <dl class="cf">
        <dt>生年月日</dt>
        <dd>
            <select class="sec-c" name="year">
                <option value="">なし</option>
                <option value="1980">1</option>
                <option value="2010">2</option>
            </select>
            <select class="sec-c" name="month">
                <option value="">なし</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <select class="sec-c" name="day">
                <option value="">なし</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </dd>
    </dl>
*/
    $(".sec-c").each(function(){
        if($(this).find("option:selected").val() == "" ){
            $(this).parent().prepend("<p class='error'>・選択してください</p>")
        }
    })
//ラジオボタンのチェック
/*
　ラジオボタンのバリデーションは、class属性に「validate」と「required」の両方が設定されている要素を対象に実施します。同じname属性（ここでは「gender」)が設定されているラジオボタンのうち、チェックの入っているボタンが1つ以上存在するかを調べます。

　チェックの入っているボタンは、:checked(関連記事)セレクターで特定でき、セレクターに合致する要素の数はsize()を使って調べられます。size()で調べた結果、チェックの入っているボタンの数が0の場合に、エラーメッセージを表示します。

ラジオボタンは、!!!!name属性が同じinput要素!!!!のいずれかにclass属性「validate」「required」が設定されていればチェックできます。
<input type="radio" value="男性" name="gender" id="man" class="validate required" /> <label for="man">男性</label>
<input type="radio" value="女性" name="gender" id="woman" /><label for="woman">女性</label>
*/
    //各ラジオボタンのひとまとめのname属性の値を変えておく
    $(":radio").filter(".validate").each(function(){
    $(this).filter(".required").each(function(){
        if($(":radio[name="+$(this).attr("name")+"]:checked").size() == 0){
            $(this).parent().prepend("<p class='error'>・選択してください</p>")
        }
    })
    })


    //【まとめてチェック】ラジオボタンノチェック。一つでも選択されてないとエラーがでる
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
            $('html,body').animate({ scrollTop: $(".error:first").offset().top-40 }, 'slow');
            //$("p.error").parent().addClass("error");


            //エラーと同時にinputの背景色を変える方法 ※parents("dd")のセレクターは都度変える
            /*
            $(".error").each(function(){
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



});//$(".form").submit(function(){
});//$(function(){







/*
文字編
・全て半角アルファベットかどうか（大文字でも小文字でもOK）
/^[a-zA-z¥s]+$/

・全て半角アルファベット、または数値かどうか
/^[a-zA-Z0-9]+$/

・全て全角ひらがな、またはカタカナかどうか
/^[ぁ-んァ-ン]+$/

・全て全角ひらがなかどうか
/^[ぁ-ん]+$/

・全て全角カタカナかどうか
/^[ァ-ン]+$/

・全て半角カタカナかどうか
/^[ｧ-ﾝﾞﾟ]+$/


・正しいメールアドレスかどうか
/^([a-zA-Z0-9_¥.¥-])+¥@(([a-zA-Z0-9¥-])+¥.)+([a-zA-Z0-9]{2,4})+$/
/^([a-zA-Z0-9])+([a-zA-Z0-9¥._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9¥._-]+)+$/
/^[A-Za-z0-9]+[¥w-]+@[¥w¥.-]+¥.¥w{2,}$/
/^[¥w_-]+@[¥w¥.-]+¥.¥w{2,}$/

【 解説 】
１番上：@前は「英数字_-.」使用可、@後ひとつ以上の「.」があるか、「.」で終わっていないか
２番目：@前は「英数字_-.」使用可、@後は2文字以上入力されているか否か
３番目：@前は「英数字_-」使用可、@後ひとつ以上の「.」があるか、「.」で終わっていないか
４番目：@前は「英数字_-」使用可、@後ひとつ以上の「.」があるか、「.」の後に2文字以上英数字が入っているか否か

・正しい郵便番号かどうか
/^¥d{3}-¥d{4}$|^¥d{3}-¥d{2}$|^¥d{3}$/
/^¥d{3}¥-¥d{4}$/

【 解説 】
１番上：対応形式「XXX-XXXX、XXX-XX、XXX」
２番目：対応形式「XXX-XXXX」

・正しい携帯番号かどうか
/^¥d{3}-¥d{4}-¥d{4}$|^¥d{11}$/
/^0¥d0-¥d{4}-¥d{4}$/

【 解説 】
１番上：対応形式「XXX-XXXX-XXXX、XXXXXXXXXXX（11桁）」
２番目：対応形式「0X0-XXXX-XXXX」

・正しい電話番号かどうか
/^[0-9-]{6,9}$|^[0-9-]{12}$/
/^¥d{1,4}-¥d{4}$|^¥d{2,5}-¥d{1,4}-¥d{4}$/

【 解説 】
１番上：対応形式「-」なしの6～9桁、「-」ありの時は12桁以下であるか否か
２番目：対応形式「(1～4桁)-XXXX、(2～5桁)-(1～4桁)-XXXX」
（市外局番からと市外局番からでは「-」の位置が違うのでチェックは難しい）


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


