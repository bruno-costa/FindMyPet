
(function() {

	var rs_unknown = 1;

	var corAtiva = 'w3-purple';
	var corDesativa = 'w3-deep-purple';

	var app = angular.module('FindMyPet', []);

	app.controller('CtrlMenu', function () {


		this.tab = 0;
		this.cor = [corAtiva, corDesativa, corDesativa];

		this.selecTab = function(setTab) {
			if (setTab == 1 && setTab == this.tab) {
				this.selecTab(0);
			}
			this.cor[this.tab] = corDesativa;
			this.tab = setTab;
			this.cor[this.tab] = corAtiva;
		};
		this.isSelected = function(checkTab) {
			return this.tab === checkTab;
		};
	});

	app.controller('CtrlForm', ['$http', function($http) {
		var form = this;

		this.pedido       = "";
		this.animal       = {};
		//this.redesSociais = {};

		this.classes = [];
		this.racas   = [];

		this.put = "";


		this.addAnimal = function() {
			$http.post('./util/salvaDB.php', {animal: this.animal, pedido: this.pedido}).
			then(function(response) {

				if (response.data.sucess) {
					alert("Gravado com sucesso! ");
					
					form.animal = {};
				} else{
					alert("Ouve um erro durante a gravação:"+response.data.msg);// atenção com o response.data
				};
			}, function(response) {
				alert("fail@addAnimal");
				//gerar log
			});
		};
		this.reset = function() {

			this.animal = {};
		};
		this.getImg = function(go, vet) {
			if (go) {
				var rs = new RegExp("\\w+\\.(com|net|in)", "ig").exec(form.animal.link);
				if (rs) {
					rs = rs[0].slice(0, -4);
					this.out = rs;
					rs_id = vet.indexOf(rs);
					this.animal.redeSocial = ( rs_id < 0 ? rs_unknown : rs_id );//consulta em um array
					return true;
				} else{
					this.animal.redeSocial = rs_unknown;
					return false;
				};
			} else{
				return false;
			};
			
		};
	}]);

	app.controller('CtrlLista', ['$http', function($http) {
		var lista = this;


		this.animal  = {};
		this.pedido  = "";
		this.contato = null;

		this.animais = [];
		this.modal   = 1;
		this.filtro = null;

		$('#modalConcluir').on('hidden.bs.modal', function () {
			lista.contato = null;
			lista.modal = 1;
			lista.getAnimais();
		});

		this.filtroFunc = function(obj) {
			if (lista.filtro === null) {return true;}
			else {
				var exibir = true;

				if (exibir && lista.filtro.descricao) { //descrição
					if (obj.descricao) {
						exibir = (obj.descricao.toLowerCase().indexOf(lista.filtro.descricao.toLowerCase()) >= 0);
					} else {
						exibir = false;
					};
				}
				if (exibir && lista.filtro.especie_ID) { //especie
					exibir = (obj.especie_ID == lista.filtro.especie_ID);
				}
				if (exibir && lista.filtro.sexo) { //sexo
					exibir = (obj.sexo == lista.filtro.sexo);
				}

				return exibir;
			}
		};
		this.concluir = function() {
			$http.post('./util/concluir.php', {animalID: this.animal.ID, pedido: this.pedido, contato:this.contato}).
			then(function(response) {
				if (response.data.sucess) {
					alert("Concluido com sucesso!");
					
					$('#modalConcluir').modal('hide');
				} else{
					alert("Ouve um erro durante a conclusão:"+response.data.msg);// atenção com o response.data
				};
			}, function(response) {
				alert("fail@conclusão");
				//gerar log
			});
		};
		this.getAnimais = function() {

			$http.post('./util/query_animais.php', lista.pedido).
			then(function(response) {

				lista.animais = response.data;
			}, function(response) {
				alert("fail@getAnimais");
				//gerar log
			});
		};
	}]);

	app.controller('CtrlJSON', ['$http', function($http) {
		var ctrl_json = this;

		this.classes         = [];
		this.especies        = [];
		this.especies_classe = {};
		this.racas           = [];
		this.racas_especie   = {};
		this.redesSociais    = [];

		

		this.getClasses = function() {
			$http.post('./util/classe.php', 'json').
			then(function(response) {
				if (response.data.msg) {
					alert("erro@"+url);
				} else {
					ctrl_json.classes = response.data.result.slice(1);
				};
			}, function(response) {
				//geral log
			});
		};
		this.getEspecies = function() {
			$http.post('./util/especie.php', 'json').
			then(function(response) {
				if (response.data.msg) {
					alert("erro@"+url);
				} else {
					ctrl_json.especies = response.data.result;
				};
			}, function(response) {
				//geral log
			});
		};
		this.getEspecies_classe = function() { //especies
			$http.post('./util/especie.php', 'json-classe').
			then(function(response) {
				if (response.data.msg) {
					alert("erro@"+url);
				} else {
					ctrl_json.especies_classe = response.data.result;
				};
			}, function(response) {
				//geral log
			});
		};
		this.getRacas = function() {
			$http.post('./util/raca.php', 'json').
			then(function(response) {
				if (response.data.msg) {
					alert("erro@"+url);
				} else {
					ctrl_json.racas = response.data.result;
				};
			}, function(response) {
				//geral log
			});
		};	
		this.getRacas_especie = function() {//racas
			$http.post('./util/raca.php', 'json-especie').
			then(function(response) {
				if (response.data.msg) {
					alert("erro@"+url);
				} else {
					ctrl_json.racas_especie = response.data.result;
				};
			}, function(response) {
				//geral log
			});
		};
		this.getRedesSociais = function() {
			$http.post('./util/rede_social.php', 'json').
			then(function(response) {
				if (response.data.msg) {
					alert("erro@"+url);
				} else {
					ctrl_json.redesSociais = response.data.result;
				};
			}, function(response) {
				//geral log
			});
		};
}])

})();