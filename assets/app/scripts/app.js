/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Mar 30, 2016
 * @Time 6:22:35 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular
    .module('Aplikasi-Kebudayaan-Aceh', [
      'ui.router',
      'oc.lazyLoad',
      'angular-loading-bar'
    ])
    .config(function($stateProvider, $urlRouterProvider, cfpLoadingBarProvider) {

      cfpLoadingBarProvider.includeSpinner = true;

      $urlRouterProvider.otherwise('/home');

      $stateProvider
        .state('home', {
          url: '/home',
          views: {
            'lazyLoadView': {
              template: '<ng-home></ng-home>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/directives/ngHome.js'
              ]);
            }]
          }
        });
    })
    .run(['$rootScope', '$state', 'cfpLoadingBar', function($rootScope, $state, cfpLoadingBar) {

      $rootScope.$on('$stateChangeSuccess', function() {
        cfpLoadingBar.complete();
      });

    }]);
})();
