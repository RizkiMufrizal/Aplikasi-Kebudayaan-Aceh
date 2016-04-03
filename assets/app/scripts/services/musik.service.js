/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 2:45:30 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .factory('MusikService', MusikService);

  MusikService.$inject = ['$http'];

  function MusikService($http) {
    return {
      ambilMusik: function(page, size) {
        return $http.get('index.php/api/musik?page=' + page + '&size=' + size);
      }
    };
  }

})();
