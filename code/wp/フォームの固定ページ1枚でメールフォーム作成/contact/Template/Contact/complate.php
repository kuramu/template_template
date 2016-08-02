<?php if (wp_is_mobile()) :?>



    <section class="lyt-topcontent-09">
        <h1 class="hstyle-h-01">メールでのお問い合わせ</h1>
         <div class="cf lyt-contactmail-01 mt15">
        <p class="floatleft"><span>ご入力</span></p>
        <p class="contactmail-center"><span>ご確認</span></p>
        <p class="floatright contactmail-on mr20"><span>完了</span></p>
    </div>

    <div class="lyt-w-02 mt15 mb15">
        <h2 class="bold font18 doc-contact-blue">送信が完了いたしました<br />
お問い合わせいただきありがとうございます</h2>
        <div class="mt10">ご入力いただいたメールアドレスに、確認用の自動返信メールを送信いたしました。
担当の者より、数日中に折り返しご連絡をいたします。
折り返しのご連絡がない場合、メールが正しく送信されなかった可能性がございます。
その際はお手数ですが、<span class="doc-contact-underline">0120-201-819</span>までご連絡ください。</div>
    </div>
    </section>
<?php else: ?>
  

	<div class="lyt-onecolumn1024-01">
        <section class="lyt-formtop-03 mt48">
            <h1 class="hstyle-blue-07">メールでのお問い合わせ</h1>
            <div class="lyt-formtop-03-inner">
                <p class="align-center pb25"><img src="<?php echo TEMP_IMAGE; ?>/contact_03_03.gif" alt="お問い合わせ完了のページ"></p>
                <div class="lyt-formtop-04-inner lyt-formtop-05-inner">
                    <section>
                        <h1 class="pt16 pb25 bold font24 line14">送信が完了いたしました<br>お問い合わせいただきありがとうございます</h1>
                        <p class="font14 line19 pb45">ご入力いただいたメールアドレスに、確認用の自動返信メールを送信いたしました。<br>
担当の者より、数日中に折り返しご連絡をいたします。<br>
折り返しのご連絡がない場合、メールが正しく送信されなかった可能性がございます。<br>
その際はお手数ですが、0120-201-819までご連絡ください。
</p>

                    </section>
                </div>
            </div>
        </section>
    </div>

<?php endif; ?>

