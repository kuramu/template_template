<?php echo createFromInsert(array('file')); ?>

                        <h3 class="pt60 mt75 pb25"><img src="<?php echo get_template_directory_uri(); ?>/images/contact/contact_03.png" alt="買取のご依頼や古本買取に関するご相談はこちらからどうぞ。お電話で楽々ご依頼・ご相談 0120-548-301"></h3>




                        <div id="thought-footer-img" class="thought-footer-img">
                        <p><img src="<?php echo get_template_directory_uri(); ?>/images/contact/contact_06.png" alt="買取のご依頼の場合は本の量の目安を教えて頂けると幸いです。"></p>
                        </div>


                    </div>
                    </div>


                    <div class="content-r">
                    <div class="content-r-in">


                        <section class="contact-box">
                            <h2 class="content-r-title mb20 mt60">メールでのお問い合わせ</h2>

                                <dl>
                                    <dt>お問い合わせ種別<span>*</span></dt>
                                    <dd>
                                        <select name="classification" class="sec-c w200p">
                                            <option value="">選択してください</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </dd>
                                </dl>

                                <dl>
                                    <dt>お名前<span>*</span></dt>
                                    <dd>
                                        <input class="w200p required validate hankakukata-ng" name="aname" type="text" placeholder="例）山田太郎(全角)">
                                    </dd>
                                </dl>

                                <dl>
                                    <dt>フリガナ（全角カナ）</dt>
                                    <dd>
                                        <input name="phonetic" class="w200p zenkakuei-ng zenkakukana-ok validate hankakukata-ng" type="text" placeholder="例）ヤマダタロウ(全角カナ)">

                                    </dd>
                                </dl>
                                <dl>
                                    <dt>メールアドレス<span>*</span></dt>
                                    <dd>
                                        <input class="w250p required validate mail mail-c" type="text" name="mailaddress" placeholder="例）sample@example.com(半角英数)">
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>電話番号<span>*</span></dt>
                                    <dd>
                                         <input type="text" class="w200p tel-ba required validate hankakukata-ng" name="telnumber" placeholder="00-0000-0000(半角数字)">
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>郵便番号</dt>
                                    <dd><input class="w200p validate yuubin" type="text" name="postalcode" placeholder="00-0000(半角数字)"></dd>
                                </dl>
                                <dl>
                                    <dt>住所</dt>
                                    <dd>
                                        <div>
                                        <select class="w200p" name="oneaddress1">
                                            <option value="">都道府県</option>
                                            <option value="北海道">北海道
                                            <option value="青森県">青森県
                                            <option value="岩手県">岩手県
                                            <option value="宮城県">宮城県
                                            <option value="秋田県">秋田県
                                            <option value="山形県">山形県
                                            <option value="福島県">福島県
                                            <option value="茨城県">茨城県
                                            <option value="栃木県">栃木県
                                            <option value="群馬県">群馬県
                                            <option value="埼玉県">埼玉県
                                            <option value="千葉県">千葉県
                                            <option value="東京都">東京都
                                            <option value="神奈川県">神奈川県
                                            <option value="新潟県">新潟県
                                            <option value="富山県">富山県
                                            <option value="石川県">石川県
                                            <option value="福井県">福井県
                                            <option value="山梨県">山梨県
                                            <option value="長野県">長野県
                                            <option value="岐阜県">岐阜県
                                            <option value="静岡県">静岡県
                                            <option value="愛知県">愛知県
                                            <option value="三重県">三重県
                                            <option value="滋賀県">滋賀県
                                            <option value="京都府">京都府
                                            <option value="大阪府">大阪府
                                            <option value="兵庫県">兵庫県
                                            <option value="奈良県">奈良県
                                            <option value="和歌山県">和歌山県
                                            <option value="鳥取県">鳥取県
                                            <option value="島根県">島根県
                                            <option value="岡山県">岡山県
                                            <option value="広島県">広島県
                                            <option value="山口県">山口県
                                            <option value="徳島県">徳島県
                                            <option value="香川県">香川県
                                            <option value="愛媛県">愛媛県
                                            <option value="高知県">高知県
                                            <option value="福岡県">福岡県
                                            <option value="佐賀県">佐賀県
                                            <option value="長崎県">長崎県
                                            <option value="熊本県">熊本県
                                            <option value="大分県">大分県
                                            <option value="宮崎県">宮崎県
                                            <option value="鹿児島県">鹿児島県
                                            <option value="沖縄県">沖縄県
                                        </select>
                                        </div>
                                        <p class="mt10 mb10"><input name="oneaddress2" class="w200p validate hankakukata-ng" type="text" placeholder="例）大阪府大阪市北区芝田"></p>
                                        <p><input name="oneaddress3" class="w200p validate hankakukata-ng" type="text" placeholder="例）1-6-2"></p>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>本の写真</dt>
                                    <dd>
                                        <p class="mb5"><input type="file" name="file1"></p>
                                        <p class="mb5"><input type="file" name="file2"></p>
                                        <p><input type="file" name="file3"></p>
                                    </dd>
                                </dl>

                                <dl>
                                    <dt>内容</dt>
                                    <dd><textarea class="h140p validate hankakukata-ng" name="contenttext"></textarea></dd>
                                </dl>


                                <button class="mb70 b-normal contact-button" type="submit">確認画面へ</button>

                        </section>

                    </div>
                    </div>


                </main>
            </div><!-- content-wap -->






<?php echo endFormInsert(); ?>