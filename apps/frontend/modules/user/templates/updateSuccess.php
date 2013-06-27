<?php
  // auto-generated by sfPropelCrud
  // date: 2013/06/19 21:53:31
  // var_dump($sf_user->isAuthenticated());
  // var_dump($sf_request->getAttribute('referer'))
  //バリデーションを使うためのモジュール

  // var_dump($subscriber);


?>
<!-- User.phpファイルの function __toString()　が実行される。-->
<h1><?php echo $subscriber ?>'s profile</h1>

<h2>Interests</h2>

<ul>
  <?php foreach ($interests as $interest): $question = $interest->getQuestion() ?>
    <li><?php echo link_to($question->getTitle(), 'question/show?stripped_title='.$question->getStrippedTitle()) ?></li>
  <?php endforeach; ?>
</ul>

<h2>Contributions</h2>

<ul>
  <?php foreach ($answers as $answer): $question = $answer->getQuestion() ?>
    <li>
      <?php echo link_to($question->getTitle(), 'question/show?stripped_title='.$question->getStrippedTitle()) ?><br />
      <?php echo $answer->getBody() ?>
    </li>
  <?php endforeach; ?>
</ul>

<h2>Questions</h2>

<ul>
  <?php foreach ($questions as $question): ?>
    <li><?php echo link_to($question->getTitle(), 'question/show?stripped_title='.$question->getStrippedTitle()) ?></li>
  <?php endforeach; ?>
</ul>

