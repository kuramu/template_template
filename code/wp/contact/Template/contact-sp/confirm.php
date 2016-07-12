

            <section class="center">
                <h1 class="contentsH1 mincho">買取のご依頼（ご確認）</h1>

                <p class="mb12 align-center"><img src="<?php echo get_template_directory_uri(); ?>/sp/image/7-2_03.gif" alt=""></p>
<p class="mb12">下記の内容にてご依頼を受付ます。<br>
内容をご確認の上、よろしければ「送信」ボタンを押して下さい。</p>




            </section>




            <section class="contact-box-input center">
                    <div class="bgc bodbb">
                     <dl class="form-parts">
                        <dt>お問い合わせ種別<span class="spre bold font10">※</span></dt>
                        <dd><?php echo $data['requestData']['kind']; ?></dd>
                    </dl>
                    <dl class="form-parts">
                        <dt>お名前（全角）<span class="spre bold font10">※</span></dt>
                        <dd><?php echo $data['requestData']['namee']; ?></dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>フリガナ（全角カナ）<span class="spre bold font10">※</span></dt>
                        <dd><?php echo $data['requestData']['hurigana']; ?></dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>メールアドレス（半角英数字）<span class="spre bold font10">※</span></dt>
                        <dd><?php echo $data['requestData']['email']; ?></dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>電話番号</dt>
                        <dd><?php echo $data['requestData']['tel']; ?></dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>都道府県<span>*</span></dt>
                        <dd><?php echo $data['requestData']['prefectures']; ?></dd>
                    </dl>
                     <dl class="form-parts">
                        <dt>市町村<span>*</span></dt>
                        <dd><?php echo $data['requestData']['municipality']; ?></dd>
                    </dl>
                     <dl class="form-parts">
                        <dt>番地・マンション<span>*</span></dt>
                        <dd><?php echo $data['requestData']['address']; ?></dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>買取希望のおおよその冊数</dt>
                        <dd class="w100ppin"><?php echo (int)$data['requestData']['satu']* (int)$data['requestData']['satusuu']; ?>
                        </dd>
                    </dl>
                    <dl class="form-parts">
                        <dt>本の写真を添付する</dt>
                        <dd class="w100ppin">
                            <p><?php echo is_image($data['requestData']['file1']); ?></p>
                            <p><?php echo is_image($data['requestData']['file2']); ?></p>
                            <p><?php echo is_image($data['requestData']['file3']); ?></p>
                        </dd>
                    </dl>

                    <dl class="form-parts">
                        <dt>買取の詳細<span class="spre bold font10">※</span></dt>
                        <dd><?php echo $data['requestData']['body']; ?></dd>
                    </dl>
                    </div>




<!-- フォーム開始 -->
<?php echo createFormConfirm(); ?>
<!-- フォーム開始 ここまで -->


<!-- これで一気にPOSTデータをhidden化 -->
<?php echo hiddenVars(); ?>
<!-- これで一気にPOSTデータをhidden化　ここまで -->



                    <ul class="kakni-bs form-parts">
                        <li class="nyu-bottan"><a href="#" onClick="history.back(); return false;">記入画面に戻る</a></li>
                        <li class="nyu-bottan"><button onclick="ga('send', 'event', 'smartphone', 'click', 'main');" type="submit">送信</button></li>
                    </ul>


<!-- 確認画面用 ここまで -->


<!-- フォーム終了 -->
<?php echo endFormConfirm(); ?>
<!-- フォーム終了 ここまで -->

            </section>



            <section class="center mb15">
                <h2 class="spicon submenuH2"><span class="bold">お急ぎの場合はお電話で！</span></h2>

                <div class="con-box3 align-center">
                    <h3 class="mb10"><a href="tel:0120-858-228" onclick="ga('send', 'event', 'smartphone', 'phone-number-tap', 'main');"><img width="253" src="<?php echo get_template_directory_uri(); ?>/sp/image/7-1_07.gif" alt="フリーダイヤル0120-858-228"></a></h3>
                    <p class="mb12">営業時間  10:00～19:00（不定休）</p>
                    <p>お急ぎの方はこちら</p>
                    <p class="chokuchu font16 bold">店主直通：<a href="tel:080-3466-3640" onclick="ga('send', 'event', 'smartphone', 'phone-number-tap', 'main');">080-3466-3640</a></p>
                </div>

            </section>

