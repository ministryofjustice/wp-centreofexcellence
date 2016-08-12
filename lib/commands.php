<?php

namespace Roots\Sage\Commands;

// WP_CLI class only exists when running via the command line
if (!class_exists('\WP_CLI')) {
  return;
}

use WP_CLI;

$commands = array(
  // 'Example_Command',
);

/**
 * Create a command name slug from the supplied class name.
 * 'Example_Command' will become 'example-command'
 *
 * @param string $class_name
 * @return string
 */
function slug_command_name($class_name) {
  $name = strtolower($class_name);
  $name = str_replace('_', '-', $name);
  return $name;
}

// Register commands from $commands array
foreach ($commands as $command) {
  $command_name = slug_command_name($command);
  $class_name = __NAMESPACE__ . '\\' . $command;

  require 'commands/' . $command . '.php';
  WP_CLI::add_command($command_name, $class_name);
}
