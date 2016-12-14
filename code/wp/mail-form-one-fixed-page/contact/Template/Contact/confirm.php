
<?php if (wp_is_mobile()) :?>




    <section class="lyt-topcontent-09">
        <h1 class="hstyle-h-01">メールでのお問い合わせ</h1>
         <div class="cf lyt-contactmail-01 mt15">
        <p class="floatleft"><span>ご入力</span></p>
        <p class="contactmail-center contactmail-on mr20"><span>ご確認</span></p>
        <p class="floatright mr20"><span>完了</span></p>
    </div>
    <p class="lyt-w-02 mt10 mb15">下記のフォームにご入力の上「登録内容を確認」ボタンを押してください。<span class="doc-contact-red">*</span>のついている項目は必須となります。</p>


    </section>

<?php echo createFormConfirm(); ?>

    <section class="lyt-topcontent-09">
        <h1 class="hstyle-h-03">お問い合わせ種別</h1>
        <p class="lyt-w-02 mt15 mb15">
        <?php echo esc_html($data['requestData']['genre']); ?>
        </p>

    </section>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">お名前(全角)<span>*</span></h1>
				<p class="lyt-w-02 mt15 mb15">
				  <?php echo esc_html($data['requestData']['user_name']); ?>
				</p>
		</section>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">ふりがな(全角)</h1>
				<p class="lyt-w-02 mt15 mb15">
				   <?php echo $data['requestData']['hurigana'] ? esc_html($data['requestData']['hurigana']) : '未入力'; ?>
				</p>
		</section>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">郵便番号</h1>
				<p class="lyt-w-02 mt15 mb15">
				   <?php echo $data['requestData']['post'] ? esc_html($data['requestData']['post']) : '未入力'; ?>
				</p>
		</section>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">ご住所</h1>
				<p class="lyt-w-02 mt15 mb15">
				   <?php
						$address = '';
						$address .= $data['requestData']['area'] ? $data['requestData']['area'] : '';
						$address .= $data['requestData']['address'] ? $data['requestData']['address'] : '';
						echo $address ? esc_html($address) : '未入力';
					?>
				</p>
		</section>

	<?php if($data['requestData']['sale_property_location'] === '上記の住所と同じ') : ?>
		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">売却物件所在地</h1>
				<p class="lyt-w-02 mt15 mb15">
				  上記の住所と同じ
				</p>
		</section>
	<?php else : ?>
			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">売却物件所在地の郵便番号</h1>
					<p class="lyt-w-02 mt15 mb15">
					   <?php echo $data['requestData']['sale_property_post'] ? esc_html($data['requestData']['sale_property_post']) : '未入力'; ?>
					</p>
			</section>
			<section class="lyt-topcontent-09">
				<h1 class="hstyle-h-03">売却物件所在地</h1>
					<p class="lyt-w-02 mt15 mb15">
					   <?php
							$address = '';
							$address .= $data['requestData']['sale_property_area'] ? $data['requestData']['sale_property_area'] : '';
							$address .= $data['requestData']['sale_property_address'] ? $data['requestData']['sale_property_address'] : '';
							echo $address ? esc_html($address) : '未入力';
						?>
					</p>
			</section>
	<?php endif; ?>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">売却物件の種類</h1>
				<p class="lyt-w-02 mt15 mb15">
				   <?php echo isset($data['requestData']['sale_property']) ? esc_html($data['requestData']['sale_property']) : '未入力'; ?>
				</p>
		</section>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">メールアドレス（半角英数）<span>*</span></h1>
				<p class="lyt-w-02 mt15 mb15">
				   <?php echo $data['requestData']['email'] ? esc_html($data['requestData']['email']) : '未入力'; ?>
				</p>
		</section>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">電話番号</h1>
				<p class="lyt-w-02 mt15 mb15">
				   <?php echo $data['requestData']['tel'] ? esc_html($data['requestData']['tel']) : '未入力'; ?>
				</p>
		</section>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">ご相談内容、現在のご状況</h1>
				<p class="lyt-w-02 mt15 mb15">
				   <?php echo $data['requestData']['body'] ? esc_html($data['requestData']['body']) : '未入力'; ?>
				</p>
		</section>

		<section class="lyt-topcontent-09">
			<h1 class="hstyle-h-03">ご希望の連絡方法</h1>
				<p class="lyt-w-02 mt15 mb15">
				   <?php echo isset($data['requestData']['contact']) ? esc_html($data['requestData']['contact']) : '未入力'; ?>
				</p>
		</section>

	<button class="btn-contact-sent" type="submit">送信する</button>

	<!-- これで一気にPOSTデータをhidden化 -->
	<?php echo hiddenVars(); ?>
	<!-- これで一気にPOSTデータをhidden化　ここまで -->

	<!-- フォーム終了 -->
	<?php echo endFormConfirm(); ?>
	<!-- フォーム終了 ここまで -->



