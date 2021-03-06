/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 2:45:37 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .directive('ngMusik', ngMusik);

  function ngMusik() {
    return {
      restrict: 'E',
      templateUrl: 'assets/app/templates/musik.template.html',
      controller: 'MusikController',
      controllerAs: 'musik'
    };
  }

})();
