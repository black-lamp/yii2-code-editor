<?php
namespace bl\ace\assets;

use yii\web\AssetBundle;

/**
 * Asset for emmet core
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class EmmetCoreAsset extends AssetBundle
{
    public $sourcePath = "@vendor/black-lamp/yii2-text-editor/assets";

    public $js = [
        'js/emmet.js'
    ];
}