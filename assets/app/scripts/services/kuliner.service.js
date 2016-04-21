/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 11:43:56 AM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .factory('KulinerService', KulinerService);

  KulinerService.$inject = ['$http'];

  function KulinerService($http) {
    return {
      ambilKuliner: function(page, size) {
        return $http.get('index.php/api/kuliner?page=' + page + '&size=' + size);
      }
    };
  }

})();
