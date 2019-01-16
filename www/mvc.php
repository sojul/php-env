<?php
require_once __DIR__ . '/bootstrap.php';

$list = [
  'AAAA',
  'BBBB',
];

echo $engine->render('list.html.php', [
  'list' => $list,
]);
