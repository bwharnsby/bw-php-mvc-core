<?php


namespace bwharnsby\phpmvc\form;


class SelectField extends BaseField
{
    private array $options;

    public function setOptions($options) {
        $this->options = $options;
    }

    public function renderInput(): string
    {
        $ops = array_map(fn($op) => "<option value='".$op['value']."'>".$op['text']."</option>", $this->options);
        return sprintf(
            '<select name="%s" class="form-control">%s</select>',
            $this->attribute,
            implode('', $ops)
        );
    }
}