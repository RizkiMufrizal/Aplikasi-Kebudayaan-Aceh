/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 3:48:54 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .controller('TarianController', TarianController);

  TarianController.$inject = ['TarianService'];

  function TarianController(TarianService) {

    var tarian = this;

    tarian.paging = {
      page: 1,
      jumlah: 5
    };

    tarian.dataTarian = {};

    function ambilTarian() {
      TarianService.ambilTarian(tarian.paging.page, tarian.paging.jumlah).success(function(data) {
        tarian.dataTarian = data.data_tarian;
        tarian.paging.totalPages = data.jumlah_halaman;
      });
    }

    ambilTarian();

    //paging
    tarian.nextPage = function() {
      if (tarian.paging.page < tarian.paging.totalPages) {
        tarian.paging.page++;
        ambilTarian();
      }
    };

    tarian.previousPage = function() {
      if (tarian.paging.page > 1) {
        tarian.paging.page--;
        ambilTarian();
      }
    };
    //end paging

  }

})();
