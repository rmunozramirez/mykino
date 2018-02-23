//kinoController.js

(function () {

    "use strict";

    angular.module('app-kino')
        .controller("kinoController", function ($http, $scope) {
            $scope.films = $films;
        });
})();