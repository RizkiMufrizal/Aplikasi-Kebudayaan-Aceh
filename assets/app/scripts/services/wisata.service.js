/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 2:25:03 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .factory('WisataService', WisataService);

  WisataService.$inject = ['$http'];

  function WisataService($http) {
    return {
      ambilWisata: function(page, size) {
        return $http.get('index.php/api/wisata?page=' + page + '&size=' + size);
      }
    };
  }

})();
