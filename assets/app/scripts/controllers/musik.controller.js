/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 2:45:45 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .controller('MusikController', MusikController);

  MusikController.$inject = ['MusikService'];

  function MusikController(MusikService) {

    var musik = this;

    musik.paging = {
      page: 1,
      jumlah: 6
    };

    musik.dataMusik = {};

    function ambilMusik() {
      MusikService.ambilMusik(musik.paging.page, musik.paging.jumlah).success(function(data) {
        musik.dataMusik = data.data_musik;
        musik.paging.totalPages = data.jumlah_halaman;
      });
    }

    ambilMusik();

    //paging
    musik.nextPage = function() {
      if (musik.paging.page < musik.paging.totalPages) {
        musik.paging.page++;
        ambilMusik();
      }
    };

    musik.previousPage = function() {
      if (musik.paging.page > 1) {
        musik.paging.page--;
        ambilMusik();
      }
    };
    //end paging

  }

})();
