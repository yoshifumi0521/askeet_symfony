<?php

/**
 * Subclass for representing a row from the 'ask_user' table.
 *
 *
 *
 * @package lib.model
 */
class User extends BaseUser
{
    //__toString()メソッドはオブジェクトを文字として表現するために使われるデフォルトのメソッド
    //echo $userとすれば、フルネームがでてくるようになる。
    public function __toString()
    {
        return $this->getFirstName().' '.$this->getLastName();
    }

    //入力されたパスワードを使って、saltとsetSha1Passwordをいれる
    public function setPassword($password)
    {
        $salt = md5(rand(100000, 999999).$this->getNickname().$this->getEmail());
        $this->setSalt($salt);
        $this->setSha1Password(sha1($salt.$password));
    }

    //ユーザーをお気に入りに追加する。
    public function isInterestedIn($question)
    {
        $interest = new Interest();
        $interest->setQuestion($question);
        $interest->setUserId($this->getId());
        $interest->save();

    }



}
