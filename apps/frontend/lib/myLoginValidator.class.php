<?php

//カスタムバリデーション
class myLoginValidator extends sfValidator
{
  public function initialize($context, $parameters = null)
  {
    // 親クラスを初期化する
    parent::initialize($context);

    // デフォルトを設定する
    $this->setParameter('login_error', 'Invalid input');

    $this->getParameterHolder()->add($parameters);

    return true;
  }

  public function execute(&$value, &$error)
  {
    $password_param = $this->getParameter('password');
    $password = $this->getContext()->getRequest()->getParameter($password_param);

    $login = $value;

    // anonymousは実際のユーザーではない
    if ($login == 'anonymous')
    {
      $error = $this->getParameter('login_error');
      return false;
    }

    $c = new Criteria();
    $c->add(UserPeer::NICKNAME, $login);
    $user = UserPeer::doSelectOne($c);

    // nicknameが存在するか？
    if ($user)
    {
      // passwordはOKか？
      if (sha1($user->getSalt().$password) == $user->getSha1Password())
      {
        $this->getContext()->getUser()->setAuthenticated(true);
        $this->getContext()->getUser()->addCredential('subscriber');

        $this->getContext()->getUser()->setAttribute('subscriber_id', $user->getId(), 'subscriber');
        $this->getContext()->getUser()->setAttribute('nickname', $user->getNickname(), 'subscriber');

        return true;
      }
    }

    $error = $this->getParameter('login_error');
    return false;
  }
}