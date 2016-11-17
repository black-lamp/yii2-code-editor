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
"black-lamp/yii2-yii2-text-editor": "1.0.0"
```
to the require section of your composer.json.

Using
-----
Use widget with ActiveForm
```php
$form = ActiveForm::begin();
    // ...
    echo $form->field($model, 'text')->widget(bl\ace\AceWidget::className(), [
        'language' => 'javascript'
    ]);
$form->end();
```
#### Widget configuration properties
| Option | Description | Type | Default |
|---|---|---|---|
|language|Programming language| string|html|
|theme|Code editor theme|string|github|
|enableEmmet|Enable emmet plugin for HTML|boolean|false|
|attributes|HTML attributes for editor container|array|['style' => 'max-width: 600px; min-height: 400px;']|

For more information about 'language' and 'theme' configuration attributes read [Ace documentation](https://ace.c9.io/#nav=howto)
