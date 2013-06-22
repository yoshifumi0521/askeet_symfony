<?php
  // auto-generated by sfPropelCrud
  // date: 2013/06/19 21:53:31
  // var_dump($sf_user->isAuthenticated());
  // var_dump($sf_request->getAttribute('referer'))
  //バリデーションを使うためのモジュール
  use_helper('Validation')

?>

<?php echo form_tag('user/login') ?>

  <fieldset>

  <div class="form-row">
    <?php echo form_error('nickname') ?>
    <label for="nickname">nickname:</label>
    <?php echo input_tag('nickname', $sf_params->get('nickname')) ?>
  </div>

  <div class="form-row">
    <?php echo form_error('password') ?>
    <label for="password">password:</label>
    <?php echo input_password_tag('password') ?>
  </div>

  </fieldset>

  <!--ここのページに来たときの元のページのurlを取得して、パラメーターとして渡す。 -->
  <?php echo input_hidden_tag('referer', $sf_request->getAttribute('referer')) ?>
  <?php echo submit_tag('sign in') ?>

</form>