<?php

class Tag
{
    //通常のタグを返す。インデックスのために使用される通常のバージョンのタグ名を返す。
    public static function normalize($tag)
    {
        $n_tag = strtolower($tag);

        // 望まないすべての文字列を取り除く
        $n_tag = preg_replace('/[^a-zA-Z0-9]/', '', $n_tag);

        return trim($n_tag);
    }

    //タグの配列を返す。
    public static function splitPhrase($phrase)
    {
        $tags = array();
        $phrase = trim($phrase);

        $words = preg_split('/(")/', $phrase, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $delim = 0;
        foreach ($words as $key => $word)
        {
            if ($word == '"')
            {
                $delim++;
                continue;
            }
            if (($delim % 2 == 1) && $words[$key - 1] == '"')
            {
                $tags[] = trim($word);
            }
            else
            {
                $tags = array_merge($tags, preg_split('/\s+/', trim($word), -1, PREG_SPLIT_NO_EMPTY));
            }
        }
        return $tags;
    }
}

?>

