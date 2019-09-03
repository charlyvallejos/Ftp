var apiURL = 'loadData.php';
var compareTo = function() {
    return {
        require: "ngModel",
        scope: {
            otherModelValue: "=compareTo"
        },
        link: function(scope, element, attributes, ngModel) {

            ngModel.$validators.compareTo = function(modelValue) {
                return modelValue == scope.otherModelValue;
            };

            scope.$watch("otherModelValue", function() {
                ngModel.$validate();
            });
        }
    };
};
var app = angular.module('appLogin', ['ngMessages'])

    .directive("compareTo", compareTo)
    .controller('loginController',function($scope,$http,$window) {
        $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8;';
        $scope.Login = {};
        $scope.Login.Clave_Ant = "";
        $scope.msj = "";
        $scope.submit = function(isValid,formLogin){

            if($scope.Login.Clave === "saporiti")
            {
                $http({
                    method:'POST',
                    url:apiURL+'?login',
                    data:$.param($scope.Login),
                    headers:{'Content-Type':'application/x-www-form-urlencoded;charset=utf-8;'}
                })
                    .then(function(resp){
                        if(resp.data.ok) {
                            $scope.Login.Clave_Ant = "saporiti";
                            $mensjLog.html("<p>Ingrese una nueva clave</p>");
                            $mensjLog.show();
                            $divinputRepClave.show();
                            $clave.val('');
                            $scope.msj = "";
                        }
                        else
                            $scope.msj = "Contraseña incorrecta";

                    })
                    .catch(function(resp){
                        console.log(resp);
                    });

            }
            else{
                $scope.login(formLogin);

            }
        };

        $scope.login = function(formLogin){
            var link = "";
            if($scope.Login.Clave_Ant === "saporiti")
                link = apiURL+'?login&modif';
            else
                link = apiURL+'?login';

            $http({
                method:'POST',
                url:link,
                data:$.param($scope.Login),
                headers:{'Content-Type':'application/x-www-form-urlencoded;charset=utf-8;'}
            })
                .then(function(resp){
                    if(resp.data.ok === true){
                        $scope.msj = "";
                        $window.location.reload();
                    }
                    else {
                           $scope.msj = "Contraseña incorrecta";
                           console.log(resp.data.ok);
                    }
                })
                .catch(function(resp){
                    console.log(resp);
                });
        };

        $scope.logout = function(){
            $http({
                method:'POST',
                url:apiURL+'?logout',
                headers:{'Content-Type':'application/x-www-form-urlencoded;charset=utf-8;'}
            })
                .then(function(resp){
                    console.log($window.location.host);
                    $window.location.reload();
                })
                .catch(function(resp){
                    console.log(resp);
                });
        }

    });

