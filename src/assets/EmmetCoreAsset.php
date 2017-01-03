<?php
/**
 * @link https://github.com/black-lamp/yii2-code-editor
 * @copyright Copyright (c) 2016-2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\ace\assets;

use yii\web\AssetBundle;

/**
 * Asset for emmet core files
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class EmmetCoreAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = "@bower/emmet-core-js";
    /**
     * @inheritdoc
     */
    public $js = [
        'emmet.js'
    ];
}