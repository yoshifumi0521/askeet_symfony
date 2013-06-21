<?php
// auto-generated by sfPropelCrud
// date: 2013/06/19 21:53:31

  // var_dump(sfConfig::get('app_pager_homepage_max'));


?>

<?php use_helper('Text') ?>

<h1>popular questions</h1>

<?php foreach($question_pager->getResults() as $question): ?>
  <div class="question">

    <div class="interested_block">
      <div class="interested_mark" id="mark_<?php echo $question->getId() ?>">
        <?php echo $question->getInterestedUsers() ?>
      </div>
    </div>

    <h2><?php echo link_to($question->getTitle(), 'question/show?stripped_title='.$question->getStrippedTitle() ) ?></h2>

    <div class="question_body">
      <?php echo truncate_text($question->getBody(), 200) ?>
    </div>
  </div>
<?php endforeach;?>

<div id="question_pager">
<?php if ($question_pager->haveToPaginate()): ?>
  <?php echo link_to('&laquo;', 'question/list?page=1') ?>
  <?php echo link_to('&lt;', 'question/list?page='.$question_pager->getPreviousPage()) ?>

  <?php foreach ($question_pager->getLinks() as $page): ?>
    <?php echo link_to_unless($page == $question_pager->getPage(), $page, 'question/list?page='.$page) ?>
    <?php echo ($page != $question_pager->getCurrentMaxLink()) ? '-' : '' ?>
  <?php endforeach; ?>

  <?php echo link_to('&gt;', 'question/list?page='.$question_pager->getNextPage()) ?>
  <?php echo link_to('&raquo;', 'question/list?page='.$question_pager->getLastPage()) ?>
<?php endif; ?>
</div>

<?php echo link_to ('create', 'question/create') ?>






