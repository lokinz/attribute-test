<?php 
require_once __DIR__ . '/../vendor/autoload.php';

use App\ChangeNotes;
use App\main;
use App\MyModel;

$main = new main();

$model1 = new MyModel();
$model2 = new MyModel();

$model2->getLogs = true;
$model2->foo = 'I changed but no one saw';

//$changes = ChangeNotes::getChanges($model1, $model2);
//var_dump($changes);

$model2->ip = '192.168.0.200';

//$changes = ChangeNotes::getChanges($model1, $model2);
//var_dump($changes);

$model1->gpsTraceId = '1235';

$changes = ChangeNotes::getChanges($model1, $model2);
echo '<h3>Model 1</h3>';
echo '<pre>' . var_dump($model1) . '</pre>';
echo '<h3>Model 2</h3>';
echo '<pre>' . var_dump($model2) . '</pre>';
echo '<h3>Changes</h3>';
echo '<pre>' . var_dump($changes) . '</pre>';
echo "<hr>";

foreach ($changes as $change)
{
    echo "<p>$change->name changed from <b>$change->from</b> to <b>$change->to</b></p>";
}

echo "<hr>";
//$changes = ChangeNotes::getChanges($main, $model2);
