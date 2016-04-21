/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 3:48:46 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .directive('ngTarian', ngTarian);

  function ngTarian() {
    return {
      restrict: 'E',
      templateUrl: 'assets/app/templates/tarian.template.html',
      controller: 'TarianController',
      controllerAs: 'tarian'
    };
  }

})();
