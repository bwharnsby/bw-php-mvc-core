<?php

namespace bwharnsby\phpmvc\form;

use bwharnsby\phpmvc\Model;

class Form
{
    public static function begin($action, $method, $options = [])
    {
        $attributes = [];
        foreach ($options as $key => $value) {
            $attributes[] = "$key=\$value\"";
        }
        echo sprintf('<form action="%s" method="%s" %s>', $action, $method, implode(" ", $attributes));
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute, $type = '', $options = [])
    {
        switch ($type) {
            case 'textarea':
                $field = new TextareaField($model, $attribute);
                break;
            case 'select':
                $field = new SelectField($model, $attribute);
                $field->setOptions($options);
                break;
            default:
                $field = new InputField($model, $attribute);
        }
        return $field;
    }
}