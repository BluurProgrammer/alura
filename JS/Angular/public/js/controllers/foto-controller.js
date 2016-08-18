angular.module('alurapic').controller('FotoController', function($scope, cadastroDeFotos, recursoFoto, $routeParams) {

    $scope.foto = {};
    $scope.mensagem = '';

    //Dados para preencher os campos com os dados já cadastrados
    if($routeParams.fotoId) {

        recursoFoto.get({fotoId : $routeParams.fotoId}, function(foto) {
            $scope.foto = foto; //Iguala o objeto vindo por parametro com objeto "declarado"
        }, function(erro) {
            console.log(erro);
            $scope.mensagem = 'Não foi possível obter a foto';
        });
    }

    //Método para adicionar ou editar foto
    $scope.submeter = function() {
        if ($scope.formulario.$valid) {

            cadastroDeFotos.cadastrar($scope.foto)
            .then(function(dados) {
                $scope.mensagem = dados.mensagem;
                if(dados.inclusao) $scope.foto = {};
            })
            .catch(function(dados) {
                $scope.mensagem = dados.mensagem;
            });
        }
    };
});
