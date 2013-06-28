<?php

/**
 * Subclass for representing a row from the 'ask_question' table.
 *
 *
 *
 * @package lib.model
 */
class Question extends BaseQuestion
{
    //Questionのtitleを追加するsetTitleメソッドを拡張する。
    public function setTitle($v)
    {
        //setTitleを継承する。
        parent::setTitle($v);
        //lib/myTools.class.phpのstripTextメソッドをつかって、テキストを変更する。
        $this->setStrippedTitle(myTools::stripText($v));
    }

    //bodyを保存するときにする処理。子のQuestion.phpを優先的に実行する。
    public function setBody($v)
    {
        //親のsetBodyメソッドを実行する。
        parent::setBody($v);
        //markdownライブラリを取り入れる。
        require_once('markdown.php');

        // HTMLタグを剥ぎ取る
        $v = htmlentities($v, ENT_QUOTES, 'UTF-8');

        //データにいれる。
        $this->setHtmlBody(markdown($v));


    }




}
