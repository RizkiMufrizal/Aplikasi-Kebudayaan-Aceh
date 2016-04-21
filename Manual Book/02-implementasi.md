# Implementasi (Coding) #

Pada tahap ini kita akan melakukan setup project, konfigurasi project beserta melakukan koding pada aplikasi. Silahkan download codeigniter, kemudian extract dan tempatkan di folder htdocs, karena saya menggunakan ubuntu maka saya menempatkanya di folder `/var/www/html/`. Disini penulis menggunakan beberapa library yang diperlukan yaitu library [codeigniter rest server](https://github.com/chriskacerguis/codeigniter-restserver) untuk membuat API, [uuid](https://github.com/Repox/codeigniter-uuid) untuk generate id yang random dan [bcrypt](https://github.com/dwightwatson/codeigniter-bcrypt) untuk password yang akan di enkripsi.

## Membuat Database

Untuk membuat database dan tabel - tabel yang diperlukan, silahkan jalankan query seperti berikut.

```sql
CREATE DATABASE kebudayaan_aceh;

USE
  kebudayaan_aceh;

CREATE TABLE tb_kuliner_aceh(
  id_kuliner_aceh VARCHAR(150) NOT NULL PRIMARY KEY,
  judul_kuliner VARCHAR(50) NOT NULL,
  gambar_kuliner VARCHAR(150) NOT NULL,
  deskripsi_kuliner TEXT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tb_musik_aceh(
  id_musik_aceh VARCHAR(150) NOT NULL PRIMARY KEY,
  judul_musik VARCHAR(50) NOT NULL,
  musik_aceh VARCHAR(150) NOT NULL,
  deskripsi_musik TEXT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tb_tarian_aceh(
  id_tarian_aceh VARCHAR(150) NOT NULL PRIMARY KEY,
  judul_tarian VARCHAR(50) NOT NULL,
  video_tarian VARCHAR(150) NOT NULL,
  deskripsi_tarian TEXT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tb_wisata_aceh(
  id_wisata_aceh VARCHAR(150) NOT NULL PRIMARY KEY,
  judul_wisata VARCHAR(50) NOT NULL,
  gambar_wisata VARCHAR(150) NOT NULL,
  deskripsi_wisata TEXT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tb_user(
  email VARCHAR(50) NOT NULL PRIMARY KEY,
  password VARCHAR(150) NOT NULL
) ENGINE = InnoDB;
```

## Melakukan Konfigurasi Pada CodeIgniter

Silahkan lakukan konfigurasi seperti berikut pada file `autoload.php`.

```php
$autoload['libraries'] = array('database', 'session', 'Uuid', 'bcrypt');
$autoload['helper'] = array('url', 'file');
```

Kemudian pada bagian database silahkan ubah berdasarkan user dan password database anda.

## Membuat Model

Model merupakan representasi dari pada database, silakan buat sebuah file php dengan nama `KulinerAceh.php` kemudian masukkan codingan seperti berikut.

```php
<?php

class KulinerAceh extends CI_Model {

    public function ambilJumlahKulinerAceh() {
        return $this->db->count_all_results('tb_kuliner_aceh', FALSE);
    }

    public function ambilKulinerAceh($page, $size) {
        return $this->db->get('tb_kuliner_aceh', $size, $page)->result();
    }

    public function ambilKulinerAcehSemua() {
        return $this->db->get('tb_kuliner_aceh')->result();
    }

    public function ambilKulinerAcehSatu($idKulinerAceh) {
        $this->db->where('id_kuliner_aceh', $idKulinerAceh);
        return $this->db->get('tb_kuliner_aceh')->result();
    }

    public function simpanKulinerAceh($kulinerAceh) {
        $this->db->insert('tb_kuliner_aceh', $kulinerAceh);
    }

    public function ubahKulinerAceh($kulinerAceh, $idKulinerAceh) {
        $this->db->where('id_kuliner_aceh', $idKulinerAceh);
        $this->db->update('tb_kuliner_aceh', $kulinerAceh);
    }

    public function hapusKulinerAceh($idKulinerAceh) {
        $kulinerAceh = array(
            'id_kuliner_aceh' => $idKulinerAceh
        );
        $this->db->delete('tb_kuliner_aceh', $kulinerAceh);
    }

}
```

## Membuat Controller

Tahap selanjutnya adalah membuat Controller, Controller disini befungsi sebagai penghubung antara model view. Silahkan buat sebuah file php dengan nama `KulinerAcehRestController` kemudian masukkan codingan seperti berikut.

```php
<?php

require APPPATH . '/libraries/REST_Controller.php';

class KulinerAcehRestController extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        $this->load->model('KulinerAceh');
    }

    public function kuliner_get() {
        $page = $this->query('page');
        $size = $this->query('size');

        $response = array(
            'data_kuliner' => $this->KulinerAceh->ambilKulinerAceh(($page - 1) * $size, $size),
            'jumlah_halaman' => ceil($this->KulinerAceh->ambilJumlahKulinerAceh() / $size)
        );

        $this->response($response, REST_Controller::HTTP_OK);
    }

}
```

## Membuat View

Untuk membuat view, penulis menggunakan angular js, berikut adalah masing - masing codingan untuk bagian angular dan view.

```html
<!DOCTYPE html>
<html lang="en" ng-app="Aplikasi-Kebudayaan-Aceh">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>Aplikasi Kebudayaan Aceh</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/bundle-user.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="green z-depth-2" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" ui-sref="home" class="brand-logo">
                    <img style="width: 150px; width: 150px" src="<?php echo base_url(); ?>assets/img/logo.png" />
                </a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class="white-text" ui-sref="kuliner">Kuliner</a>
                    </li>
                    <li>
                        <a class="white-text" ui-sref="wisata">Wisata</a>
                    </li>
                    <li>
                        <a class="white-text" ui-sref="tarian">Tarian</a>
                    </li>
                    <li>
                        <a class="white-text" ui-sref="musik">Musik</a>
                    </li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li>
                        <a ui-sref="kuliner">Kuliner</a>
                    </li>
                    <li>
                        <a ui-sref="wisata">Wisata</a>
                    </li>
                    <li>
                        <a ui-sref="tarian">Tarian</a>
                    </li>
                    <li>
                        <a ui-sref="musik">Musik</a>
                    </li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div ui-view="lazyLoadView"></div>

        <footer class="page-footer teal">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">About Me</h5>
                        <p class="grey-text text-lighten-4">
                            Developer bernama Rizki Mufrizal, berasal dari aceh. Sekarang developer sebagai mahasiswa aktif jurusan teknik informatika di Universitas Gunadarma. Di sela - sela kesibukan sebagai asisten laboratorium teknik informatika, developer juga aktif dalam mempelajari berbagai teknologi open source terutama di bidang pemrograman Java, Javascript dan Linux.
                        </p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Contact Us</h5>
                        <ul>
                            <li>
                                <a class="white-text" href="#!">Link 1</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                </div>
            </div>
        </footer>

        <!--  Scripts-->
        <script src="<?php echo base_url(); ?>assets/js/bundle-user.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/app/scripts/app.js"></script>

    </body>
</html>
```

Berikut adalah codingan angular bagian `app.js`.

```javascript
(function() {
  'use strict';
  angular
    .module('Aplikasi-Kebudayaan-Aceh', [
      'ui.router',
      'oc.lazyLoad',
      'angular-loading-bar'
    ])
    .config(function($stateProvider, $urlRouterProvider, cfpLoadingBarProvider) {

      cfpLoadingBarProvider.includeSpinner = true;

      $urlRouterProvider.otherwise('/home');

      $stateProvider
        .state('home', {
          url: '/home',
          views: {
            'lazyLoadView': {
              template: '<ng-home></ng-home>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/directives/ngHome.js'
              ]);
            }]
          }
        })
        .state('kuliner', {
          url: '/kuliner',
          views: {
            'lazyLoadView': {
              template: '<ng-kuliner></ng-kuliner>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/services/kuliner.service.js',
                'assets/app/scripts/directives/ngKuliner.js',
                'assets/app/scripts/controllers/kuliner.controller.js'
              ]);
            }]
          }
        })
        .state('wisata', {
          url: '/wisata',
          views: {
            'lazyLoadView': {
              template: '<ng-wisata></ng-wisata>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/services/wisata.service.js',
                'assets/app/scripts/directives/ngWisata.js',
                'assets/app/scripts/controllers/wisata.controller.js'
              ]);
            }]
          }
        })
        .state('musik', {
          url: '/musik',
          views: {
            'lazyLoadView': {
              template: '<ng-musik></ng-musik>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/services/musik.service.js',
                'assets/app/scripts/directives/ngAudio.js',
                'assets/app/scripts/directives/ngMusik.js',
                'assets/app/scripts/controllers/musik.controller.js'
              ]);
            }]
          }
        })
        .state('tarian', {
          url: '/tarian',
          views: {
            'lazyLoadView': {
              template: '<ng-tarian></ng-tarian>'
            }
          },
          resolve: {
            loadMyCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
              return $ocLazyLoad.load([
                'assets/app/scripts/services/tarian.service.js',
                'assets/app/scripts/directives/ngVideo.js',
                'assets/app/scripts/directives/ngTarian.js',
                'assets/app/scripts/controllers/tarian.controller.js'
              ]);
            }]
          }
        });
    })
    .run(['$rootScope', '$state', 'cfpLoadingBar', function($rootScope, $state, cfpLoadingBar) {

      $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams) {
        cfpLoadingBar.start();
      });

      $rootScope.$on('$stateChangeSuccess', function() {
        cfpLoadingBar.complete();
      });

    }]);
})();
```

berikut untuk bagian `kuliner.service.js`

```javascript
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
```

berikut untuk bagian 'kuliner.controller.js'

```javascript
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
```
