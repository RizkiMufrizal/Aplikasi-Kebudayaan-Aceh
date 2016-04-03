/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 3, 2016
 * @Time 3:00:19 PM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

angular.module('Aplikasi-Kebudayaan-Aceh')
  .directive('audios', function($sce) {
    return {
      restrict: 'A',
      scope: {
        code: '='
      },
      replace: true,
      template: '<audio ng-src="{{url}}" controls></audio>',
      link: function(scope) {
        scope.$watch('code', function(newVal, oldVal) {
          if (newVal !== undefined) {
            scope.url = $sce.trustAsResourceUrl('uploads/musik/' + newVal);
          }
        });
      }
    };
  });
