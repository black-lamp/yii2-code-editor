<?php
namespace bl\ace;

use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\InputWidget;

use bl\ace\assets\AceAsset;
use bl\ace\assets\EmmetExtAsset;
use bl\ace\assets\EmmetCoreAsset;

/**
 * Widget for Ace code editor
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @link https://github.com/black-lamp/yii2-code-editor
 * @link https://github.com/ajaxorg/ace
 * @license https://opensource.org/licenses/GPL-3.0 GNU Public License
 *
 * @property string $language
 * @property string $theme
 * @property array $attributes
 * @property boolean $enableEmmet
 *
 * @property Model $model
 * @property string $attribute
 * @property array $options
 */
class AceWidget extends InputWidget
{
    /**
     * @var string Programming language
     */
    public $language = 'html';
    /**
     * @var string Editor theme
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

    public function init()
    {
        parent::init();
        AceAsset::register($this->view, $this->enableEmmet);

        $widget_id = mb_substr($this->id, 1);

        // init text editor JavaScripts
        $editor_id = 'ace-editor-' . $widget_id;

        $init_text_editor = "
            var aceEditor = ace.edit('$editor_id');
            aceEditor.setTheme('ace/theme/$this->theme');
            aceEditor.getSession().setMode('ace/mode/$this->language');
        ";

        if($this->enableEmmet) {
            $init_text_editor .= "
                aceEditor.setOption('enableEmmet', true);
            ";
        }

        $this->view->registerJs($init_text_editor);

        // Init textaream Javascripts
        $this->attributes['id'] = $editor_id;

        $textarea_id = 'ace-textarea-' . $widget_id;
        $this->options['id'] = $textarea_id;

        $init_textarea = "
            var textarea = document.getElementById('$textarea_id');
            textarea.style.display = 'none';
            
            aceEditor.setValue(
                textarea.value
            );
            
            aceEditor.on('change', function(e) {
                textarea.value = aceEditor.getValue();
            });
        ";
        $this->view->registerJs($init_textarea);
    }

    public function run()
    {
        $content = Html::tag('div', '', $this->attributes);
        $content .= Html::activeTextarea($this->model, $this->attribute, $this->options);

        return $content;
    }
}