	<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	<hr>
	<p align="right">
	<small>
		<?php
			echo strftime('%A, %d de %B de %Y', strtotime('today'));$date = date(' | H:i:s');echo $date;echo "s";
		?>
	</small>
	</p>
</html>
