<?php
namespace bl\ace\assets;

use yii\web\AssetBundle;

/**
 * Asset for Ace source files
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class AceAsset extends AssetBundle
{
    public $sourcePath = "@bower/ace-builds/src-min-noconflict";

    public $js = [
        'ace.js'
    ];
}