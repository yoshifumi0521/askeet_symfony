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
    public function __toString()
    {
        return $this->getFirstName().' '.$this->getLastName();
    }







}
