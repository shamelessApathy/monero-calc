<?php

/*
Daily mining estimate =
( (your hashrate) * (current block reward) * 720 ) / (network hashrate)
*/
$hashrate = $_POST['hash-speed'];
$hash_unit = $_POST['hash-unit'];
$power_draw = $_POST['power-draw'] ?? null;
$pool_fee = $_POST['pool-fee'] ?? null;
$electric_cost = $_POST['electric-cost'] ?? null;
$block_reward = $_POST['block-reward'];
$global_hashrate = $_POST['global-hashrate'];

// Adjust hashrate for units of measurement
switch ($hash_unit)
{
	case 'kh' : $hashrate = $hashrate * 1000;
	break;
	case 'mh' : $hashrate = $hashrate * 1000000;
	break;
}


// Calculate daily reward
$reward_per_day = ($hashrate * $block_reward * 720 ) / $global_hashrate;

// Take out pool fee
$daily_pool_fee = $reward_per_day * ($pool_fee/100);
$adj_reward_per_day = $reward_per_day - $daily_pool_fee;

// Account for Electric
$kilowatts_per_day = ($power_draw * 24) / 1000;
$electric_cost = $electric_cost / 100;
$electric_per_day = $kilowatts_per_day * $electric_cost;
$exchange = $_POST['usd'] * $reward_per_day;
$cash_profit_per_day = $exchange - $electric_per_day;

$reward_per_day = round($reward_per_day,4);




?>
<!-- ###### DEBUG SECTION ##### -->

<div style='color:white;width:80%; margin:0 auto; background:#333'>
<h3 style='text-align:center;color:white;'> DEBUG SECTION </h3>
<?php
echo "Initial Post Info <br>";
echo "<pre style='color:white;padding:5px;'>";
print_r($_POST);
echo "</pre>";

echo "<div style='width:95%; margin:0 auto; height:5px; background-color:white;'></div>";

?>
<h4>After Calculations</h4>



<p>Reward Per Day: <?php echo $reward_per_day;?></p>
<p>Cash Reward Per Day: <?php echo $exchange;?></p>
<p>Profit: <?php echo $cash_profit_per_day;?></p>
<p>Electric Per Day: <?php echo $electric_per_day;?></p>
</div>