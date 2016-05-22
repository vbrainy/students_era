<header id="header">
        <div class="wrap-top-menu">
            <div class="container_12 clearfix">
                <div class="grid_12">
                    <nav class="top-menu">
                        <ul id="main-menu" class="nav nav-horizontal clearfix">
                            <li class="active"><a href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/site/index">Home</a></li>
                            <li class="sep"></li>
                            <li><a href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/pages/about_us">About Us</a></li>
                            <li class="sep"></li>
                            <li><a href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/campaigns/index">Campaigns</a></li>
                            <li class="sep"></li>
                            <li><a href="<?php echo yii\helpers\Url::to('site/contact') ?>">Contact</a></li>
                        </ul>
                        <a id="btn-toogle-menu" class="btn-toogle-menu" href="#alternate-menu">
                            <span class="line-bar"></span>
                            <span class="line-bar"></span>
                            <span class="line-bar"></span>
                        </a>
                        <div id="right-menu">
                            <ul class="alternate-menu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="all-pages.html">About Us</a></li>
                                <li><a href="how-it-work.html">Campaigns</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div><!-- end: .wrap-top-menu -->
        <div class="container_12 clearfix">
            <div class="grid_12 header-content">
                <div id="sys_header_right" class="header-right">
                    <div class="account-panel">
                        <?php if(!Yii::$app->user->isGuest) { ?>
                            <b><?= !empty(Yii::$app->user->identity->first_name) ? Yii::$app->user->identity->first_name : ''; ?>&nbsp;
                            <?= !empty(Yii::$app->user->identity->last_name) ? Yii::$app->user->identity->last_name : ''; ?>
                            </b>
                            <a class="btn btn-white" href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/site/logout">Logout</a>
                        <?php } else { ?>
                            <a href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/site/signup" class="btn btn-red">Register</a>
                            <a href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/site/login" class="btn btn-black">Login</a>
                        <?php } ?>
                    </div>
                    <div class="form-search">
                        <form action="#">
                            <label for="sys_txt_keyword">
                                <input id="sys_txt_keyword" class="txt-keyword" type="text" placeholder="Search projects"/>
                            </label>
                            <button class="btn-search" type="reset"><i class="icon iMagnifier"></i></button>
                            <button class="btn-reset-keyword" type="reset"><i class="icon iXHover"></i></button>
                        </form>
                    </div>
                </div>
                <div class="header-left">
                    <h1 id="logo">
                        <a href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>"><img src="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/images/logo1.jpg" alt="<?= Yii::getAlias('@site_title') ?>"/></a>
                    </h1>
                    <div class="main-nav clearfix">
                        <div class="nav-item">
                            <a href="category.html" class="nav-title">Discover</a>
                            <p class="rs nav-description">Great Projects</p>
                        </div>
                        <span class="sep"></span>
                        <div class="nav-item">
                            <a href="<?php echo Yii::$app->getUrlManager()->baseUrl ?>/campaigns/create" class="nav-title">Start</a>
                            <p class="rs nav-description">Your Project</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!--end: #header -->