angular.module('alurapic').controller('FotosController', function($scope, $http, $resource) {

    $scope.fotos = [];
    $scope.filtro = '';
    $scope.mensagem = '';

    var recursoFoto = $resource('v1/fotos/:fotoId');

    //Lista as fotos
    recursoFoto.query(function(fotos) {
        $scope.fotos = fotos;
    }, function(erro) {
        console.log(erro);
    });

    //Remove foto
    $scope.remover = function(foto) {

        recursoFoto.delete({fotoId : foto._id}, function(){
            var indiceFoto = $scope.fotos.indexOf();
            $scope.fotos.splice(indiceFoto, 1);
            $scope.mensagem = 'Foto '+ foto.titulo + ' foi removida com sucesso';

        }, function(erro) {
            console.log(erro);
            $scope.mensagem = 'Foto '+ foto.titulo + ' foi removida  com sucesso';
        });
    };
});
