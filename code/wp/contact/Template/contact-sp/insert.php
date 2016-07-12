<?php echo createFromInsert(array('file')); ?>



            <section class="center">
                <h1 class="contentsH1 mincho">買取のご依頼</h1>

<p class="mb12">古本・古書などの買取のご相談は、こちらの電話番号かメールフォームよりお問い合わせ下さい。店頭買取、出張買取、宅配買取などのご相談をお待ちしております。</p>

<p class="spre bold mb16">予約は、電話予約が優先となりますのでご了承下さい。</p>


            </section>

            <section class="center">
                <h2 class="spicon submenuH2"><span class="bold">お急ぎの場合はお電話で！</span></h2>

                <div class="con-box3 align-center">
                    <h3 class="mb10"><a href="tel:0120-858-228" onclick="_gaq.push(['_trackEvent', 'smartphone', 'phone-number-tap', 'main', 0, true]);"><img width="253" src="<?php echo get_template_directory_uri(); ?>/sp/image/7-1_07.gif" alt="フリーダイヤル0120-858-228"></a></h3>
                    <p class="mb12">営業時間  10:00～19:00（不定休）</p>
                    <p>お急ぎの方はこちら</p>
                    <p class="chokuchu font16 bold">店主直通：<a href="tel:080-3466-3640" onclick="_gaq.push(['_trackEvent', 'smartphone', 'phone-number-tap', 'main', 0, true]);">080-3466-3640</a></p>
                </div>

            </section>

            <section class="center">
                <h2 class="mailicon submenuH2"><span class="bold">メールでのお問い合わせ</span></h2>
                <p class="mb12 align-center"><img src="<?php echo get_template_directory_uri(); ?>/sp/image/7-1_14.gif" alt=""></p>
                <p class="mb16">メールでのお問い合わせの返信は、1週間～10日ほど頂く場合がございます。<br>ご了承ください。</p>
                <p class="spre bold mb16">※は必須項目です。</p>

            </section>


            <section class="contact-box-input center">
                     <dl>
                            <dt>お問い合わせ種別<span>※</span></dt>
                               <select name="kind">
                                    <option value="" selected>選択してください
                                    <option value="古本に関するご相談">古本に関するご相談
                                    <option value="買取に関するご相談">買取に関するご相談
                                    <option value="当店に対するご意見">当店に対するご意見
                                    <option value="その他">その他
                             　　</select>
                    </dl>

                    <dl class="form-parts">
                        <dt>お名前（全角）<span class="spre bold font10">※</span></dt>
                        <dd><input class="validate hankakukata-ng required" type="text" name="namee" placeholder="例)山田太郎"></dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>フリガナ（全角カナ）<span class="spre bold font10">※</span></dt>
                        <dd><input class="validate zenkakukana-ok required" type="text" name="hurigana" placeholder="例)ヤマダタロウ"></dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>メールアドレス（半角英数字）<span class="spre bold font10">※</span></dt>
                        <dd><input name="email" class="w250p validate mail required" type="text" placeholder="例)yamada@kitamurashoten.jp"></dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>電話番号<span class="spre bold font10">※</span></dt>
                        <dd><input name="tel" class="validate tel-ba required" type="text" placeholder="例)00-00000-0000"></dd>
                    </dl>

                    <dl><dt>ご住所(全角)<span>※</span></dt>
                        <select name="prefectures">
                            <option value="" selected>都道府県
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
                    </dl>
                    <dl>
                        <dt>市町村<span>※</span></dt>
                        <dd><input name="municipality" class="" type="text" placeholder="例)渋谷区"></dd>
                    </dl>
                     <dl>
                        <dt>番地・マンション<span>※</span></dt>
                        <dd><input name="address" class="" type="text" placeholder="例)東2-26-16　渋谷HANAビル5F"></dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>買取希望のおおよその冊数</dt>
                        <dd>

                            <p><img id="selectimg" class="w100pp" src="<?php echo get_template_directory_uri(); ?>/images/img1select.jpg" alt="本棚の写真"></p>
                            <p class="font10 mt15 mb15">（参考）1000冊はドアと同じくらいの大きさの本棚１本分くらいあります</p>
                            <p>
                                <select class="w70" id="setubo" name="satu">
                                    <option value="1000">1000冊</option>
                                    <option value="2000">2000冊</option>
                                    <option value="3000">3000冊</option>
                                </select>　×　数量<input class="w70 validate w120p ml20" type="text" name="satusuu" placeholder="例）2">
                            </p>

                        </dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>本の写真を添付する</dt>
                        <dd>
                            <p class="mb5"><input type="file" name="file1"></p>
                            <p class="mb5"><input type="file" name="file2"></p>
                            <p><input type="file" name="file3"></p>
                        </dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>買取の詳細<span class="spre bold font10">※</span></dt>
                        <dd><textarea class="validate hankakukata-ng required" name="body"></textarea></dd>
                    </dl>


                    <p id="praiba"><input class="validate required" id="doi" type="checkbox">※<a href="<?php echo home_url() ; ?>/privacy-policy.html">プライバシーポリシー</a>に同意する</p>

                    <p class="nyu-bottan mb15 mt15"><button type="submit" class="w100p">入力内容を確認</button></p>

            </section>

<?php echo endFormInsert(); ?>