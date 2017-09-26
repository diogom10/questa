angular.module('teste').directive("uiMunicipal", function () {
    return{
        require: "ngModel",
        link: function (scope, element, attrs, ctrl) {
            var _formatMunicipal = function (municipal) {
                municipal = municipal.replace(/[^0-9]+/g, "");

                if (municipal.length > 1) {
                    municipal = municipal.substring(0, 1) + "." + municipal.substring(1);
                }
                if (municipal.length > 6) {
                    municipal = municipal.substring(0, 6) + "." + municipal.substring(6);
                }
                if (municipal.length > 10) {
                    municipal = municipal.substring(0, 10) + "-" + municipal.substring(9,10);
                }
                return municipal;
            };

            element.bind('keyup', function () {
                ctrl.$setViewValue(_formatMunicipal(ctrl.$viewValue));
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


