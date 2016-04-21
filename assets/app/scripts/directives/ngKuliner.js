/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 11:44:03 AM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .directive('ngKuliner', ngKuliner);

  function ngKuliner() {
    return {
      restrict: 'E',
      templateUrl: 'assets/app/templates/kuliner.template.html',
      controller: 'KulinerController',
      controllerAs: 'kuliner'
    };
  }

})();