<?php else: ?>
	

	<div class="lyt-onecolumn1024-01">
        <section class="lyt-formtop-03 mt48">
            <h1 class="hstyle-blue-07">メールでのお問い合わせ</h1>
            <div class="lyt-formtop-03-inner">
                <p class="doc-formtoptext-01">お問い合わせフォームをご利用の際は、必ずプライバシーポリシーをご一読ください。<br>内容にご同意のうえ、下記フォームに必要事項をご記入いただき、「入力内容を確認する」ボタンをクリックしてください。なお、お問い合わせの内容によっては、ご返答が遅れる場合がございます。ご了承ください。</p>
                <p class="align-center pb25"><img src="<?php echo TEMP_IMAGE; ?>/contact_02_03.gif" alt="入力内容確認のページ"></p>
                <div class="lyt-formtop-04-inner lyt-formtop-05-inner">

                    <dl class="cf">
                        <dt>お問い合わせ種別</dt>
                        <dd>
                            <?php echo esc_html($data['requestData']['genre']); ?>
                        </dd>
                    </dl>

						<dl class="cf">
							<dt>お名前（全角）<span>必須</span></dt>
							<dd><?php echo esc_html($data['requestData']['user_name']); ?></dd>
						</dl>

						<dl class="cf">
							<dt>ふりがな（全角）</dt>
							<dd><?php echo $data['requestData']['hurigana'] ? esc_html($data['requestData']['hurigana']) : '未入力'; ?></dd>
						</dl>

						 <dl class="cf">
							<dt>ご住所の郵便番号</dt>
							<dd><?php echo $data['requestData']['post'] ? esc_html($data['requestData']['post']) : '未入力'; ?></dd>
						</dl>

						<dl class="cf">
							<dt>ご住所</dt>
							<dd>
								<?php
									$address = '';
									$address .= $data['requestData']['area'] ? $data['requestData']['area'] : '';
									$address .= $data['requestData']['address'] ? $data['requestData']['address'] : '';
									echo $address ? esc_html($address) : '未入力';
								?>
							</dd>
						</dl>

					<?php if($data['requestData']['sale_property_location'] === '上記の住所と同じ') : ?>
						<dl class="cf pb10">
							<dt>売却物件所在地</dt>
							<dd>上記の住所と同じ</dd>
						</dl>
					<?php else : ?>
							<dl class="cf">
								<dt>売却物件所在地の郵便番号</dt>
								<dd><?php echo $data['requestData']['sale_property_post'] ? esc_html($data['requestData']['sale_property_post']) : '未入力'; ?></dd>
							</dl>
							<dl class="cf pb10">
								<dt>売却物件所在地</dt>
								<dd>
									<?php
										$address = '';
										$address .= $data['requestData']['sale_property_area'] ? $data['requestData']['sale_property_area'] : '';
										$address .= $data['requestData']['sale_property_address'] ? $data['requestData']['sale_property_address'] : '';
										echo $address ? esc_html($address) : '未入力';
									?>
								</dd>
							</dl>
					<?php endif; ?>

						<dl class="cf">
							<dt>売却物件の種類</dt>
							<dd><?php echo isset($data['requestData']['sale_property']) ? esc_html($data['requestData']['sale_property']) : '未入力'; ?></dd>
						</dl>

                    <dl class="cf">
                        <dt>電話番号</dt>
                        <dd><?php echo $data['requestData']['tel'] ? esc_html($data['requestData']['tel']) : '未入力'; ?></dd>
                    </dl>

                    <dl class="cf pb15">
                        <dt>メールアドレス<span>必須</span><br>（半角英数）</dt>
                        <dd><?php echo $data['requestData']['email'] ? esc_html($data['requestData']['email']) : '未入力'; ?></dd>
                    </dl>

                    <dl class="cf pb5">
                        <dt>ご相談内容、現在のご状況</dt>
                        <dd><?php echo $data['requestData']['body'] ? esc_html($data['requestData']['body']) : '未入力'; ?></dd>
                    </dl>

                    <dl class="cf">
                        <dt>ご希望の連絡方法</dt>
                        <dd><?php echo isset($data['requestData']['contact']) ? esc_html($data['requestData']['contact']) : '未入力'; ?></dd>
                    </dl>

					<!-- フォーム開始 -->
					<?php echo createFormConfirm(); ?>
					<!-- フォーム開始 ここまで -->
                    <div class="cf lyt-formbuttons-01 mt20">
						<p class="floatleft form-submitbutton-01 lyt-button-01"><a href="javascript:history.back();">入力画面に戻る</a></p>
						<p class="floatright form-submitbutton-01 lyt-button-01"><button type="submit">送信する</button></p>
                    </div>
                </div>
            </div>
        </section>
    </div>


<!-- これで一気にPOSTデータをhidden化 -->
	<?php echo hiddenVars(); ?>
	<!-- これで一気にPOSTデータをhidden化　ここまで -->

	<!-- フォーム終了 -->
	<?php echo endFormConfirm(); ?>
	<!-- フォーム終了 ここまで -->


<?php endif; ?>

