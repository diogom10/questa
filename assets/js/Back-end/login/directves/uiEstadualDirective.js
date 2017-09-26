angular.module('teste').directive("uiEstadualsp", function () {
    return{
        require: "ngModel",
        link: function (scope, element, attrs, ctrl) {
            var _formatEstadual = function (estadual) {
                estadual = estadual.replace(/[^0-9]+/g, "");
                if (estadual.length > 3) {
                    estadual = estadual.substring(0, 3) + "." + estadual.substring(3);
                }
                if (estadual.length > 6) {
                    estadual = estadual.substring(0, 7) + "." + estadual.substring(7);
                }
                 if (estadual.length > 9) {
                    estadual = estadual.substring(0, 11) + "." + estadual.substring(10 , 13);
                }
                return estadual;
            };

            element.bind('keyup', function () {
                ctrl.$setViewValue(_formatEstadual(ctrl.$viewValue + "!"));
                ctrl.$render();
            });

            

        }
    };
});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


