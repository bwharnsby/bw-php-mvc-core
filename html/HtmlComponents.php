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

        $classes = array_key_exists('classes', $attributes) ? implode(" ", $attributes['classes']) : '';
        $style = array_key_exists('style', $attributes) ? $attributes['style'] : '';
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
                $anchor = HtmlTag::a($link['text'], $link['attributes']);
                $list_items .= HtmlTag::li($anchor, ['class' => 'breadcrumb-item']);
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
        foreach($values as $value_arr) {
            $tr = "";
            for($i = 0; $i < count($value_arr['data']); $i++) {
                $data_ele = $value_arr['data'][$i];
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

    public static function row($cols, $attributes = [])
    {
        $row = "";
        foreach ($cols as $col) {
            $row .= HtmlTag::div($col['text'], $col['attributes']);
        }
        return HtmlTag::div($row, $attributes);
    }
}