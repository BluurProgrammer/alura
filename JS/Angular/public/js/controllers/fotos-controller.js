angular.module('alurapic').controller('FotosController', function($scope, $http) {

    $scope.fotos = [];
    $scope.filtro = '';

    $http.get('http://localhost:8000/v1/fotos')
    .success(function(retorno) {
        console.log(retorno);
        $scope.fotos = retorno; // não precisa fazer retorno.data
    })
    .error(function(erro) {
        console.log(erro);
    });

});
