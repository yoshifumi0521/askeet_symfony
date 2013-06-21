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





}
