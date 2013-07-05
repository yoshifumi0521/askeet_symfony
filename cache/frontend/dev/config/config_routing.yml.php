<?php
// auto-generated by sfRoutingConfigHandler
// date: 2013/07/05 01:15:33
$routes = sfRouting::getInstance();
$routes->setRoutes(
array (
  'question' => 
  array (
    0 => '/question/show/:stripped_title',
    1 => '#^/question/show(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'stripped_title',
    ),
    3 => 
    array (
      'stripped_title' => 1,
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 'show',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'popular_questions' => 
  array (
    0 => '/index/list',
    1 => '#^/index/list$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 'list',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'recent_questions' => 
  array (
    0 => '/question/recent/:page',
    1 => '#^/question/recent(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'page',
    ),
    3 => 
    array (
      'page' => 1,
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 
      array (
        'recent,page' => 1,
      ),
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'login' => 
  array (
    0 => '/login',
    1 => '#^/login$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'user',
      'action' => 'login',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'recent_answers' => 
  array (
    0 => '/answer/recent/:page',
    1 => '#^/answer/recent(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'page',
    ),
    3 => 
    array (
      'page' => 1,
    ),
    4 => 
    array (
      'module' => 'answer',
      'action' => 
      array (
        'recent,page' => 1,
      ),
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'user_profile' => 
  array (
    0 => '/user/:nickname',
    1 => '#^/user(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'nickname',
    ),
    3 => 
    array (
      'nickname' => 1,
    ),
    4 => 
    array (
      'module' => 'user',
      'action' => 'show',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'add_question' => 
  array (
    0 => '/question/add',
    1 => '#^/question/add$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 'add',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'add_answer' => 
  array (
    0 => '/add_anwser',
    1 => '#^/add_anwser$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'answer',
      'action' => 'add',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'feed_popular_questions' => 
  array (
    0 => '/feed/popular',
    1 => '#^/feed/popular$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'feed',
      'action' => 'popular',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'user_require_password' => 
  array (
    0 => '/password_request',
    1 => '#^/password_request$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'user',
      'action' => 'passwordRequest',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'tag' => 
  array (
    0 => '/tag/:tag/:page',
    1 => '#^/tag(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'tag',
      1 => 'page',
    ),
    3 => 
    array (
      'tag' => 1,
      'page' => 1,
    ),
    4 => 
    array (
      'module' => 'tag',
      'action' => 'show',
      'page' => 1,
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'homepage' => 
  array (
    0 => '/',
    1 => '/^[\\/]*$/',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 'list',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default_symfony' => 
  array (
    0 => '/symfony/:action/*',
    1 => '#^/symfony(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 => 
    array (
      0 => 'action',
    ),
    3 => 
    array (
      'action' => 1,
    ),
    4 => 
    array (
      'module' => 'default',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default_index' => 
  array (
    0 => '/:module',
    1 => '#^(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'module',
    ),
    3 => 
    array (
      'module' => 1,
    ),
    4 => 
    array (
      'action' => 'index',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default' => 
  array (
    0 => '/:module/:action/*',
    1 => '#^(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 => 
    array (
      0 => 'module',
      1 => 'action',
    ),
    3 => 
    array (
      'module' => 1,
      'action' => 1,
    ),
    4 => 
    array (
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
)
);
