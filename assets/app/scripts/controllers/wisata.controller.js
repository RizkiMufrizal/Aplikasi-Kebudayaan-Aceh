/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 2:25:19 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .controller('WisataController', WisataController);

  WisataController.$inject = ['WisataService'];

  function WisataController(WisataService) {

    var wisata = this;

    wisata.paging = {
      page: 1,
      jumlah: 5
    };

    wisata.dataWisata = {};

    function ambilWisata() {
      WisataService.ambilWisata(wisata.paging.page, wisata.paging.jumlah).success(function(data) {
        wisata.dataWisata = data.data_wisata;
        wisata.paging.totalPages = data.jumlah_halaman;
      });
    }

    ambilWisata();

    //paging
    wisata.nextPage = function() {
      if (wisata.paging.page < wisata.paging.totalPages) {
        wisata.paging.page++;
        ambilWisata();
      }
    };

    wisata.previousPage = function() {
      if (wisata.paging.page > 1) {
        wisata.paging.page--;
        ambilWisata();
      }
    };
    //end paging

  }

})();
