<?php



//Simple Public Get API
$url = "https://moneroblocks.info/api/get_stats";
// Make Request
$info = file_get_contents($url);
// Digest JSON into a php array (FLAG 2)
$info = json_decode($info,2);
$difficulty = $info['difficulty'];
// Turning bytes into MH/s for easy reading
$global_hashrate = $info['hashrate'];
$global_hashrate_easy = floor($info['hashrate'] / 1000000);
$total_circulation = $info['total_emission'];

// Calclulate total supply, this is taken directly from cryptonote man pages
// https://cryptonote.org/whitepaper.pdf  ATOMIC  UNIT for monero = 1e12  not fucking defined anywhere
// Had to go to freenode IRC #monero-dev to get an answer
$total_supply = pow(2,64) * 1e-12;
$base_reward = ($total_supply - $total_circulation) >> 18;

$divided = $base_reward * 1e-12;

$actual_reward = $divided / 2;

$total_circulation = substr($total_circulation,0, -12);

// Get Current Exchange Rate from API
$currency_url = "https://min-api.cryptocompare.com/data/price?fsym=XMR&tsyms=USD";
$currency_info = file_get_contents($currency_url);
$currency_info = json_decode($currency_info, 2);

$data_array = array(
		'total_supply'=> $total_supply,
		'base_reward' => $base_reward,
		'actual_reward' => $actual_reward,
		'total_circulation' => $total_circulation,
		'difficulty' => $difficulty,
		'global_hashrate_easy' => $global_hashrate_easy,
		'global_hashrate'=> $global_hashrate,
		'exchange_rate' => $currency_info
	);

return $data_array;
/*
*
* To calculate current block reward I am using this formula
* The Monero block reward = (M - A) * 2^-20 * 10^-12, where A = current circulation.
*/

//$block_reward = ($total_supply - $total_circulation) * (pow(2,-20) * pow(10,-12));







