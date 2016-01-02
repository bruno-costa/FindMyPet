<!DOCTYPE html>
<html>

<?php require '../defaults/head.html';?>

<body>
	<div class="w3-row">
		<div ng-app="FindMyPet" ng-controller="CtrlJSON as json" id="conteudo"
		class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
			<angularJS ng-init="json.getClasses()"></angularJS>
			<angularJS ng-init="json.getEspecies()"></angularJS>
			<angularJS ng-init="json.getEspecies_classe()"></angularJS>
			<angularJS ng-init="json.getRacas()"></angularJS>
			<angularJS ng-init="json.getRacas_especie()"></angularJS>
			<angularJS ng-init="json.getRedesSociais()"></angularJS>
			<div id="butoes"><a href="./default.php"><h1 class="My-header w3-center w3-jumbo w3-cyan w3-card-8 w3-padding-xlarge">Find My Pet</h1></a></div>

			<div id="menu" class="w3-row">
				<h2>ACHADOS</h2>
				<div>
					<?php
					$origem = 'a';
					require '../defaults/menu.php';
					?>
				</div>
				

			</div>
	
		</div>
	</div>
</body>
</html>