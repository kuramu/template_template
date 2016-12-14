<?php if (wp_is_mobile()) :?>


    <div class="box-kakoiblue-01 mt8">
        <div class="box-kakoiblue-02">
            <div class="box-kakoiblue-03">
            <div class="box-kakoiblue-04">
                <h1 class="pt10 pb10 bold">お一人で悩まず、手遅れになる前に<br />まずはご相談ください！</h1>
            </div>
            </div>
        </div>
    </div>

        <ul class="list-headermessage-01 cf">
        <li class="bold">秘密厳守</li>
        <li class="bold">無料相談</li>
        <li class="bold">全国対応</li>
    </ul>


    <section class="lyt-topcontent-09">
        <h1 class="hstyle-h-01">お電話でのお問い合わせ</h1>
     <div class="box-contact-tel-01">
    <div class="box-contact-tel-01-inner"><img src="<?php echo TEMP_IMAGE; ?>/common/index_15.gif" width="42" alt="フリーダイヤルのマーク"><span>0120-201-819</span>
       </div>
        <p class="doc-contact-tel">受付時間　8:00~22:00(年中無休)</p>
       </div>
    </section>


    <section class="lyt-topcontent-09">
        <h1 class="hstyle-h-01">メールでのお問い合わせ</h1>
         <div class="cf lyt-contactmail-01 mt15">
        <p class="floatleft contactmail-on"><span>ご入力</span></p>
        <p class="contactmail-center"><span>ご確認</span></p>
        <p class="floatright mr20"><span>完了</span></p>
    </div>
    <p class="lyt-w-02 mt10 mb15">下記のフォームにご入力の上「登録内容を確認」ボタンを押してください。<span class="doc-contact-red">*</span>のついている項目は必須となります。</p>


    </section>

	 <?php echo createFromInsert(); ?>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">お問い合わせ種別</h1>
			<p class="lyt-w-02 mt15 mb15">

				<select class="w225 validate" name="genre">
					<option value="とにかく相談したい">とにかく相談したい</option>
					<option value="売却したい">売却したい</option>
					<option value="家を残したい">家を残したい</option>
					<option value="一番よい解決策を知りたい">一番よい解決策を知りたい</option>
				</select>

			</p>

		</section>

			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">お名前(全角)<span>*</span></h1>
					<p class="lyt-w-02 mt15 mb15">
						<input type="text" placeholder="例）山田太郎" class="validate hankakukata-ng required" name="user_name">
					</p>
			</section>


			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">ふりがな(全角かな)</h1>
					<p class="lyt-w-02 mt15 mb15">
						<input type="text" placeholder="例）やまだたろう" class="validate w100pa required" name="hurigana">
					</p>
			</section>

			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">ご住所</h1>
					<div class="lyt-w-02 mt15 mb15">
					<span class="font17">郵便番号</span><span class="font14 pl5">※半角数字・ハイフンなし</span>

						<p><input type="text" placeholder="例）1540154" class="yuubin w100pa pt0 mt0" name="post"></p>

						<p class="doc-linktext-02 haneisuji-ok mb12"><a onclick="AjaxZip3.zip2addr('post','','area','area');">郵便番号から住所を検索</a></p>

					   <span class="font17 pt5">都道府県・市区町村</span>
						<p><input type="text" placeholder="例）東京都世田谷区太子堂1丁目" class="w100pa pt0 mt0" name="area"></p>

										<span class="font17">番地・マンション名</span>
						<p><input type="text" placeholder="例）4-33 アークビル7階" class="w100pa pt0 mt0" name="address"></p>

					</div>
			</section>

			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">売却物件所在地</h1>
					  <table class="doc-linktext-01 mt15 mb15" style="text-align:left">
						<tr><td>
						<label><input class="salelocation-hide1" name="sale_property_location" type="radio" value="上記の住所と同じ" checked>上記の住所と同じ</label>
						</td>
						<td>
						<label><input type="radio" name="sale_property_location" value="その他の住所" class="salelocation-hide2">その他の住所</label>
						</td>
						</tr>
						</table>

	<div class="lyt-w-02 mt15 mb15 salelocation-hide" style="display:none">
					<span class="font17">郵便番号</span><span class="font14 pl5">※半角数字・ハイフンなし</span>

						<p><input type="text" placeholder="例）1540154" class="yuubin w100pa pt0 mt0 salelocation-hide3" name="sale_property_post"></p>

						<p class="doc-linktext-02 haneisuji-ok mb12"><a onclick="AjaxZip3.zip2addr('sale_property_post','','sale_property_area','sale_property_area');">郵便番号から住所を検索</a></p>

					   <span class="font17 pt5">都道府県・市区町村</span>
						<p><input type="text" placeholder="例）東京都世田谷区太子堂1丁目" class="salelocation-hide3 w100pa pt0 mt0" name="sale_property_area"></p>

										<span class="font17">番地・マンション名</span>
						<p><input type="text" placeholder="例）4-33 アークビル7階" class="w100pa pt0 mt0 salelocation-hide3" name="sale_property_address"></p>

					</div>

			</section>

			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">売却物件の種類</h1>
					 <table class="doc-linktext-01 mt15 mb15" style="text-align:left">
						   <tr>
							   <td><label><input class="" type="radio" name="sale_property" value="戸建て" checked>戸建て</label></td>
							   <td> <label><input type="radio" name="sale_property" value="マンション">マンション</label></td>
						   </tr>
						   <tr>
							   <td><label><input type="radio" name="sale_property" value="店舗件住宅">店舗件住宅</label></td>
							   <td><label><input type="radio" name="sale_property" value="その他">その他</label></td>
						   </tr>

					   </table>

			</section>


			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">電話番号</h1>
					<p class="lyt-w-02 mt15 mb15">

						<input type="text" placeholder="例）0120201819" class="mt0 w100pa" name="tel">
					</p>
			</section>


			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">メールアドレス<span>*</span></h1>
					<p class="lyt-w-02 mt15 mb15">
						<input type="text" placeholder="例）test@example.com" class="mail w100pa required mail-c validate" name="email">
					</p>
			</section>



			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">メールアドレス（確認）<span>*</span></h1>
					<p class="lyt-w-02 mt15 mb15">
						<input type="text" placeholder="例）test@example.com" class="mail w100pa required validate required mail_check" name="email">
					</p>
			</section>



			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">ご希望の連絡方法</h1>
					  <table class="doc-linktext-01 mt15 mb15" style="text-align:left">
						<tr>
						<td width="50%">
						<label><input class="" name="contact" type="radio" value="どちらでも良い"  checked>どちらでも良い</label>
						</td>
						<td width="25%">
						<label><input type="radio" name="contact" value="電話">電話</label>
						</td>
						<td width="25%">
						<label><input type="radio" name="contact" value="メール">メール</label>
						</td>
						</tr>
						</table>
			</section>

			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">ご相談内容、現在のご状況</h1>
					<div class="lyt-w-02 mt15 mb15">
					  <textarea rows="5" class="" name="body" placeholder=""></textarea>

						<div class="form-privacybox-01">
							<h2>プライバシーポリシー</h2>
							<div>	サイトの運営に際し、お客様のプライバシーを尊重し個人情報に対して十分な配慮を行うとともに、大切に保護し、 適正な管理を行うことに努めております。<br>

							【個人情報の利用目的】<br>
							a) お客様のご要望に合わせたサービスをご提供するための各種ご連絡。<br>
							b) お問い合わせいただいたご質問への回答のご連絡。<br>
							<br>
							取得した個人情報は、ご本人の同意なしに目的以外では利用しません。<br>
							情報が漏洩しないよう対策を講じ、従業員だけでなく委託業者も監督します。<br>
							ご本人の同意を得ずに第三者に情報を提供しません。<br>
							公開された個人情報が事実と異なる場合、訂正や削除に応じます。<br>
							</div>
						</div>

					  <div><input class="validate required" id="doi" type="checkbox" name="" value="プライバシーポリシー">プライバシーポリシーに同意する。</div>

					  <p class="doc-contact-sent">※ご同意いただけない場合は送信できません</p>

					  <button class="btn-contact-sent" type="submit">入力内容を確認する</button>

					</div>

			</section>

	<?php echo endFormInsert(); ?>





