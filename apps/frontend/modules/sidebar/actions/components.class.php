<?php

/**
 * sidebar actions.
 *
 * @package    askeet
 * @subpackage sidebar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
// class sidebarActions extends sfActions
// {
//     /**
//     * Executes index action
//     *
//     */
//     // public function executeIndex()
//     // {
//     //   $this->forward('default', 'module');
//     // }

// }
    //サイドバーのコンポーネントのファンクション
    class sidebarComponents extends sfComponents
    {
        public function executeDefault()
        {


        }

        //質問ページにつけるコンポーネント
        public function executeQuestion()
        {
            $this->question = QuestionPeer::getQuestionFromTitle($this->getRequestParameter('stripped_title'));
        }



    }







