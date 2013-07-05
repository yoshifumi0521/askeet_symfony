<?php

/**
 * Subclass for performing query and update operations on the 'ask_question' table.
 *
 *
 *
 * @package lib.model
 */
class QuestionPeer extends BaseQuestionPeer
{
    //ページ分割のオブジェクトを取得する。
    public static function getHomepagePager($page)
    {
      //sfPropelPagerクラスはページネーションを扱うためのクラス。
      //sfConfigは定数のクラス。
      $pager = new sfPropelPager('Question', sfConfig::get('app_pager_homepage_max'));
      $c = new Criteria();
      $c->addDescendingOrderByColumn(self::INTERESTED_USERS);
      $pager->setCriteria($c);
      $pager->setPage($page);
      $pager->setPeerMethod('doSelectJoinUser');
      $pager->init();

      return $pager;
    }

    //urlにのっけるタイトルを取得
    public static function getQuestionFromTitle($title)
    {
        $c = new Criteria();
        $c->add(QuestionPeer::STRIPPED_TITLE, $title);
        return self::doSelectOne($c);
        //エラー処理
        // $this->forward404Unless($this->question);

    }

    //最近の投稿をページネーションで取得する。
    public static function getRecentPager($page)
    {
      $pager = new sfPropelPager('Question', sfConfig::get('app_pager_homepage_max'));
      $c = new Criteria();
      //created_at順に並べる。
      $c->addDescendingOrderByColumn(self::CREATED_AT);
      $pager->setCriteria($c);
      $pager->setPage($page);
      $pager->setPeerMethod('doSelectJoinUser');
      $pager->init();

      return $pager;

    }

    //あるタグで一番人気の質問(多くのユーザーがタグづけしている)を取得する。
    public static function getPopularByTag($tag, $page)
    {
        $c = new Criteria();
        $c->add(QuestionTagPeer::NORMALIZED_TAG, $tag);
        //タグ付けしたユーザー順に並べる。addDescendingOrderByColumn。
        $c->addDescendingOrderByColumn(QuestionPeer::INTERESTED_USERS);
        $c->addJoin(QuestionTagPeer::QUESTION_ID, QuestionPeer::ID, Criteria::LEFT_JOIN);

        $pager = new sfPropelPager('Question', sfConfig::get('app_pager_homepage_max'));
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();

        return $pager;
    }







}
