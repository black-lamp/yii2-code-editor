<?php
namespace bl\ace\assets;

use yii\web\AssetBundle;

/**
 * Asset for emmet extension for Ace text editor
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class EmmetExtAsset extends AssetBundle
{
    public $sourcePath = "@bower/ace-builds/src-min-noconflict";

    public $js = [
        'ext-emmet.js'
    ];

    public $depends = [
        'bl\ace\assets\EmmetCoreAsset',
        'bl\ace\assets\AceAsset'
    ];
}