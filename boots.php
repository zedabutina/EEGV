<br/>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Sistema Acadêmico</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">	
						
				<?php
					session_start();
					if(isset($_SESSION['login'])){
						echo "<li><a href='menu.php'>Menu</a></li>";
						echo "<li><a href='logout.php'>Logout</a></li>";
					}else{
						echo "<li><a href='login.php'>Login</a></li>";
					}
				?>
					</ul>
				</div>
			</div>
		</nav>
