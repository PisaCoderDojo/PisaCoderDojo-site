(function() {
  "use strict";
  angular.module('coderDojoFilters', [])

  .filter('checkmark', function() {
    return function(input) {
      return input ? '\u2713' : '\u2718';
    };
  });
})();
