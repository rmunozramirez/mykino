//app-kino.js

(function () {
    "use strict";
    var app = angular.module('app-kino', ['ngRoute', 'angular.filter'])
        .config(["$routeProvider", "$locationProvider",
                        function ($routeProvider, $locationProvider) {
                            $routeProvider.when("/", {
                                controller: "contactsController",
                                controllerAs: "vm",
                                templateUrl: "/views/contactsView.html"
                            });

                            $routeProvider.when("/grid", {
                                controller: "contactsController",
                                controllerAs: "vm",
                                templateUrl: "/views/gridView.html"
                            });

                            $routeProvider.when("/add", {
                                controller: "contactsController",
                                controllerAs: "vm",
                                templateUrl: "/views/addView.html"
                            });

                            //$routeProvider.when("/details/:id", {
                            //    controller: "contactsController",
                            //    controllerAs: "vm",
                            //    templateUrl: "/views/contactsView.html"
                            //});

                            $routeProvider.otherwise({ redirectTo: "/" });

                            $locationProvider.html5Mode({
                                enabled: true,
                                requireBase: false,
                                rewriteLinks: true
                            });

                            $locationProvider.html5Mode(true);
                        }
        ]);
})();