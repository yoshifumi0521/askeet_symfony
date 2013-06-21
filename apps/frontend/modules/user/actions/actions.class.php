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

        //POSTかGETかどうかで判断する。
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            //GETできた場合
            $this->logMessage("target  GETできた");
            //GETで来た場合は、フォームを表示する
            $this->getRequest()->setAttribute('referer', $this->getRequest()->getReferer());
        }
        else
        {
            //POSTできた場合。
            $this->logMessage("target  POSTできた");
            // フォーム投稿を処理する
            $nickname = $this->getRequestParameter('nickname');

            $c = new Criteria();
            $c->add(UserPeer::NICKNAME,$nickname);
            $user = UserPeer::doSelectOne($c);

            if($user)
            {
                //ユーザーが登録していた場合
                $this->logMessage("target  ユーザーが登録していた");

                // passwordがOKか?
                if (true)
                {
                    //パスワードが正しい場合
                    $this->logMessage("target  パスワードが正しい");

                    $this->getUser()->setAuthenticated(true);
                    $this->getUser()->addCredential('subscriber');
                    //セッションにidや名前などをいれる。
                    $this->getUser()->setAttribute('subscriber_id', $user->getId(), 'subscriber');
                    $this->getUser()->setAttribute('nickname', $user->getNickname(), 'subscriber');

                    // 最後のページにリダイレクトする
                    return $this->redirect($this->getRequestParameter('referer', '@homepage'));
                }
                else
                {
                    //パスワードが正しくない場合


                }
            }
            else
            {
                //ユーザーが登録してなかった場合。
                $this->logMessage("target  ユーザーが登録されてない");
            }

        }
    }

    public function executeLogout()
    {
      $this->getUser()->setAuthenticated(false);
      $this->getUser()->clearCredentials();

      $this->getUser()->getAttributeHolder()->removeNamespace('subscriber');

      $this->redirect('@homepage');
    }







}
