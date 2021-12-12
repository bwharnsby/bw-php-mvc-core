<?php


namespace bwharnsby\phpmvc\html;


class HtmlTag
{
    public static function h1($text, $attributes = [])
    {
        return new Tag('h1', $text, $attributes);
    }

    public static function h2($text, $attributes = [])
    {
        return new Tag('h2', $text, $attributes);
    }

    public static function h3($text, $attributes = [])
    {
        return new Tag('h3', $text, $attributes);
    }

    public static function h4($text, $attributes = [])
    {
        return new Tag('h4', $text, $attributes);
    }

    public static function h5($text, $attributes = [])
    {
        return new Tag('h5', $text, $attributes);
    }

    public static function h6($text, $attributes = [])
    {
        return new Tag('h6', $text, $attributes);
    }
}