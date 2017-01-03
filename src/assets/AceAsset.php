<?php
/**
 * @link https://github.com/black-lamp/yii2-code-editor
 * @copyright Copyright (c) 2016-2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\ace\assets;

use yii\web\AssetBundle;

/**
 * Asset for Ace source files
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class AceAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = "@bower/ace-builds/src-min-noconflict";
    /**
     * @inheritdoc
     */
    public $js = [
        'ace.js'
    ];


    /**
     * @inheritdoc
     */
    public static function register($view, $enableEmmet = false)
    {
        /** @var AssetBundle $boundle */
        $boundle = parent::register($view);

        if($enableEmmet) {
            $view->registerJsFile($boundle->baseUrl . '/ext-emmet.js', [
                'depends' => 'bl\ace\assets\EmmetCoreAsset'
            ],
            'ACE_EXT_EMMET');
        }

        return $boundle;
    }
}