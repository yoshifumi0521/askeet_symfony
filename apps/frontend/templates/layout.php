<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php echo include_http_metas() ?>
<?php echo include_metas() ?>

<?php echo include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>

  <div id="header">
    <!-- 認証をしているか？の判定メソッド。$sf_user->isAuthenticated()がtrueなら、認証されているということ-->
    <?php if ($sf_user->isAuthenticated()): ?>
      <li><?php echo link_to('logout', 'user/logout') ?></li>
      <li><?php echo link_to($sf_user->getAttribute('nickname', '', 'subscriber').' profile', 'user/profile') ?></li>
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