<?php


namespace bwharnsby\phpmvc\html;


class Tag
{
    public string $tag_name;
    public string $text;
    public array $attributes;

    public function __construct(string $tag_name, string $text, array $attributes)
    {
        $this->tag_name = $tag_name;
        $this->text = $text;
        $this->attributes = $attributes;
    }

    public function __toString()
    {
        $attrs = implode(" ", array_map(fn($k, $v) => "$k='$v'", $this->attributes));
        return sprintf(
            "<%s %s>%s</%s>",
            $this->tag_name,
            $attrs,
            $this->text,
            $this->tag_name
        );
    }
}