<?php


namespace bwharnsby\phpmvc\html;


class HtmlComponents
{
    public static function card($text, $title = '', $header = '', $attributes = [])
    {
        $card = "";
        if($header) {
            $card .= HtmlTag::div($header, ['class' => 'card-header']);
        }
        $body = "";
        if($title) {
            $body .= HtmlTag::h4($title, ['class' => 'card-title']);
        }
        $body .= HtmlTag::p($text, ['class' => 'card-text']);
        $card .= HtmlTag::div($body, ['class' => 'card-body']);

        $classes = implode(" ", $attributes['classes']);
        $style = $attributes['style'];
        return HtmlTag::div($card, ['class' => "card $classes", 'style' => $style]);
    }

    public static function blankCard($text, $header = '', $attributes = [])
    {
        $card = "";
        if($header) {
            $card .= HtmlTag::div($header, ['class' => 'card-header']);
        }
        $card .= HtmlTag::div($text, ['class' => 'card-body']);

        $classes = implode(" ", $attributes['classes']);
        $style = $attributes['style'];
        return HtmlTag::div($card, ['class' => "card $classes", 'style' => $style]);
    }

    public static function breadcrumbs($links = [])
    {
        $list_items = '';
        for($i = 0; $i < count($links); $i++) {
            $link = $links[$i];
            if($i == count($links) - 1) {
                $list_items .= HtmlTag::li($link['text'], ['class' => 'breadcrumb-item active']);
            }
            else {
                $anchor = HtmlTag::a($link['text'], ['href' => $link['href']]);
                $list_items .= HtmlTag::li($anchor, ['class' => 'breadcrumb-item active']);
            }
        }
        return HtmlTag::ol($list_items, ['class' => "breadcrumb"]);
    }
}