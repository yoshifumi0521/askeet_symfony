<?php

class myTools
{
    //テキストを変換する。
    public static function stripText($text)
    {
        $text = strtolower($text);

        // すべての非単語を剥ぎ取る
        $text = preg_replace('/\W/', ' ', $text);

        // すべての空白文字のセクションをダッシュに置き換える
        $text = preg_replace('/\ +/', '-', $text);

        // ダッシュをトリムする
        $text = preg_replace('/\-$/', '', $text);
        $text = preg_replace('/^\-/', '', $text);

        return $text;
    }
}


