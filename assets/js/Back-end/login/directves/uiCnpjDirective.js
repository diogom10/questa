angular.module('teste').directive("uiCnpj", function () {
    return{
        require: "ngModel",
        link: function (scope, element, attrs, ctrl) {
            var _formatCnpj = function (cnpj) {
                cnpj = cnpj.replace(/[^0-9]+/g, "");
                console.log(cnpj);
                if (cnpj.length > 2) {
                    cnpj = cnpj.substring(0, 2) + "." + cnpj.substring(2);
                }
                if (cnpj.length > 5) {
                    cnpj = cnpj.substring(0, 6) + "." + cnpj.substring(5);
                }

                if (cnpj.length > 10) {
                    cnpj = cnpj.substring(0, 10) + "/" + cnpj.substring(10);
                }
                if (cnpj.length > 15) {
                    cnpj = cnpj.substring(0, 15) + "-" + cnpj.substring(15,17);
                }
                return cnpj;
            };

            element.bind('keyup', function () {
                ctrl.$setViewValue(_formatCnpj(ctrl.$viewValue + "!"));
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


