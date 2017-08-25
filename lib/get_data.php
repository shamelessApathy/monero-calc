<?php



//Simple Public Get API
$url = "https://moneroblocks.info/api/get_stats";
// Make Request
$info = file_get_contents($url);
// Digest JSON into a php array (FLAG 2)
$info = json_decode($info,2);

$total_circulation = $info['total_emission'];

// Calclulate total supply, this is taken directly from cryptonote man pages
// https://cryptonote.org/whitepaper.pdf  ATOMIC  UNIT for monero = 1e12  not fucking defined anywhere
// Had to go to freenode IRC #monero-dev to get an answer
$total_supply = pow(2,64) * 1e-12;
$base_reward = ($total_supply - $total_circulation) >> 18;

$divided = $base_reward * 1e-12;

$actual_reward = $divided / 2;

echo $actual_reward;
/*
*
* To calculate current block reward I am using this formula
* The Monero block reward = (M - A) * 2^-20 * 10^-12, where A = current circulation.
*/

//$block_reward = ($total_supply - $total_circulation) * (pow(2,-20) * pow(10,-12));











## FOR DEBUGGING ## 
## really need to start using xdebug instead ##

?>
<div style='color:white;width:80%; margin:0 auto; background:#333'>
<h3 style='text-align:center;color:white;'> DEBUG SECTION </h3>
<?php
echo "<pre style='color:white;padding:5px;'>";
print_r($info);
echo "</pre>";

echo "String Changed: ". $corrected;
echo "<br>";
var_dump($corrected);
echo "<br>";
var_dump($block_reward);
?>
</div>