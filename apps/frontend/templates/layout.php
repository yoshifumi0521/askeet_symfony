<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php echo include_http_metas() ?>
<?php echo include_metas() ?>

<?php echo include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>

  <!--インジケーター -->
  <div id="indicator" style="display: none"></div>

  <div id="login" style="display: none">
    <h2>Please sign-in first</h2>

    <?php echo link_to_function('cancel', visual_effect('blind_up', 'login', array('duration' => 0.5))) ?>

  <?php echo form_tag('user/login', 'id=loginform') ?>
    nickname: <?php echo input_tag('nickname') ?><br />
    password: <?php echo input_password_tag('password') ?><br />
    <?php echo input_hidden_tag('referer', $sf_params->get('referer') ? $sf_params->get('referer') : $sf_request->getUri()) ?>
    <?php echo submit_tag('login') ?>

  </div>

  <div id="header">
    <!-- 認証をしているか？の判定メソッド。$sf_user->isAuthenticated()がtrueなら、認証されているということ-->
    <?php if ($sf_user->isAuthenticated()): ?>

      <li><?php echo link_to('logout', 'user/logout') ?></li>
      <!-- セッションに保存されている、nicknameを取り出す。-->
      <li><?php echo link_to($sf_user->getAttribute('nickname', '', 'subscriber').' profile', 'user/show') ?></li>

    <?php else: ?>

      <li><?php echo link_to('sign in/register', 'user/login') ?></li>

    <?php endif ?>
  </div>

  <div id="content">
    <div id="content_main">
      <?php echo $sf_data->getRaw('sf_content') ?>
      <div class="verticalalign"></div>
    </div>

    <!--コンポーネントが実行される。-->
    <?php include_component_slot('sidebar') ?>



  </div>

</body>
</html>