$(function(){
	var CalcForm = function()
	{
		this.init = function()
		{
			this.submit_button = document.getElementById('calc-submit');
			this.listeners = function()
			{
				$(this.submit_button).on('click', function(){
					this.serialize();
				}.bind(this))
			}
		}
		// Serialize Form Data for AJAX
		this.serialize = function()
		{
			var form = document.getElementById('calculator');
			var after = $(form).serialize()
			this.send(after);
		}
		this.addendum = function(results)
		{
			results = JSON.parse(results);
			$('#after-electric').html('Electric: ' + results['electric_per_day']);
			$('#after-profit').html('Profit: ' + results['cash_profit_per_day']);
			$('#after-reward').html('Total Reward: ' + results['reward_per_day']);
		}
		this.send = function(info)
		{
			var url = "/lib/mcalc.php";
			var data = info;
			console.log('getting to send function!');
			$.ajax({
					url: '/lib/mcalc.php',
					type: 'POST',
					data: data,
					success: function(results){
						this.addendum(results)
					}.bind(this)
				});
		}
		// Init functions
		this.init();
		this.listeners();
	}
	var calcform = new CalcForm;
})