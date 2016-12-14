



<?php echo createFormConfirm(); ?>


<main role="main">
    <div class="lyt-seminar">
        <div class="lyt-seminar-more">

            <section class="hstyle-seminar-02"><!-- フォーム -->
                <h1>セミナー申し込み確認</h1>
            </section>
            <div class="lyt-seminar-appli-flow">
                <img src="<?php echo get_template_directory_uri(); ?>/images/seminar/seminar019.png" alt="受講者情報登録">
            </div>
            <section class="lyt-seminar-appli-01">
                <h1>セミナー情報</h1>
                <div class="lyt-seminar-appli-01-inner-01">
                    <dl>
                      <dt>セミナー名</dt>
                      <dd>明日から使いたくなる商品を変えずに売上をあげる方法</dd>
                    </dl>
                    <dl>
                      <dt>開　催　日</dt>
                        <dd><?php echo esc_html($data['requestData']['kaisaibi']); ?>
                        </dd>                      
                    </dl>
                    <dl>
                      <dt>開 催 時 間</dt>
                        <dd><?php echo esc_html($data['requestData']['jikan']); ?>
                        </dd> 
                    </dl>
                    <dl>
                      <dt>開 催 場 所</dt>
                      <dd>アサヒ・ドリーム・クリエイト 東京オフィス 台東区鳥越2-7-3 小西屋ビル3階</dd>
                    </dl>
                    <dl>
                      <dt>参　加　費</dt>
                      <dd>￥1,000（税込）</dd>
                    </dl>
                    <dl>
                      <dt>登 録 人 数</dt>
                      <dd><?php echo esc_html($data['requestData']['ninzuu']); ?>
                        <span>人</span>
                      </dd>
                    </dl>
                </div>
            </section>
            <section class="lyt-seminar-appli-01">
                <h1>受講者情報登録</h1>
                <h2>会社情報</h2>

                <div class="lyt-seminar-appli-01-inner-01">
                    <dl>
                        <dt>会社名<span>必須</span></dt>
                        <dd><?php echo esc_html($data['requestData']['company']); ?></dd>
                    </dl>
                    <dl>
                        <dt>住所(都道府県)<span>必須</span></dt>
                        <dd><?php echo esc_html($data['requestData']['jusho']); ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt>業種</dt>
                        <dd><?php echo esc_html($data['requestData']['gyoushu']); ?>
                        </dd>
                    </dl>                                         
                    <dl>
                        <dt>お電話番号（全角・半角問わず）<span>必須</span></dt>
                        <dd><?php echo esc_html($data['requestData']['denwa']); ?></dd>
                    </dl>
                </div>
                <h2>参加される代表者様情報</h2>
                <div class="lyt-seminar-appli-01-inner-01">
                    <dl>
                        <dt>お名前<span>必須</span></dt>
                        <dd><?php echo esc_html($data['requestData']['namae']); ?></dd>
                    </dl>
                    <dl>
                        <dt>おなまえ(全角かな)<span>必須</span></dt>
                        <dd><?php echo esc_html($data['requestData']['namaekana']); ?></dd>
                    </dl>
                    <dl>
                        <dt>メールアドレス<span>必須</span></dt>
                        <dd><?php echo esc_html($data['requestData']['mailaddress']); ?></dd>
                    </dl>
                    <dl>
                        <dt>他の参加者様のお名前</dt>
                        <dd><?php echo esc_html($data['requestData']['tanosanka']); ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt>一言欄</dt>
                        <dd><?php echo esc_html($data['requestData']['hitokoto']); ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt>弊社発行「日々の販促に役立つ！」メールマガジンの登録</dt>
                        <dd><?php echo esc_html($data['requestData']['mailmagazine']); ?></dd>
                    </dl>                                                          
                </div>
                <h2>お支払い方法・領収書について</h2>
                <div class="lyt-seminar-appli-01-inner-01">
                    <dl>
                        <dt>お支払い方法の選択<span>必須</span></dt>
                        <dd><?php echo esc_html($data['requestData']['shiharai']); ?></dd>
                    </dl>
                    <dl>
                        <dt>領収書の発行について<span>必須</span></dt>
                        <dd><?php echo esc_html($data['requestData']['ryoushuusho']); ?></dd>
                    </dl>
                </div>
                <div class="lyt-seminar-appli-01">    
                    <ul class="lyt-seminar-appli-btn">
                        <li class="lyt-seminar-appli-btn-01"><a href="javascript:history.back();">戻る</a></li>
                        <li class="lyt-seminar-appli-btn-02"><button class="submit">送信する</button></li>
                    </ul>
                </div>



            </section>
        </div>
    </div>
</main><!-- main contents end -->


        <!-- これで一気にPOSTデータをhidden化 -->
        <?php echo hiddenVars(); ?>
        <!-- これで一気にPOSTデータをhidden化　ここまで -->


        <!-- フォーム終了 -->
        <?php echo endFormConfirm(); ?>
        <!-- フォーム終了 ここまで -->