#!/bin/sh

phpcs --config-set installed_paths ../../drupal/coder/coder_sniffer
cp /app/docroot/sites/example.settings.local.php /app/docroot/sites/default/settings.local.php
cp /app/lando/pre-commit.sh /app/.git/hooks/pre-commit
