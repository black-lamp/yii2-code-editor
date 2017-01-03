<?php
/**
 * @link https://github.com/black-lamp/yii2-code-editor
 * @copyright Copyright (c) 2016-2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\ace;

use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\InputWidget;

use bl\ace\assets\AceAsset;

/**
 * Widget for Ace code editor
 *
 * @property string $language
 * @property string $theme
 * @property array $attributes
 * @property boolean $enableEmmet
 *
 * @property Model $model
 * @property string $attribute
 * @property array $options
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class AceWidget extends InputWidget
{
    /**
     * @var string Programming language
     */
    public $language = 'html';
    /**
     * @var string Editor's theme
     */
    public $theme = 'github';
    /**
     * @var boolean Enable emmet extension
     */
    public $enableEmmet = false;
    /**
     * @var array HTML attributes for editor container
     */
    public $attributes = [
        'style' => 'max-width: 600px; min-height: 400px;'
    ];


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        AceAsset::register($this->view, $this->enableEmmet);

        $widgetId = mb_substr($this->id, 1);

        // init text editor scripts
        $editorId = 'ace-editor-' . $widgetId;

        $initTextEditor = <<< JS
            var aceEditor = ace.edit('$editorId');
            aceEditor.setTheme('ace/theme/$this->theme');
            aceEditor.getSession().setMode('ace/mode/$this->language');
JS;

        if($this->enableEmmet) {
            $initTextEditor .= "aceEditor.setOption('enableEmmet', true);";
        }

        $this->view->registerJs($initTextEditor);

        // Init textarea scripts
        $this->attributes['id'] = $editorId;

        $textareaId = 'ace-textarea-' . $widgetId;
        $this->options['id'] = $textareaId;

        $initTextarea = <<< JS
            var textarea = document.getElementById('$textareaId');
            textarea.style.display = 'none';
            
            aceEditor.setValue(
                textarea.value
            );
            
            aceEditor.on('change', function(e) {
                textarea.value = aceEditor.getValue();
            });
JS;
        $this->view->registerJs($initTextarea);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $content = Html::tag('div', '', $this->attributes);
        $content .= Html::activeTextarea($this->model, $this->attribute, $this->options);

        return $content;
    }
}