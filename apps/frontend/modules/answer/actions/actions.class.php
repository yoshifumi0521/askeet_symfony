<?php

/**
 * answer actions.
 *
 * @package    askeet
 * @subpackage answer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class answerActions extends sfActions
{
  /**
   * Executes index action
   *
   */
    // public function executeIndex()
    // {

    // }

    //最近の答えを取得する。
    public function executeRecent()
    {
        $this->answer_pager = AnswerPeer::getRecentPager($this->getRequestParameter('page', 1));
    }

    //質問に対する回答をつくる。
    public function executeAdd()
    {
      #POSTだったらする処理。
      if ($this->getRequest()->getMethod() == sfRequest::POST)
      {
        //内容を取得する。
        if (!$this->getRequestParameter('body'))
        {
          //入ってなかったら何も返さない。
          return sfView::NONE;
        }

        //回答するquestionをとりだす。
        $question = QuestionPeer::retrieveByPK($this->getRequestParameter('question_id'));

        //匿名かどうかを判定
        if($this->getUser()->isAuthenticated())
        {
          //ログインユーザーの場合
          $this->logMessage("ログインユーザー");
          //ログインユーザーを取得する。
          $user = UserPeer::retrieveByPk($this->getUser()->getAttribute('subscriber_id','','subscriber'));
        }
        else
        {
          //匿名の場合
          $this->logMessage("匿名");
          //匿名を取得
          $user = UserPeer::retrieveByNickname('anonymous');
        }

        //回答する。
        $this->answer = new Answer();
        $this->answer->setQuestion($question);
        $this->answer->setBody($this->getRequestParameter('body'));
        $this->answer->setUser($user);
        $this->answer->save();

        return sfView::SUCCESS;
      }

      //GETなどできた場合の処理。エラーを起こす。
      $this->forward404();

    }



}
