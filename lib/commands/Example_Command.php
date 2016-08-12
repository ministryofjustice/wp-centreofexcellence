<?php

namespace Roots\Sage\Commands;

use WP_CLI;
use WP_CLI_Command;

class Example_Command extends WP_CLI_Command {

  /**
   * Example Command
   */
  public function __invoke() {
    WP_CLI::log('This command does nothing in particular.');
  }

}
