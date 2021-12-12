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

        $classes = array_key_exists('classes', $attributes) ? implode(" ", $attributes['classes']) : '';
        $style = array_key_exists('style', $attributes) ? $attributes['style'] : '';
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

    public static function table($values, $headers = [], $attributes = [], $withRowHeaders = false)
    {
        $table = "";
        if(!empty($headers)) {
            $tr = "";
            foreach ($headers as $h) {
                $tr .= HtmlTag::th($h['text'], $h['attributes']);
            }
            $table .= HtmlTag::thead(HtmlTag::tr($tr));
        }
        $tbody = "";
        for ($i = 0; $i < count($values); $i++) {
            $value_arr = $values[$i];
            $tr = "";
            foreach($value_arr['data'] as $data_ele) {
                if($i == 0 && $withRowHeaders) {
                    $tr .= HtmlTag::th($data_ele['text'], $data_ele['attributes']);
                }
                else {
                    $tr .= HtmlTag::td($data_ele['text'], $data_ele['attributes']);
                }
            }
            $tbody .= HtmlTag::tr($tr, $value_arr['attributes']);
        }
        $table .= HtmlTag::tbody($tbody);
        return HtmlTag::table($table, $attributes);
    }
}