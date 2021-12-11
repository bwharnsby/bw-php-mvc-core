<?php

namespace bwharnsby\phpmvc\form;

use bwharnsby\phpmvc\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute, $type = '')
    {
        switch ($type) {
            case 'textarea':
                $field = new TextareaField($model, $attribute);
                break;
            default:
                $field = new InputField($model, $attribute);
        }
        return $field;
    }
}