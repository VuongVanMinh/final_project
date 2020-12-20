<div id="mini_profile">
	<div class="env dis_text">
	<div id="clock">
		<div id="time">
			<div><span id="hour">00</span><span class="size_span">Hours</span></div>
			<div><span id="minutes">00</span><span class="size_span">Minutes</span></div>
			<div><span id="seconds">00</span><span class="size_span">Seconds</span></div>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript">
	function clock(){
			var hours = document.getElementById('hour');
			var minutes = document.getElementById('minutes');
			var seconds = document.getElementById('seconds');
			var h = new Date().getHours();
			var m = new Date().getMinutes();
			var s = new Date().getSeconds();

			hours.innerHTML = h;
			minutes.innerHTML = m;
			seconds.innerHTML = s;
		}
		var interval = setInterval(clock,1000);
</script>