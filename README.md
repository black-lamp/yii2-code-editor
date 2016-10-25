# Code editor for Yii2
Widget for [Ace](https://ace.c9.io) code editor

[![Latest Stable Version](https://poser.pugx.org/black-lamp/yii2-text-editor/version)](https://packagist.org/packages/black-lamp/yii2-text-editor)
[![Latest Unstable Version](https://poser.pugx.org/black-lamp/yii2-text-editor/v/unstable)](//packagist.org/packages/black-lamp/yii2-text-editor)
[![License](https://poser.pugx.org/black-lamp/yii2-text-editor/license)](https://packagist.org/packages/black-lamp/yii2-text-editor)

Installation
------------
#### Run command
```
composer require black-lamp/yii2-text-editor
```
or add
```json
"black-lamp/yii2-yii2-text-editor": "*"
```
to the require section of your composer.json.

Using
-----
Use [bl\ace\Ace](https://github.com/black-lamp/yii2-code-editor/blob/master/Ace.php) widget with ActiveForm
```php
$form = ActiveForm::begin();
    // ...
    echo $form->field($model, 'text')->widget(bl\ace\AceWidget::className(), [
        'language' => 'javascript'
    ]);
$form->end();
```
#### Widget configuration attributes
| Name | Data type | Value | Defaul value |
|---|---|---|---|
|language|string|Programming language|html| 
|theme|string|Code editor theme|github|
|enableEmmet|boolean|Enable emmet plugin for HTML|false|
|attributes|array|HTML attributes for editor container|'style' => 'max-width: 600px; min-height: 400px;'|

For more information about 'language' and 'theme' configuration attributes read [Ace documentation](https://ace.c9.io/#nav=howto)