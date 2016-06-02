angular.module('alurapic').controller('FotoController', function($scope, $http, $routeParams) {

    $scope.foto = {};
    $scope.mensagem = '';

    //Dados para preencher os campos com os dados já cadastrados
    if($routeParams.fotoId) {
        $http.get('http://localhost:8000/v1/fotos/' + $routeParams.fotoId)
        .success(function(foto) {
            $scope.foto = foto; //Iguala o objeto vindo por parametro com objeto "declarado"
        })
        .error(function(erro) {
            console.log(erro);
            $scope.mensagem = 'Não foi possível obter a foto';
        });
    }

    //Método para adicionar ou editar foto
    $scope.submeter = function() {
        if ($scope.formulario.$valid) {
            if ($scope.foto._id) { //Verifica se o item tem este id já cadastrado
                $http.put('http://localhost:8000/v1/fotos/' + $scope.foto._id, $scope.foto )
                .success(function() {
                    $scope.mensagem = 'A foto ' + $scope.foto.titulo + ' foi alterada com sucesso';
                })
                .error(function(erro) {
                    console.log(erro);
                    $scope.mensagem = 'Não foi possível alterar a imagem ' + $scope.foto.titulo;
                })
            } else { //Cadastra o item, já que o id não existe
                $http.post('v1/fotos', $scope.foto)
                .success(function() {
                    $scope.foto = {};
                    $scope.mensagem = 'Foto cadastrada com sucesso';
                })
                .error(function(erro) {
                    $scope.mensagem = 'Não foi possível cadastrar';
                    console.log(erro);
                });
            }
        }
    };
});
