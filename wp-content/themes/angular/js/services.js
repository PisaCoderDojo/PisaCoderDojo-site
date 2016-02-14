(function() {
  "use strict";
  const LEGACY_API = '/legacy_api';
  const WP_API = '/wp-json/wp/v2';

  angular.module('coderDojoServices', [])
    .factory('newsService', ['$http', function($http) {
      return {
        getNews: function(tag,search) {
          var args = {
            method: 'GET',
            url: WP_API + '/posts'
          }
          if (tag || search) args.url = args.url + '?';
          if (tag)
            args.url = args.url + 'filter[tag]=' + tag + '&';
          if (search)
            args.url = args.url + 'search=' + search;
          return $http(args);
        },
        getNew: function(slug) {
          return $http({
            method: 'GET',
            url: WP_API+'/posts?slug=' + slug
          });
        },
        /*searchNews: function(text) {
          return $http({
            method: 'GET',
            url: WP_API + '/posts?search=' + text
          });
        },*/
        getTags: function() {
          return $http({
            method: 'GET',
            url: WP_API + '/tags'
          });
        }
      };
    }])
    .factory('mediaService', ['$http', function($http) {
      return {
        get: function(id) {
          return $http({
            method: 'GET',
            url: WP_API+'/media/'+ id
          })
        },
        getSize: function(media, size) {
          return media.media_details.sizes[size].source_url;
        }
      };
    }])
    .factory('resourceService', ['$http', function($http, tokenService) {
      return {
        getResources: function(cat) {
          return $http({
            method: 'GET',
            url: LEGACY_API+'/resources?category=' + cat
          });
        },
        getResource: function(id) {
          return $http({
            method: 'GET',
            url: LEGACY_API+'/resources/' + id
          });
        },
        addResource: function(resource) {
          resource.token = tokenService.get();
          return $http({
            method: 'POST',
            url: LEGACY_API+'/resources',
            data: resource
          });
        },
        modResource: function(id, res) {
          res.token = tokenService.get();
          return $http({
            method: 'PUT',
            url: LEGACY_API+'/resources/' + id,
            data: res
          });
        },
        delResource: function(id) {
          return $http({
            method: 'DELETE',
            url: LEGACY_API+'/resources/' + id,
            data: {
              token: tokenService.get()
            }
          });
        }
      };
    }])
    .factory('categoryService', ['$http', 'tokenService', function($http, tokenService) {
      return {
        getCategory: function() {
          return $http({
            method: 'GET',
            url: LEGACY_API+'/category'
          });
        },
        addCategory: function(cat) {
          cat.token = tokenService.get();
          return $http({
            method: 'POST',
            url: LEGACY_API+'/category',
            data: cat
          });
        },
        delCategory: function(id) {
          return $http({
            method: 'DELETE',
            url: LEGACY_API+'/category/' + id,
            data: {
              token: tokenService.get()
            }
          });
        },
        modCategory: function(id, cat) {
          cat.token = tokenService.get();
          return $http({
            method: 'PUT',
            url: LEGACY_API+'/category/' + id,
            data: cat
          });
        }
      };
    }])
    .factory('resourceHelper', [function() {
      return {
        toArray: function(r) {
          //if (r!=='') r+=',';
          var resourceList = r.split(',');
          for (var i = 0; i < resourceList.length; i++) {
            resourceList[i] = ({
              link: resourceList[i]
            });
          }
          return resourceList;
        },
        toString: function(r) {
          var resourceList = [];
          for (var i = 0; i < r.length; i++) {
            if (r[i].link !== '')
              resourceList.push(r[i].link);
          }
          return resourceList.join(',');
        }
      };
    }])
    .factory('mailService', ['$http', function($http) {
      return {
        send: function(mail, subject, text) {
          return $http({
            method: 'POST',
            url: LEGACY_API+'/sendmail',
            data: {
              mail: mail,
              subject: subject,
              text: typeof text == 'string' ? text : text.join('<br/>')
            }
          });
        },
        selectionToString: function(array) {
          var stringa = "";
          var first = true;
          for (var i = 0; i < array.length; i++) {
            var object = array[i];
            if (object.value === true) {
              if (!first)
                stringa += ', ';
              stringa += object.name;
              first = false;
            }
          }
          return stringa;
        }
      }
    }])
    .factory('imageService', ['$http', 'tokenService', function($http, tokenService) {
      return {
        upload: function(img) {
          return $http({
            method: 'POST',
            url: LEGACY_API+'/photo',
            data: {
              img: img,
              token: tokenService.get()
            }
          });
        }
      };
    }])
    .factory('albumsService', ['$http', function($http) {
      return {
        getAlbums: function() {
          return $http({
            method: 'GET',
            url: LEGACY_API+'/album'
          });
        },
        getAlbum: function(id) {
          return $http({
            method: 'GET',
            url: LEGACY_API+'/album/' + id
          });
        }
      };
    }])
    .factory('loginService', ['$http', function($http) {
      return {
        login: function(pass) {
          return $http({
            method: 'POST',
            url: LEGACY_API+'/login',
            data: {
              'password': pass
            }
          });
        }
      };
    }])
    .factory('progress',['ngProgressFactory', function(ngProgressFactory){
      return ngProgressFactory.createInstance();
    }])
    .factory('tokenService', ['$cookies', function($cookies) {
      var tokenValue;
      return {
        copyCookie: function() {
          tokenValue = $cookies.token;
          //console.log('onStart: '+tokenValue);
        },
        set: function(token) {
          if (this.remember) {
            $cookies.token = token;
          }
          tokenValue = token;
        },
        get: function() {
          return tokenValue;
        },
        isSet: function() {
          return tokenValue !== undefined;
        },
        remember: false
      };
    }])
    .factory('TitleService', [function() {
      var title = '';
      return {
        get: function() {
          return 'PisaCoderDojo' + title;
        },
        set: function(t) {
          title = t ? ' - ' + t : '';
        }
      };
    }])
    .factory('Event', ['$http', function($http) {
      var mykey = 'AIzaSyBVnDL-urhPD8VD-hbSftKN6aZtyHLWJTY'; // typically like Gtg-rtZdsreUr_fLfhgPfgff
      var calendarid = '4kg73k4bcukgr81qfgvah9p9r0@group.calendar.google.com'; // will look somewhat like 3ruy234vodf6hf4sdf5sd84f@group.calendar.google.com
      return {
        next: function() {
          return $http({
            method: 'GET',
            url: 'https://www.googleapis.com/calendar/v3/calendars/' + calendarid + '/events?key=' + mykey
          });
        },
        getDay: function(data) {
          data = new Date(data.items[data.items.length - 1].start.dateTime);
          var now = new Date().getTime();
          return Math.floor((data - now) / (1000 * 60 * 60 * 24));
        },
        getEventBrite: function(data) {
          return data.items[data.items.length - 1].description;
        },
        getNote: function(data) {
          console.log(data.items);
        }
      };
    }]);
})();
