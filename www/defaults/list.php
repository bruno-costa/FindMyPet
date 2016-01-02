<div ng-controller="CtrlLista as lista" class="table-responsive">
	<angularJS ng-init=<?php echo '"lista.pedido =\''.$origem.'\'"' ?>></angularJS>

	<!-- Modal -->
	<div class="modal fade in" id="modalConcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1 class="modal-title w3-center" id="myModalLabel"> {{lista.pedido == 'p' ? "PERDIDOS" : "ACHADOS"}}</h1>
			</div>
			<div class="modal-body" ng-show="lista.modal == 1"><div class="container-fluid">
				<div class="row">
					<div class="col-xs-10">
						<div class-"row">
							<div class="col-sm-6">
								<div class="w3-center">
									<p class="my-cont-info w3-padding-16 w3-xlarge">{{json.racas[lista.animal.raca_ID]}}</p>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="w3-center">
									<p class="my-cont-info w3-padding-16 w3-xlarge">{{json.especies[lista.animal.especie_ID]}}</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-11">
								<p class="my-cont-info w3-padding-16 my-first-letter-big">
									&nbsp;&nbsp;{{lista.animal.descricao == null ? "Sem Descrição" : lista.animal.descricao}}
								</p>
							</div>
						</div>
					</div>
					<div class="col-xs-2">
						<div class="row w3-center">
							<div class="col-xs-12">
								<h1 class="w3-jumbo {{(lista.animal.sexo === 'f' ? 'w3-text-pink ion-female' : 'w3-text-cyan ion-male')}}"></h1>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 w3-padding-32">
								<a class="w3-center" style="text-decoration: none" ng-href="{{lista.animal.link}}" target="_blank">
									<div class="row">
										<img class="col-xs-12" ng-src="./img/tmb/{{json.redesSociais[lista.animal.redeSocial_ID]}}.png"/>
									</div>
									<div class="row">
										<h4>Ir para o post</h4>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div></div>
			<div class="modal-body" ng-show="lista.modal == 2"><div class="container-fluid">
				<h4>Por Favor</h4>
				<p>Tenha certeza para concluir pois uma vez concluido o registro do animal estará indisponivel para pesquisa no FindMyPet</p>

				<hr>

				<form name="conclContato" novalidate>
				  <div class="form-group">
				    <h4>Contato</h4>
				    <input type="email" class="form-control" placeholder="Email" ng-model="lista.contato" required>
				  </div>
				</form>
			</div></div>
			<div class="modal-footer" ng-show="lista.modal == 1" >
				<div class="col-xs-4 col-xs-offset-2 col-sm-3 col-sm-offset-3">
					<button class="w3-btn w3-grey-l2 form-control" data-dismiss="modal">Fechar</button>
				</div>
				<div class="col-xs-4 col-sm-3">
					<button ng-click="lista.modal = 2" class="w3-btn w3-yellow form-control">?????</button>
				</div>
			</div>
			<div class="modal-footer" ng-show="lista.modal == 2" >
				<div class="col-xs-4 col-xs-offset-2 col-sm-3 col-sm-offset-3">
					<button ng-click="lista.modal = 1" class="w3-btn w3-indigo-l1 form-control">Voltar</button>
				</div>
				<div class="col-xs-4 col-sm-3">
					<button class="w3-btn w3-teal form-control" ng-click="lista.concluir()" ng-disabled="lista.contato == null">Concluir</button>
				</div>
			</div>
		</div>
	</div>
	</div>

	<!-- Search -->
	<div ng-show="menu.isSelected(1)">
	<form class="form-inline">
		<div class="form-group my-inline-form">
			<label class="w3-checkbox">
				<input type="checkbox" ng-checked="lista.filtro.especie_ID" ng-click="lista.filtro.especie_ID = null"/>
				<div class="w3-checkmark"></div>
			</label>&nbsp;&nbsp;
			<select class="form-control" ng-model="lista.filtro.especie_ID">
				<option value="" selected>Espécie</option>
				<optgroup ng-repeat="classe in json.classes" label="{{classe}}" />
				<option ng-repeat="especie in json.especies_classe[classe] | limitTo: 1-json.especies_classe[classe].length"
				value="{{especie.id}}">{{especie.nome}}</option>
			</select>
		</div>
		<div class="form-group my-inline-form">
			<label class="w3-checkbox">
				<input type="checkbox" ng-checked="lista.filtro.descricao" ng-click="lista.filtro.descricao = null"/>
				<div class="w3-checkmark"></div>
			</label>&nbsp;&nbsp;
			<input type="text" class="form-control" placeholder="Descrição" ng-model="lista.filtro.descricao">
		</div>
		<div class="form-group my-inline-form">
			<label class="w3-checkbox">
				<input type="checkbox" ng-checked="lista.filtro.sexo" ng-click="lista.filtro.sexo = null"/>
				<div class="w3-checkmark"></div>
			</label>&nbsp;&nbsp;
			<div formSexo class="form-control formValid">
				<label><input ng-model="lista.filtro.sexo" type="radio" name="sexo"
				value="m" />&nbsp;&nbsp;<i class="w3-text-cyan ion-male my-sexo-icon"></i></label>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input ng-model="lista.filtro.sexo" type="radio" name="sexo"
				value="f" />&nbsp;&nbsp;<i class="w3-text-pink ion-female my-sexo-icon"></i></label>
			</div>
		</div>
	</form>
	</div>

	<!-- Table -->
	<h3 ng-show="lista.filtro.sexo || lista.filtro.especie_ID || lista.filtro.descricao">
		Resultado da Pesquisa
	</h3>
	<table class="table table-hover table-striped table-bordered">
		<angularJS ng-init="lista.getAnimais()"></angularJS>
		<thead>
			<tr>
				<th>Espécie</th>
				<th>Raça</th>
				<th>Sexo</th>
				<th>Descrição</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="animal in lista.animais | filter : lista.filtroFunc" ng-click="lista.animal = animal"
			data-toggle="modal" data-target="#modalConcluir">

				<td style="vertical-align: middle" class="col-sm-2" >{{json.especies[animal.especie_ID]}}</td>
				<td style="vertical-align: middle" class="col-sm-2">{{json.racas[animal.raca_ID]}}</td>
				<td style="vertical-align: middle" class="col-sm-1 w3-center my-sexo-icon" >
					<i class="{{(animal.sexo === 'f' ? 'w3-text-pink ion-female' : 'w3-text-cyan ion-male')}}"/>
				</td>
				<td style="vertical-align: middle" class="col-sm-6">{{(animal.descricao.length > 100 ? animal.descricao.slice(0, 97)+'...' : animal.descricao)}}</td>
				<td style="vertical-align: middle" class="col-sm-1 w3-center"> <img ng-src="./img/inline/{{json.redesSociais[animal.redeSocial_ID]}}.png"/> </td>
			</tr>
		</tbody>
	</table>
</div>