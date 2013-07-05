<?php

    use_helper('Text');
?>

<h1>popular questions for tag "<?php echo $sf_params->get('tag') ?>"</h1>

<?php foreach($question_pager->getResults() as $question): ?>
  <div class="question">

    <div class="interested_block">
      <div class="interested_mark" id="mark_<?php echo $question->getId() ?>">
        <?php echo $question->getInterestedUsers() ?>
      </div>
    </div>

    <h2><?php echo link_to($question->getTitle(), '@question?stripped_title='.$question->getStrippedTitle() ) ?></h2>

    <div class="question_body">
      <?php echo truncate_text($question->getHtmlBody(), 200) ?>
    </div>

  </div>
<?php endforeach;?>

