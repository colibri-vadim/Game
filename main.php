<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script>
    window.onload = function() {
      var click = document.getElementById("clicke");
      var a = "<?=session_start(); ?>"
      var val = "<?= $_SESSION['cookie']; ?>";
      click.value = val;
    }
    </script>
  </head>
  <body>

  </body>
</html>

<?php
//session_start();
require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('FrAnCuZ');
$app->initLayout('Centered');
$user = new User($db);
$user->load($_SESSION['user_id']);
$_SESSION['cookie'] = $user['clicker_count'];
$user->unload();

//  $image = $app->add(["Image","https://cs-justplay.com/templates/united/img/vak_ban_v_ks_go_2.png","centered"]);

  $columns = $app->add('Columns');
  $col_1 = $columns->addColumn(4);
  $col_2 = $columns->addColumn(8);
  $col_3 = $columns->addColumn(4);

  $slicer = $col_2->add(['View','template' => new \atk4\ui\Template('
  <div id="{$_id}" class="ui statistic">
    <input type="button" id="clicke" value=0 onclick=Clicker() style="width:300px;height:100px;background-color:Blue


;color:white;font-size:35px;">
  </div>
  <script>
    function Clicker() {
      var click = document.getElementById("clicke");
      click.value = parseInt(click.value) + 1;
    }
  </script>')]);


  $save = $col_2->add(['View','template' => new \atk4\ui\Template('
<div id="{$_id}" class="ui statistic">
  <input type="button" value="Save" onclick=Save() style="width:500px;height:100px;background-color:green;color:white;font-size:35px;">
</div>
<script>
  function Save() {
    var click = document.getElementById("clicke");
    var link = \'save.php?val=\'+click.value;
    window.open(link);
  }
</script>')]);



//$val = $col_2->add(['FormField/Line', '432']);

//$clicker = $col_2->add(["Button","Click!","inverted teal fluid big"]);

$exit = $app->add(['Button',"EXIT","inverted red"]);
$exit->link(["exit"]);

//$clicker->js('click', new \atk4\ui\jsReload($val, ['val' => $val->jsInput()->val(new \atk4\ui\jsExpression('parseInt([])+1', [$val->jsInput()->val()]), $val->jsInput()->focus())]));

$x2 = $col_3->add(["Button","click x2","inverted orange"]);

$pus = $col_3->add(["Button","+0.5 cli/sek","inverted orange"]);
