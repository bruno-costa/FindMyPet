<form name="novoAnimal" class="w3-padding-16 form-horizontal"
ng-controller="CtrlForm as form"  novalidate
ng-submit="novoAnimal.$valid && form.addAnimal()" >
	<angularJS ng-init=<?php echo '"form.pedido = \''.$origem.'\'"';?>></angularJS>
	<angularJS ng-init="this.redesSociais = json.redesSociais"></angularJS>
	<!-- Especie e Sexo-->
	<div class="form-group">

		<!-- Especie -->
		<label class="col-sm-2 control-label">Espécie</label>
		<div class="col-sm-5">
			<select ng-model="form.animal.especie" class="form-control" required
			ng-click="form.racas = json.racas_especie[json.especies[form.animal.especie]].slice(1); form.animal.raca = null;">
				<optgroup ng-repeat="classe in json.classes" label="{{classe}}" />
				<option ng-repeat="especie in json.especies_classe[classe] | limitTo: 1-json.especies_classe[classe].length"
				value="{{especie.id}}">{{especie.nome}}</option>
			</select>
		</div>

		<!-- Sexo -->
		<label class="col-sm-2 control-label">Sexo</label>
		<div class="col-sm-3"><div formSexo class="form-control"
			ng-class="{formInvalid : form.animal.sexo===undefined, formValid : form.animal.sexo!==undefined}">
			<label><input ng-model="form.animal.sexo" type="radio" name="sexo"
			value="m" required />&nbsp;&nbsp;<i class="w3-text-cyan ion-male my-sexo-icon"></i></label> &nbsp;&nbsp;&nbsp;&nbsp;
			<label><input ng-model="form.animal.sexo" type="radio" name="sexo"
			value="f" required />&nbsp;&nbsp;<i class="w3-text-pink ion-female my-sexo-icon"></i></label>
		</div></div>
	</div>

	<!-- Raca -->
	<div class="form-group">
		<label class="col-sm-2 control-label">Raça</label>
		<div class="col-sm-5">
			<select class="form-control" ng-model="form.animal.raca" required>
				<option ng-repeat="raca in form.racas" value="{{raca.id}}">{{raca.nome}}</option>
			</select>
		</div>
	</div>

	<!-- Descricao -->
	<div class="form-group">
		<label class="col-sm-2 control-label">Descrição</label>
		<div class="col-sm-10"><textarea ng-model="form.animal.descricao"
		class="form-control" rows="3" maxlength="500"
		placeholder="Cidade, região e mais caracteristicas que podem ajudar a identificar o animal ...">
		</textarea></div>
	</div>

	<!-- Link -->
	<div class="form-group">
		<label class="col-sm-2 col-xs-12 control-label">Link</label>
		<div class="col-sm-8 col-xs-10"><input name="link" maxlength="250" ng-model="form.animal.link" type="url"
			class="form-control" placeholder="facebook, instagram ..." required></div>
		<img ng-show="form.getImg(novoAnimal.link.$valid, json.redesSociais)" class="col-xs-2 w3-center"
		ng-src="./img/tmb/{{json.redesSociais[form.animal.redeSocial]}}.png"/>

	</div>


	<!-- Butoes -->
	<div class="form-group">
		<div class="col-xs-4 col-xs-offset-2 col-sm-3 col-sm-offset-3"><button ng-disabled="novoAnimal.$invalid" type="submit"
		class="w3-btn w3-light-green form-control">
			<span class="glyphicon glyphicon-ok"></span></button></div>
		<div class="col-xs-4 col-sm-3"><button ng-click="form.reset()" type="button"
		class="w3-btn w3-red form-control">
			<span class="glyphicon glyphicon-remove"></span></button></div>
	</div>
</form>