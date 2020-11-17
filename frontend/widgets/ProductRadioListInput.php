<?php
namespace frontend\widgets;

use yii\widgets\InputWidget;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use Yii;

class ProductRadioListInput extends InputWidget
{
    public $items = [];

    public function run()
    {
        $items = (array)$this->items;
        $options = (array)$this->options;
        $encode = ArrayHelper::getValue($options, 'encode', true);
        $options['item'] = function($index, $label, $name, $checked, $value) use ($encode) {
            $id = sprintf('product%s', $value);
            $opts['value'] = $value;
            $opts['class'] = 'pay-option-check';
            $opts['id'] = $id;
            $input = sprintf(
                '%s<label class="pay-option-label" for="%s">%s</label>', 
                Html::radio($name, $checked, $opts),
                $id,
                $label
            );
        
            return $input;
        };
        return Html::activeRadioList($this->model, $this->attribute, $items, $options);
    }
}