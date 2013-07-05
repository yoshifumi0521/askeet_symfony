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

    //質問に対するタグを取り出す。そのときにタグは重複しないようにする。
    function getTags()
    {
        $c = new Criteria();
        $c->clearSelectColumns();
        $c->addSelectColumn(QuestionTagPeer::NORMALIZED_TAG);
        $c->add(QuestionTagPeer::QUESTION_ID, $this->getId());
        $c->setDistinct();
        $c->addAscendingOrderByColumn(QuestionTagPeer::NORMALIZED_TAG);

        $tags = array();
        $rs = QuestionTagPeer::doSelectRS($c);
        while ($rs->next())
        {
            $tags[] = $rs->getString(1);
        }
        return $tags;

    }

    public function getPopularTags($max = 5)
    {
        $tags = array();

        $con = Propel::getConnection();
        $query = '
        SELECT %s AS tag, COUNT(%s) AS count
        FROM %s
        WHERE %s = ?
        GROUP BY %s
        ORDER BY count DESC
        ';

        $query = sprintf($query,
        QuestionTagPeer::NORMALIZED_TAG,
        QuestionTagPeer::NORMALIZED_TAG,
        QuestionTagPeer::TABLE_NAME,
        QuestionTagPeer::QUESTION_ID,
        QuestionTagPeer::NORMALIZED_TAG
        );

        $stmt = $con->prepareStatement($query);
        $stmt->setInt(1, $this->getId());
        $stmt->setLimit($max);
        $rs = $stmt->executeQuery();
        while ($rs->next())
        {
            $tags[$rs->getString('tag')] = $rs->getInt('count');
        }
        return $tags;
    }



}
