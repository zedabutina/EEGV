	<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	<p align="right">
	<small>
		<?php 
			setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
			date_default_timezone_set('America/Sao_Paulo');
			echo strftime('%A, %d de %B de %Y', strtotime('today'));$date = date(' | H:i:s');echo $date;echo "s";
		?>
</small>
	</small>
	</p>
</html>
