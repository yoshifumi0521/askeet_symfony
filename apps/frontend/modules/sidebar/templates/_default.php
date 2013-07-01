<!--　サイドバーのコンポーネント -->
<?php echo link_to('ask a new question','@add_question') ?>

<ul>
    <li><?php echo link_to('popular questions', 'question/list') ?></li>
    <li><?php echo link_to('latest questions', 'question/recent') ?></li>
    <li><?php echo link_to('latest answers', 'answer/recent') ?></li>
</ul>