<?php else : ?>
	
	<section>
		<div class="lyt-onecolumn1024-01">
			<section class="lyt-formtop-01">
				<h1 class="font23">お一人で悩まず、手遅れになる前に まずはご相談ください！<span><img src="<?php echo TEMP_IMAGE; ?>/contact_03.jpg" alt=""></span></h1>
				<p>ニンセンは、お客様に安心の 住宅ローン問題 解決サービスを提供いたします。<br>まずは是非、お気軽にご相談ください。</p>
				<ul class="cf">
					<li>無料相談</li>
					<li>秘密厳守</li>
					<li>全国対応</li>
				</ul>

			</section>

			<section class="lyt-formtop-02">
				<h1 class="hstyle-blue-07">お電話でのお問い合わせ</h1>
				<p><img src="<?php echo TEMP_IMAGE; ?>/contact_11.gif" alt="お電話の受付0120-201-819"></p>
			</section>

			<section class="lyt-formtop-03">
				<h1 class="hstyle-blue-07">メールでのお問い合わせ</h1>
				<div class="lyt-formtop-03-inner">
					<p class="doc-formtoptext-01">お問い合わせフォームをご利用の際は、必ずプライバシーポリシーをご一読ください。<br>内容にご同意のうえ、下記フォームに必要事項をご記入いただき、「入力内容を確認」ボタンを<br />クリックしてください。なお、お問い合わせの内容によっては、ご返答が遅れる場合がございます。ご了承ください。</p>
					<p class="align-center pb25"><img src="<?php echo TEMP_IMAGE; ?>/contact_15.gif" alt="ご入力のページ"></p>

					<div class="lyt-formtop-04-inner">
						<?php echo createFromInsert(); ?>
							<dl class="cf">
								<dt>お問い合わせ種別</dt>
								<dd>
									<select class="w225 validate" name="genre">
										<option value="とにかく相談したい">とにかく相談したい</option>
										<option value="売却したい">売却したい</option>
										<option value="家を残したい">家を残したい</option>
										<option value="一番よい解決策を知りたい">一番よい解決策を知りたい</option>
									</select>
								</dd>
							</dl>
							<dl class="cf">
								<dt>お名前（全角）<span>必須</span></dt>
								<dd><input class="validate input1 input3 required hankakukata-ng zenkakuei-ng zenkakukana-ng" type="text" name="user_name" value="" placeholder="例）山田太郎"></dd>
							</dl>
							<dl class="cf">
								<dt>ふりがな（全角）<span>必須</span></dt>
								<dd><input class="validate input2 input3 required zenkakuhira-ok" type="text" name="hurigana" value="" placeholder="例）やまだたろう"></dd>
							</dl>
							<dl class="cf">
								<dt>ご住所</dt>
								<dd>
									<div class="lyt-ad-10">
										<span>郵便番号</span><p class="lyt-ad-11"><input type="text" class="validate" name="post"><br><span>※半角数字・ハイフンなし</span></p>
										<p class="lyt-ad-12 ml15"><span onclick="AjaxZip3.zip2addr('post','','area','area');">郵便番号から住所を入力</span></p>

									</div>
									<div class="lyt-ad-20">
										都道府県・市区町村<input type="text" name="area" class="w334 ml25 mt5 mb5 validate" value="" placeholder="例）東京都 世田谷区太子堂1丁目">
									</div>

									<div class="lyt-ad-30">
										番地・マンション名<input type="text" name="address" class="w334 ml25 validate" value="" placeholder="例）4番33号アークビル7">
									</div>
								</dd>
							</dl>
							<dl class="cf pb10">
								<dt>売却物件所在地</dt>
								<dd>
									<ul>
										<li><input class="salelocation-hide1" type="radio" name="sale_property_location" value="上記の住所と同じ" checked><span>上記の住所と同じ</span></li>
										<li><input class="salelocation-hide2" type="radio" name="sale_property_location" value="その他の住所"><span>その他の住所</span></li>
									</ul>
									<div class="salelocation-hide">
										<div class="lyt-ad-10">
											<span>郵便番号</span><p class="lyt-ad-11"><input class="w184 salelocation-hide3" type="text" value="" name="sale_property_post"><br><span>※半角数字・ハイフンなし</span></p>
											<p class="lyt-ad-12 ml15"><span onclick="AjaxZip3.zip2addr('sale_property_post','','sale_property_area','sale_property_area');">郵便番号から住所を入力</span></p>

										</div>
										<div class="lyt-ad-20">
											都道府県・市区町村<input value="" type="text" name="sale_property_area" value="" class="salelocation-hide3 validate mb5 mt5 w334 ml25" placeholder="例）東京都 世田谷区太子堂1丁目">
										</div>

										<div class="lyt-ad-30">
											番地・マンション名<input value="" type="text" name="sale_property_address" class="salelocation-hide3 validate w334 ml25" value="" placeholder="例）4番33号アークビル7">
										</div>
									</div>
								</dd>
							</dl>
							<dl class="cf">
								<dt>売却物件の種類</dt>
								<dd>
									<ul>
										<li><input class="" type="radio" name="sale_property" value="戸建"  checked><span>戸建</span></li>
										<li><input type="radio" name="sale_property" value="マンション"><span>マンション</span></li>
										<li><input type="radio" name="sale_property" value="店舗兼住宅"><span>店舗兼住宅</span></li>
										<li><input type="radio" name="sale_property" value="その他"><span>その他</span></li>
									</ul>
								</dd>
							</dl>
							<dl class="cf">
								<dt>電話番号（※半角数字・ハイフンなし）</dt>
								<dd><input class="validate tel-ba" type="text" name="tel" value="" placeholder="例）0120706317"></dd>
							</dl>
							<dl class="cf pb15">
								<dt>メールアドレス<span>必須</span><br>（半角英数）</dt>
								<dd><input class="validate required mail" type="text" name="email" value="" placeholder="例）test@example.com"></dd>
							</dl>
							<dl class="cf">
								<dt>メールアドレス（確認）<span>必須</span></dt>
								<dd><input class="validate required mail_check" type="text" name="email_confirm" value=""  placeholder="例）test@example.com"></dd>
							</dl>
							<dl class="cf pb5">
								<dt>ご相談内容、現在のご状況</dt>
								<dd><textarea class="validate hankakukata-ng" name="body"></textarea></dd>
							</dl>
							<dl class="cf">
								<dt>ご希望の連絡方法</dt>
								<dd>
									<ul class="pt20">
										<li><input type="radio" name="contact" value="どちらでも良い" checked><span>どちらでも良い</span></li>
										<li><input type="radio" name="contact" value="電話"><span>電話</span></li>
										<li><input type="radio" name="contact" value="メール"><span>メール</span></li>
									</ul>
								</dd>
							</dl>
							<div class="form-privacybox-01">
								<h2>プライバシーポリシー</h2>
								<div>	サイトの運営に際し、お客様のプライバシーを尊重し個人情報に対して十分な配慮を行うとともに、大切に保護し、 適正な管理を行うことに努めております。<br>

【個人情報の利用目的】<br>
a) お客様のご要望に合わせたサービスをご提供するための各種ご連絡。<br>
b) お問い合わせいただいたご質問への回答のご連絡。<br>
<br>
    取得した個人情報は、ご本人の同意なしに目的以外では利用しません。<br>
    情報が漏洩しないよう対策を講じ、従業員だけでなく委託業者も監督します。<br>
    ご本人の同意を得ずに第三者に情報を提供しません。<br>
    公開された個人情報が事実と異なる場合、訂正や削除に応じます。<br>
</div>
							</div>

							<dl class="cf privacy">
								<dt class="pt0">プライバシーポリシー</dt>
								<dd class="checkboxRequired"><input type="checkbox" name="privacy"><p>プライバシーポリシーに同意する<span>※ご同意いただけない場合は送信ができません。</span></p></dd>
							</dl>

							<p class="form-submitbutton-01 lyt-button-01"><button type="submit">入力内容を確認</button></p>
						<?php echo endFormInsert(); ?>
					</div>
				</div>
			</section>
		</div>
	</section>
<?php endif; ?>