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


$send_back = array(
		'kilowatts_per_day'=>$kilowatts_per_day,
		'electric_cost'=> $electric_cost,
		'electric_per_day' => $electric_per_day,
		'cash_profit_per_day' => $cash_profit_per_day,
		'reward_per_day'=>$reward_per_day
	);

$send_back = json_encode($send_back);
echo $send_back;

?>
