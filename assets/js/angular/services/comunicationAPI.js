/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var base_url = "http://localhost/energia/";

angular.module("sigere").service("comunicationAPI", function ($http) {
    $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    var dados;
    this.comunicaPHP = function (ctrlPHP, data) {
        return $http.post(base_url + ctrlPHP, dados = {"email":data.email ,"senha":data.senha});
    };


});


