
                        <h3 class="pt60 mt75 pb25"><img src="<?php echo get_template_directory_uri(); ?>/images/contact/contact_03.png" alt="買取のご依頼や古本買取に関するご相談はこちらからどうぞ。お電話で楽々ご依頼・ご相談 0120-548-301"></h3>




                        <div id="thought-footer-img" class="thought-footer-img">
                        <p><img src="<?php echo get_template_directory_uri(); ?>/images/contact/contact_06.png" alt="買取のご依頼の場合は本の量の目安を教えて頂けると幸いです。"></p>
                        </div>


                    </div>
                    </div>


                    <div class="content-r">
                    <div class="content-r-in">


                        <section class="contact-box">
                            <h2 class="content-r-title mb20 mt60">メール送信内容確認</h2>


                                <dl>
                                    <dt>お問い合わせ種別<span>*</span></dt>
                                    <dd>
                                        <?php echo $data['requestData']['classification']; ?>
                                    </dd>
                                </dl>

                                <dl>
                                    <dt>お名前<span>*</span></dt>
                                    <dd>
                                        <?php echo $data['requestData']['aname']; ?>
                                    </dd>
                                </dl>

                                <dl>
                                    <dt>フリガナ（全角カナ）</dt>
                                    <dd>
                                        <?php echo $data['requestData']['phonetic']; ?>

                                    </dd>
                                </dl>
                                <dl>
                                    <dt>メールアドレス<span>*</span></dt>
                                    <dd>
                                        <?php echo $data['requestData']['mailaddress']; ?>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>電話番号<span>*</span></dt>
                                    <dd>
                                        <?php echo $data['requestData']['telnumber']; ?>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>郵便番号</dt>
                                    <dd>
                                        <?php echo $data['requestData']['postalcode']; ?>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>住所</dt>
                                    <dd>
                                        <div>
                                            <?php echo $data['requestData']['oneaddress1']; ?>
                                        </div>
                                        <p class="mt10 mb10"><?php echo $data['requestData']['oneaddress2']; ?></p>
                                        <p><?php echo $data['requestData']['oneaddress3']; ?></p>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>本の写真</dt>
                                    <dd>
                                        <?php echo is_image($data['requestData']['file1']); ?><br>
                                        <?php echo is_image($data['requestData']['file2']); ?><br>
                                        <?php echo is_image($data['requestData']['file3']); ?>
                                    </dd>
                                </dl>

                                <dl>
                                    <dt>内容</dt>
                                    <dd><?php echo $data['requestData']['contenttext']; ?></dd>
                                </dl>









<!-- フォーム開始 -->
<?php echo createFormConfirm(); ?>
<!-- フォーム開始 ここまで -->


<!-- これで一気にPOSTデータをhidden化 -->
<?php echo hiddenVars(); ?>
<!-- これで一気にPOSTデータをhidden化　ここまで -->



<ul class="kakunin-lr mb70">
    <li class="btnreg kakunin-lr1"><button class="b-normal contact-button" type="button" onclick="history.back();">戻る</button></li>
    <li class="btnreg kakunin-lr2"><input class=" b-normal contact-button" onclick="_gaq.push(['_trackEvent', 'pc', 'click', 'main', 0, true]);" type="submit" value="送信"></li>
</ul>


                        </section>

                    </div>
                    </div>


                </main>
            </div><!-- content-wap -->
<!-- 確認画面用 ここまで -->


<!-- フォーム終了 -->
<?php echo endFormConfirm(); ?>
<!-- フォーム終了 ここまで -->

