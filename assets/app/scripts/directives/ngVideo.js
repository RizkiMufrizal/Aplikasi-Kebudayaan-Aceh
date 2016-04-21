/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 4:33:42 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

angular.module('Aplikasi-Kebudayaan-Aceh')
  .directive('videos', function($sce) {
    return {
      restrict: 'A',
      scope: {
        code: '='
      },
      replace: true,
      template: '<video width="400" height="300" controls><source ng-src="{{url}}" type="video/mp4"></video>',
      link: function(scope) {
        scope.$watch('code', function(newVal, oldVal) {
          if (newVal !== undefined) {
            scope.url = $sce.trustAsResourceUrl('uploads/video/' + newVal);
          }
        });
      }
    };
  });
