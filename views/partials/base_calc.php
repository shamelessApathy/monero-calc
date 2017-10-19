<?php
require_once('header.php');
?>

<div class='container'>
	
	<div class='col-md-4'></div>
	<div class='col-md-4'>
		<h4 style='text-align:center;'>Monero Calc</h4>
		<div class='mcalc-container'>
			<form name='calculator' id='calculator'>
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
			</form>
				<button id='calc-submit'>Submit</button>
		</div>
	</div>
	<div class='col-md-4'>
		<div id='return-data'>
			<p id='after-profit'></p>
			<p id='after-electric'></p>
			<p id='after-reward'></p>
		</div>
	</div>
</div>


<script src='/assets/js/jquery-3.1.2.js'></script>
<script src='/assets/js/ajax.js'></script>