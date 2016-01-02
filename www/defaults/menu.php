<section id="menu" ng-controller="CtrlMenu as menu" class="w3-padding-8">
	<ul class="nav nav-pills w3-xlarge w3-padding-8">
		<li >
			<a href ng-class="menu.cor[0]" ng-click="menu.selecTab(0)" class="w3-btn"><span class="glyphicon glyphicon-list"></span></a></li>
		<li >
			<a href ng-class="menu.cor[1]" ng-click="menu.selecTab(1)" class="w3-btn"><span class="glyphicon glyphicon-search"></span></a></li>
		<li >
			<a href ng-class="menu.cor[2]" ng-click="menu.selecTab(2)" class="w3-btn"><span class="glyphicon glyphicon-plus"></span></a></li>
	</ul>
	<div ng-if="menu.isSelected(2)">
		<?php
		require 'novo.php';
		?>
	</div>
	<div ng-if="menu.isSelected(0) || menu.isSelected(1)">
		<?php
		require 'list.php';
		?>
	</div>
</section>