#!/bin/sh

phpcs --config-set installed_paths ../../drupal/coder/coder_sniffer
cp docroot/sites/example.settings.local.php docroot/sites/default/settings.local.php
cp pre-commit.sh .git/hooks/pre-commit
