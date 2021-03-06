<?php
// auto-generated by sfPropelCrud
// date: 2013/06/19 21:53:31
    use_helper('Date');
    //UserHelper.phpを読み取る。
    use_helper('User');
    // var_dump($sf_user->getAttribute('subscriber_id', '', 'subscriber') );


?>

<div class="interested_block">
    <div class="interested_mark" id="mark_<?php echo $question->getId() ?>">
        <!-- ここからAjaxでかき変わるところbetween here -->
        <?php echo $question->getInterestedUsers() ?>
    </div>
</div>

<!-- 興味を追加する。 -->
<?php echo link_to_user_interested($sf_user, $question) ?>
<!-- and there -->

<h2><?php echo $question->getTitle() ?></h2>

<div class="question_body">
    <!-- マークダウンしたもの、$question->getHtmlBody()を出力する。 -->
    <?php echo $question->getHtmlBody() ?>
    <div>
        asked by <?php echo link_to($question->getUser(),'@user_profile?nickname='.$question->getUser()->getNickname()) ?>
        on <?php echo format_date($question->getCreatedAt(), 'f') ?>
    <div>
</di>

<div id="answers">
    <?php foreach($question->getAnswers() as $answer ): ?>
        <div class="answer">
            <?php echo $answer->getRelevancyUpPercent()?>% UP <?php echo $answer->getRelevancyDownPercent() ?>% DOWN
            posted by <?php echo $answer->getUser() ?>
            on <?php echo format_date($answer->getCreatedAt(), 'p') ?>
            <div>
                <?php echo $answer->getBody() ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!--新しく追加する答え -->
<div class="answer" id="add_answer">



</div>

<!-- 回答をする -->
<div class="answer" id="add_answer">

    <?php echo form_remote_tag(array(
        'url'      => '@add_answer',
        'update'   => array('success' => 'add_answer'),
        'loading'  => "Element.show('indicator')",
        'complete' => visual_effect('highlight', 'add_answer'),
    )) ?>

    <div class="form-row">
        <!--ログインしている場合 -->
        <?php if ($sf_user->isAuthenticated()): ?>
            <?php echo $sf_user->getAttribute('nickname', '', 'subscriber') ?>
        <?php else: ?>
        <!-- ログインしてない場合 。その場合、匿名にする。Anonymous Cowardは、匿名という意味　-->
            <?php echo 'Anonymous Coward' ?>
            <?php echo link_to_login('login') ?>
        <?php endif; ?>
    </div>

    <div class="form-row">
        <label for="label">Your answer:</label>
        <?php echo textarea_tag('body', $sf_params->get('body')) ?>
    </div>

    <div class="submit-row">
        <?php echo input_hidden_tag('question_id', $question->getId()) ?>
        <?php echo submit_tag('answer it') ?>
    </div>

    </form>

</div>

&nbsp;<?php echo link_to('list', 'question/list') ?>
