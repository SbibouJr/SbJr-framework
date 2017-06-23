<?php
    session_start();

	$route = "welcome";
	if(false) {
		$route = "maintenance";
	}
?>

<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />

		<!-- ************* DEV ************** --><link rel="stylesheet/less" href="./style/style.less" />
		<!-- ************* PROD ************** --><!-- <link rel="stylesheet" href="./style/style.css" /> -->

		<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet"> 
 		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

		<meta name="viewport" content="width=device-width, height=device-height,initial-scale=1, minimum-scale=1, maximum-scale=1, minimal-ui"/>

		<title>Sbjr Framework</title>
		<meta name="description" content="Sbjr Framework"/>

	</head>

	<body>

		<?php
			require_once("app/views/header.php");
		?>

		<div class="bodyPage">
			<?php
				if($route === "welcome"){
					require_once("app/controllers/welcome.php");
					require_once("app/controllers/contact.php");
				}
				elseif($route === "maintenance"){
					require_once("app/views/maintenance.php");
				}
			?>
		</div>

		<?php
			require_once("app/views/footer.php");

			if(!isset($_SESSION["stat"])){
				$_SESSION["stat"] = false;
			}
			if($_SESSION["stat"] == false){
				require_once("app/class/Connection.php");
				require_once("app/class/Statistics.php");
				require_once("app/class/StatisticsDAO.php");

				$statisticsDAO = new StatisticsDAO();
				$origin = "inconnu";
				if(isset($_SERVER["HTTP_REFERER"])){
					$origin = $_SERVER["HTTP_REFERER"];
				}
				$statisticsDAO->update(date('d/m/Y'), $origin);
		    
		 		$_SESSION["stat"] = true;
			}
		?>

		<!-- ************* DEV ************** --> <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script>

		<script type="text/javascript" src="./script/script.js"></script>

		<!-- ************* DEV ************** --><script type="text/javascript">//window.addEventListener("load", function(){ setInterval(function(){ window.location.reload(); },10000); });</script>

	</body>
</html>