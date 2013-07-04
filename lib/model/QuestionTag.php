<?php

/**
 * Subclass for representing a row from the 'ask_question_tag' table.
 *
 *
 *
 * @package lib.model
 */
class QuestionTag extends BaseQuestionTag
{
    // normalized_tagを保存する。
    function setTag($v)
    {
        //親のクラスsetTag()を実行する。これをやらないとtagが追加されない。
        parent::setTag($v);
        //NormalizedTagをいれる。
        $this->setNormalizedTag(Tag::normalize($v));

    }


}
