<?php
require_once('header.php');
?>

<div class='container'>
	
	<div class='col-md-4'></div>
	<div class='col-md-4'>
		<h4 style='text-align:center;'>Monero Calc</h4>
		<div class='mcalc-container'>
			<form action='/lib/mcalc.php' name='calculator' method='POST'>
				<label>Monero to USD</label>
				<input type='text' name='usd' value="<?php echo $data_array['exchange_rate']['USD'];?>"/>
				<label>Hash Speed</label>
				<input type='text' id='mcalc-inline' name='hash-speed'/>
				<select id='mcalc-inline' name='hash-unit'>
					<option value='hs'>h/s</option>
					<option value='kh'>Kh/s</option>
					<option value='mh'>Mh/s</option>
				</select>
				<label>Power Draw <span class='tiny'>in watts</span></label>
				<input type='text' name='power-draw'/>
				<label>Cost per Kilowatt hour <span class='tiny'>in cents</span></label>
				<input type='text' name='electric-cost'/>
				<label>Pool Fee %</label>
				<input type='text' name='pool-fee'/>
				<label>Total Supply</label>
				<input type='text' name='total-supply' value="<?php echo $data_array['total_supply'];?>" readonly/>
				<label>Current Block Reward</label>
				<input type='text' name='block-reward' value="<?php echo $data_array['actual_reward'];?>" readonly/>
				<label>Difficulty</label>
				<input type='text' name='difficulty' value="<?php echo $data_array['difficulty'];?>" readonly/>
				<label>Global Hashrate <super>In bytes</super></label>
				<input type='text' name='global-hashrate' value="<?php echo $data_array['global_hashrate'];?>" readonly />
				<button type='submit'>Submit</button>
			</form>
		</div>
	</div>
	<div class='col-md-4'></div>
</div>

<?php
    require_once("footer.php");
?>