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

    /**
     * @inheritdoc
     */
    public static function register($view, $enableEmmet = false)
    {
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