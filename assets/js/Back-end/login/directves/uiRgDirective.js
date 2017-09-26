angular.module('teste').directive("uiRg", function () {
    return{
        require: "ngModel",
        link: function (scope, element, attrs, ctrl) {
            var _formatRg = function (rg) {
                rg = rg.replace(/[^0-9]+/g, "");

                if (rg.length > 2) {
                    rg = rg.substring(0, 2) + "." + rg.substring(2);
                }
                if (rg.length > 6) {
                    rg = rg.substring(0, 6) + "." + rg.substring(6);
                }
                if (rg.length > 5) {
                    rg = rg.substring(0, 10) + "-" + rg.substring(10,11);
                }


                return rg;
            };

            element.bind('keyup', function () {
                ctrl.$setViewValue(_formatRg(ctrl.$viewValue));
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


