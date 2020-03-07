<?php
session_start();
require 'vendor/autoload.php';

$app = new \atk4\ui\App('FrAnCuZ');
$app->initLayout('Centered');

$clicker_name = $app->add(["Header","Colibri Clicker","huge centered"]);

$button_new = $app->add(["Button","Log in","inverted green","icon"=>"power off"]);

$button_new->on('click',  function() {
      return new \atk4\ui\jsExpression("document.location = 'login.php' ");
  });

$button_reg = $app->add(["Button","Registration","inverted green","iconRight"=>"arrow circle right"]);
$button_reg->link('reg.php');
