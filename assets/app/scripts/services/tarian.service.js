/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 3:48:41 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .factory('TarianService', TarianService);

  TarianService.$inject = ['$http'];

  function TarianService($http) {
    return {
      ambilTarian: function(page, size) {
        return $http.get('index.php/api/tarian?page=' + page + '&size=' + size);
      }
    };
  }

})();
