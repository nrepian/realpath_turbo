#!/usr/bin/env php
# file was generated by <?=basename(__FILE__)?>; do not edit!

sudo: false
language: c

addons:
 apt:
  packages:
   - php5-cli
   - php-pear

env:
<?php
$gen = include "./travis/pecl/gen-matrix.php";
$env = $gen([
	"PHP" => ["5.4", "5.5", "5.6", "7.0", "7.1"],
	"enable_debug",
	"enable_maintainer_zts",
]);
foreach ($env as $e) {
	printf(" - %s\n", $e);
}
?>

before_script:
 - make -f travis/pecl/Makefile php
 - make -f travis/pecl/Makefile ext PECL=realpath_turbo

script:
 - make -f travis/pecl/Makefile test
