/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 2:25:11 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .directive('ngWisata', ngWisata);

  function ngWisata() {
    return {
      restrict: 'E',
      templateUrl: 'assets/app/templates/wisata.template.html',
      controller: 'WisataController',
      controllerAs: 'wisata'
    };
  }

})();
