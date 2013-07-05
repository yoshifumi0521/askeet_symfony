<?php include_partial('sidebar/default') ?>

<!--タグを表示 -->
<h2>question tags</h2>

<!--　タグを表示する。Question.phpで拡張した、getTagsメソッドを使う。-->
<ul id="question_tags">
    <?php foreach($question->getTags() as $tag): ?>
        <li><?php echo link_to($tag, '@tag?tag='.$tag, 'rel=tag') ?></li>
    <?php endforeach; ?>
</ul>


