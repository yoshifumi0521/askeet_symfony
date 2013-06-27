<?php

/**
 * user actions.
 *
 * @package    askeet
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class userActions extends sfActions
{
    /**
    * Executes index action
    *
    */
    // public function executeIndex()
    // {
    //   $this->forward('default', 'module');
    // }

    //ログインの時のメソッド
    public function executeLogin()
    {
        // $this->getRequest()->setAttribute('referer', $this->getRequest()->getReferer());
        // return sfView::SUCCESS;

        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            // フォームを表示する
            $this->getRequest()->getParameterHolder()->set('referer', $this->getRequest()->getReferer());
            return sfView::SUCCESS;
        }
        else
        {
            // フォーム投稿を取り扱う
            // 最後のページにリダイレクトする。リファラーに飛ばす。
            return $this->redirect($this->getRequestParameter('referer', '@homepage'));
        }

        // //POSTかGETかどうかで判断する。
        // if ($this->getRequest()->getMethod() != sfRequest::POST)
        // {
        //     //GETできた場合
        //     $this->logMessage("target  GETできた");
        //     //GETで来た場合は、フォームを表示する
        //     $this->getRequest()->setAttribute('referer', $this->getRequest()->getReferer());
        // }
        // else
        // {
            // //POSTできた場合。
            // $this->logMessage("target  POSTできた");
            // // フォーム投稿を処理する
            // $nickname = $this->getRequestParameter('nickname');

            // $c = new Criteria();
            // $c->add(UserPeer::NICKNAME,$nickname);
            // $user = UserPeer::doSelectOne($c);

            // if($user)
            // {
            //     //ユーザーが登録していた場合
            //     $this->logMessage("target  ユーザーが登録していた");

            //     // passwordがOKか?
            //     if (true)
            //     {
            //         //パスワードが正しい場合
            //         $this->logMessage("target  パスワードが正しい");
            //         //認証をtrueにし、認証されていることにする。
            //         $this->getUser()->setAuthenticated(true);
            //         //この意味がわからない。
            //         $this->getUser()->addCredential('subscriber');

            //         //セッションにidや名前などをいれる。
            //         $this->getUser()->setAttribute('subscriber_id', $user->getId(), 'subscriber');
            //         $this->getUser()->setAttribute('nickname', $user->getNickname(), 'subscriber');

            //         // 最後のページにリダイレクトする。フォームで、リファラーを取得しているのでそれを取得。
            //         return $this->redirect($this->getRequestParameter('referer', '@homepage'));
            //     }
            //     else
            //     {
            //         //パスワードが正しくない場合


            //     }
            // }
            // else
            // {
            //     //ユーザーが登録してなかった場合。
            //     $this->logMessage("target  ユーザーが登録されてない");
            // }


    }

    // //プロフィールの表示
    public function executeShow()
    {
        //ユーザーのデータを取得する。
        $this->subscriber = UserPeer::retrieveByPk($this->getRequestParameter('id'));
        // var_dump($this->subscriber);
        // var_dump($this->subscriber);
        // $this->subscriber = UserPeer::retrieveByPk($this->getRequestParameter('id', $this->getUser()->getSubscriberId()));
        // var_dump( $this->getRequestParameter('id', $this->getUser()->getSubscriberId()) );
        // $this->forward404Unless($this->subcriber);

        // $this->interests = $this->subscriber->getInterests();

        //Interestを取得するときに、Questionレコードも読み取る。
        $this->interests = $this->subscriber->getInterestsJoinQuestion();
        // // $this->answers = $this->subscriber->getAnswers();
        // //Answerを取得するときに、Questionレコードも読み取る。
        $this->answers   = $this->subscriber->getAnswersJoinQuestion();
        $this->questions = $this->subscriber->getQuestions();
        // var_dump($this->answers);


    }

    //ユーザーの質問に対する興味を追加する。
    public function executeInterested()
    {
        $this->logMessage("AJAx成功ー");
        // $this->question = QuestionPeer::retrieveByPk($this->getRequestParameter('id'));
        //$this->questionがなかったらエラー処理
        // $this->forward404Unless($this->question);

        // var_dump($this->getUser()->getAttribute('subscriber_id','subscriber'));
        // $this->logMessage($this->getUser()->getAttribute('subscriber_id','','subscriber'));
        $user = UserPeer::retrieveByPk($this->getUser()->getAttribute('subscriber_id','','subscriber'));
        // $this->logMessage($user);
        // var_dump($this->getAttribute('subscriber_id', '', 'subscriber'));
        // $this->getUser()->setAttribute('member_id',
        $interest = new Interest();
        $interest->setQuestion($this->question);
        $interest->setUser($user);
        $interest->save();


    }



    public function executeLogout()
    {

        $this->getUser()->setAuthenticated(false);
        $this->getUser()->clearCredentials();

        $this->getUser()->getAttributeHolder()->removeNamespace('subscriber');

        $this->redirect('@homepage');
    }

    //バリデーションで、ひっかかったらここをとおる。必ず必要なメソッド
    public function handleErrorLogin()
    {
        //バリデーションエラー
        $this->logMessage("target  バリデーションエラー");
        return sfView::SUCCESS;
    }






}
