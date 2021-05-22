<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\ChangeNote\ChangeNotes;
use App\Models\MyModel;

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
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attribute Test</title>
</head>
<body>
<h3>Model 1</h3>
<pre> <?= var_dump($model1) ?> </pre>
<h3>Model 2</h3>
<pre> <?= var_dump($model2) ?> </pre>
<h3>Changes</h3>
<pre> <?= var_dump($changes) ?> </pre>

<hr>
<?php
foreach ($changes as $change): ?>
    <p>
        <?= $change->name ?> changed from <b><?= $change->from ?> </b> to <b> <?= $change->to ?></b>
    </p>
<?php
endforeach; ?>
<hr>
</body>
</html>

