<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300',
        //'css/site.css',
        'css/normalize.css',
        'css/jquery.sidr.light.css',
        'css/animate.min.css',
        'css/md-slider.css',
        'css/style.css',
        'css/responsive.css'
    ];
    public $js = [
        'js/raphael-min.js',
        'js/jquery-1.9.1.min.js',
        'js/jquery-migrate-1.2.1.min.js',
        'js/jquery.touchwipe.min.js',
        'js/md_slider.min.js',
        'js/jquery.sidr.min.js',
        'js/jquery.tweet.min.js',
        'js/pie.js',
        'js/script.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
