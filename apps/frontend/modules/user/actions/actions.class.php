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
        $this->logMessage("loginきたー");


    }







}
