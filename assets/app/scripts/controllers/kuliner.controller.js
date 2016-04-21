/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 11:44:12 AM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

(function() {
  'use strict';
  angular.module('Aplikasi-Kebudayaan-Aceh')
    .controller('KulinerController', KulinerController);

  KulinerController.$inject = ['KulinerService'];

  function KulinerController(KulinerService) {

    var kuliner = this;

    kuliner.paging = {
      page: 1,
      jumlah: 5
    };

    kuliner.dataKuliner = {};

    function ambilKuliner() {
      KulinerService.ambilKuliner(kuliner.paging.page, kuliner.paging.jumlah).success(function(data) {
        kuliner.dataKuliner = data.data_kuliner;
        kuliner.paging.totalPages = data.jumlah_halaman;
      });
    }

    ambilKuliner();

    //paging
    kuliner.nextPage = function() {
      if (kuliner.paging.page < kuliner.paging.totalPages) {
        kuliner.paging.page++;
        ambilKuliner();
      }
    };

    kuliner.previousPage = function() {
      if (kuliner.paging.page > 1) {
        kuliner.paging.page--;
        ambilKuliner();
      }
    };
    //end paging

  }

})();
