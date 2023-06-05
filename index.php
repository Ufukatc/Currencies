<?php 
require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1> Akbank kurları</h1>
<ul>

   <!--akbank-->
    <?php  foreach ($akbank as  $key => $kur): ?>
        <li>
            <?= $key ?> <br>
            ALIŞ: <?= $kur['alis']?> <br>
            SATIŞ: <?= $kur['satis']?> <br>
            <div style="color: <?=$kur['oran'] > 0 ? 'green' : 'red'?>;">
                Oran: %<?=number_format($kur['oran'], 2)?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<hr>
<!--is bank-->
<h1> İş Bankası kurları</h1>
<ul>
    <?php  foreach ($isbankasi as  $key => $kur): ?>
        <li>
            <?= $key ?> <br>
            ALIŞ: <?= $kur['alis']?> <br>
            ORAN: <?= $kur['oran']?> <br>
            <div style="color: <?=$kur['oran'] > 0 ? 'green' : 'red'?>;">
                Oran: %<?=number_format($kur['oran'], 2)?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>