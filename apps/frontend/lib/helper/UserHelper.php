<?php

//javascriptのモジュールを使う。
use_helper('Javascript');

//興味があるか？どうかを調べる。
function link_to_user_interested($user, $question)
{
    //認証しているかしてないか？
    //認証をしている場合
    if ($user->isAuthenticated())
    {
        //ユーザーがこの質問に興味をもっているか。第一引数$question_id,第二引数$user_idをやる。
        // $user->getAttribute('subscriber_id', '', 'subscriber')で、セッションに保存されている、subscriber_idを取り出す。
        $interested = InterestPeer::retrieveByPk($question->getId(), $user->getAttribute('subscriber_id', '', 'subscriber'));
        //そのレコードがなかった場合
        if ($interested)
        {
          // すでに興味を持っている
          return 'interested!';
        }
        else
        {
            // 興味があることをまだ宣言していなかった。興味がをつけるアクションをつける。
            //Ajaxで飛ばす。
            return link_to_remote('interested?', array(
            //飛ばす場所
            'url'      => 'user/interested?id='.$question->getId(),
            //Ajaxの内容を入れ替える領域を指定
            'update'   => array('success' => 'block_'.$question->getId())//,
            // 'loading'  => "Element.show('indicator')",
            //処理が終わったらする処理。
            // 'complete' => "Element.hide('indicator');".visual_effect('highlight', 'mark_'.$question->getId()),
            ));
        }
    }
    else
    {
        //認証をしていない場合は、ログイン画面に移動するリンクをはる。
        // return link_to('interested?', 'user/login');
        //ログインしてくださいボタンを表示する。
        return link_to_function('interested?', visual_effect('blind_down', 'login', array('duration' => 0.5)));
    }
}

?>



