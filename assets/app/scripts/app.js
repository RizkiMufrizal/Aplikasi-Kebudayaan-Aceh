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
        })
        .state('kuliner', {
          url: '/kuliner',
          views: {
            'lazyLoadView': {
              template: '<ng-kuliner></ng-kuliner>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/services/kuliner.service.js',
                'assets/app/scripts/directives/ngKuliner.js',
                'assets/app/scripts/controllers/kuliner.controller.js'
              ]);
            }]
          }
        })
        .state('wisata', {
          url: '/wisata',
          views: {
            'lazyLoadView': {
              template: '<ng-wisata></ng-wisata>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/services/wisata.service.js',
                'assets/app/scripts/directives/ngWisata.js',
                'assets/app/scripts/controllers/wisata.controller.js'
              ]);
            }]
          }
        })
        .state('musik', {
          url: '/musik',
          views: {
            'lazyLoadView': {
              template: '<ng-musik></ng-musik>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/services/musik.service.js',
                'assets/app/scripts/directives/ngAudio.js',
                'assets/app/scripts/directives/ngMusik.js',
                'assets/app/scripts/controllers/musik.controller.js'
              ]);
            }]
          }
        })
        .state('tarian', {
          url: '/tarian',
          views: {
            'lazyLoadView': {
              template: '<ng-tarian></ng-tarian>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/services/tarian.service.js',
                'assets/app/scripts/directives/ngVideo.js',
                'assets/app/scripts/directives/ngTarian.js',
                'assets/app/scripts/controllers/tarian.controller.js'
              ]);
            }]
          }
        });
    })
    .run(['$rootScope', '$state', 'cfpLoadingBar', function($rootScope, $state, cfpLoadingBar) {

      $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams) {
        cfpLoadingBar.start();
      });

      $rootScope.$on('$stateChangeSuccess', function() {
        cfpLoadingBar.complete();
      });

    }]);
})();
