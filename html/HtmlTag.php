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

    public static function p($text, $attributes = [])
    {
        return new Tag('p', $text, $attributes);
    }

    public static function table($text, $attributes = [])
    {
        return new Tag('table', $text, $attributes);
    }

    public static function tr($text, $attributes = [])
    {
        return new Tag('tr', $text, $attributes);
    }

    public static function td($text, $attributes = [])
    {
        return new Tag('td', $text, $attributes);
    }

    public static function th($text, $attributes = [])
    {
        return new Tag('th', $text, $attributes);
    }

    public static function tbody($text, $attributes = [])
    {
        return new Tag('tbody', $text, $attributes);
    }

    public static function thead($text, $attributes = [])
    {
        return new Tag('thead', $text, $attributes);
    }

    public static function div($text, $attributes = [])
    {
        return new Tag('div', $text, $attributes);
    }

    public static function span($text, $attributes = [])
    {
        return new Tag('span', $text, $attributes);
    }

    public static function ul($text, $attributes = [])
    {
        return new Tag('ul', $text, $attributes);
    }

    public static function ol($text, $attributes = [])
    {
        return new Tag('ol', $text, $attributes);
    }

    public static function li($text, $attributes = [])
    {
        return new Tag('li', $text, $attributes);
    }

    public static function a($text, $attributes = [])
    {
        return new Tag('a', $text, $attributes);
    }

    public static function button($text, $attributes = [])
    {
        return new Tag('button', $text, $attributes);
    }

    public static function br()
    {
        return '<br />';
    }

    public static function hr()
    {
        return '<hr>';
    }
}