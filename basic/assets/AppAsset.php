<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

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
        'css/site.css',
        'stylesheets/plugins/datatables/bootstrap-datatable.css',
        'stylesheets/bootstrap/bootstrap.css',
        'stylesheets/light-theme.css',
        'stylesheets/theme-colors.css',
        'stylesheets/demo.css',
    ];
    public $js = [
        'javascripts/jquery/jquery.min.js',
        'javascripts/jquery/jquery.mobile.custom.min.js',
        'javascripts/jquery/jquery-migrate.min.js',
        'javascripts/jquery/jquery-ui.min.js',
        'javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js',
        'javascripts/bootstrap/bootstrap.js',
        'javascripts/plugins/modernizr/modernizr.min.js',
        'javascripts/plugins/retina/retina.js',
        'javascripts/theme.js',
        'javascripts/demo.js',
        'javascripts/plugins/datatables/jquery.dataTables.min.js',
        'javascripts/plugins/datatables/jquery.dataTables.columnFilter.js',
        'javascripts/plugins/datatables/dataTables.overrides.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
