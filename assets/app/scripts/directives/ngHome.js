/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 10:15:19 AM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .directive('ngHome', ngHome);

  function ngHome() {
    return {
      restrict: 'E',
      templateUrl: 'assets/app/templates/home.template.html'
    };
  }

})();
