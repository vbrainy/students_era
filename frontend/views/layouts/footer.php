<footer id="footer">
        <div class="container_12 main-footer">
            <div class="grid_4 about-us">
                <h3 class="rs title">About</h3>
                <p class="rs description">Donec rutrum elit ac arcu bibendum rhoncus in vitae turpis. Quisque fermentum gravida eros non faucibus. Curabitur fermentum, arcu sed cursus commodo.</p>
                <p class="rs email"><a class="fc-default  be-fc-orange" href="mailto:info@megadrupal.com">info@megadrupal.com</a></p>
                <p class="rs">+1 (555) 555 - 55 - 55</p>
            </div><!--end: .contact-info -->
            <div class="grid_4 email-newsletter">
                <h3 class="rs title">Newsletter Signup</h3>
                <div class="inner">
                    <p class="rs description">Nam aliquet, velit quis consequat interdum, odio dolor elementum.</p>
                    <form action="#">
                        <div class="form form-email">
                            <label class="lbl" for="txt-email">
                                <input id="txt-email" type="text" class="txt fill-width" placeholder="Enter your e-mail address"/>
                            </label>
                            <button class="btn btn-green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!--end: .email-newsletter -->
            <div class="grid_4">
                <h3 class="rs title">Discover &amp; Create</h3>
                <div class="footer-menu">
                    <ul class="rs">
                        <li><a class="be-fc-orange" href="#">What is <?= Yii::getAlias('@site_title') ?></a></li>
                        <li><a class="be-fc-orange" href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/campaigns/create">Start a project</a></li>
                        <li><a class="be-fc-orange" href="#">Popular</a></li>
                    </ul>
                    <ul class="rs">
                    <li><a class="be-fc-orange" href="#">Recent</a></li>
                        <li><a class="be-fc-orange" href="#">Small Projects</a></li>
                        <li><a class="be-fc-orange" href="#">Most Funded</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    <div class="copyright" style="margin-top: 26px;">
            <div class="container_12">
                <div class="grid_12">
                    <a class="logo-footer" href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>"><?= Yii::getAlias('@site_title') ?></a>
                    <p class="rs term-privacy">
                        <a class="fw-b be-fc-orange" href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/pages/terms_condition">Terms & Conditions</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/pages/policy">Privacy Policy</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/pages/faq">FAQ</a>
                    </p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </footer><!--end: #footer -->
