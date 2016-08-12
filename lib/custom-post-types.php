<?php

namespace Roots\Sage\CPT;

$path = dirname(__FILE__) . '/cpt/';
$files = scandir($path);
$files = array_filter($files, function ($f) {
  return substr($f, 0, 1) !== '.';
});

$customPostTypes = array();

foreach ($files as $file) {
  $cpt = require_once $path . $file;
  $customPostTypes[$cpt->postType] = $cpt;
}
