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
    public $sourcePath = "@common/widgets/ace/assets";

    public $js = [
        'js/emmet.js'
    ];
}