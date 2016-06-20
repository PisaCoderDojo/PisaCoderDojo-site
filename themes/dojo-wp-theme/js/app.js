// angular.module('app', ['ngRoute', 'ControllerModule'])
// .config(function($routeProvider, $locationProvider) {
// 	$locationProvider.html5Mode(true);
//
// 	$routeProvider
// 	.when('/', {
// 		templateUrl: myLocalized.partials + 'home.html',
// 		controller: 'Main'
// 	});
// });


var myApp = angular.module('PisaCoderDojo', [
    'ngRoute',
    'ngProgress',
    'ngCookies',
    'ngSanitize',
    'coderDojoControllers',
    'coderDojoServices',
    'coderDojoFilters',
    'angulike',
    'angulartics',
    'angulartics.google.analytics',
    'ui.bootstrap',
    'angular-cookie-law',
    'infinite-scroll'
  ]);

  myApp.run(['$rootScope', 'progress', '$location', 'TitleService',
    function($rootScope, ngProgress, $location, TitleService) {
      //tokenService.copyCookie();

      $rootScope.$on('$routeChangeStart', function(data, current) {
        ngProgress.start();
        // console.log(current.$$route.title);
        TitleService.set(current.$$route.title);
        //console.log('cookie_token '+tokenService.get());
        var route = current.$$route.originalPath.split('/')[1];
        $rootScope.home = route === "";
        //$rootScope.sideBar=!(route == 'admin' || route == 'login');
        /*if (route == 'admin' && !tokenService.isSet()){
          $location.path('/login');
        }*/
      });
      $rootScope.$on('$routeChangeSuccess', function() {
        ngProgress.complete();
      });
      $rootScope.$on("$routeChangeError", function(event, current, previous, rejection) {
        console.log(event);
      });
    }
  ]);

  myApp.config(['$routeProvider', '$locationProvider',
    function($routeProvider, $locationProvider) {
      $routeProvider
        .when('/', {
          templateUrl: myLocalized.partials + 'home.html',
          controller: 'homeCtrl'
        })
        .when('/news', {
          title: 'notizie',
          templateUrl: myLocalized.partials + 'news.html',
          controller: 'newsCtrl',
          resolve: {
            news: function(newsService, $route) {
              return newsService.getNews($route.current.params.tag,
                                         $route.current.params.search)
            },
            tags: function(newsService) {
              return newsService.getTags();
            },
            selectedtag: function($route){
              return $route.current.params.tag;
            },
            search: function($route){
              return $route.current.params.search;
            }
          }
        })
        .when('/news/:id', {
          templateUrl: myLocalized.partials + 'new.html',
          controller: 'newCtrl',
          resolve: {
            news: function(newsService, $route) {
              return newsService.getNew($route.current.params.id);
            }
          }
        })
      /*  .when('/news/tag/:tag', {
          templateUrl: myLocalized.partials + 'news.html',
          controller: 'newsCtrl',
          resolve: {
            news: function(newsService, $route) {
              return newsService.getNews($route.current.params.tag);
            },
            tags: function(newsService) {
              return newsService.getTags();
            }
          }
        })*/
        .when('/resource/:cat', {
          templateUrl: myLocalized.partials + 'resource.html',
          controller: 'resourceCtrl',
          resolve: {
            resource: function(resourceService, $route) {
              return resourceService.getResources($route.current.params.cat);
            }
          }
        })
        .when('/contact', {
          title: 'contatti',
          templateUrl: myLocalized.partials + 'contact.html',
          controller: 'contactCtrl'
        })
        .when('/mentor', {
          title: 'Collabora con noi',
          templateUrl: myLocalized.partials + 'mentor.html',
          controller: 'mentorCtrl'
        })
        .when('/school', {
          title: 'Dojo nelle scuole',
          templateUrl: myLocalized.partials + 'school.html',
          controller: 'schoolCtrl'
        })
        .when('/about', {
          title: 'Mentori',
          templateUrl: myLocalized.partials + 'about.html',
          controller: 'aboutCtrl',
          resolve: {
            actualMentors: function($http) {
              return $http.get(myLocalized.json + '/mentors-actual.json');
            },
            oldMentors: function($http) {
              return $http.get(myLocalized.json + '/mentors-old.json');
            }
          }
        })
        .when('/calendar', {
          title: 'calendario',
          templateUrl: myLocalized.partials + 'calendar.html'
        })
        .when('/albums', {
          title: 'Galleria',
          templateUrl: myLocalized.partials + 'albums.html',
          controller: 'albumsCtrl',
          resolve: {
            albums: function(albumsService) {
              return albumsService.getAlbums();
            }
          }
        })
        .when('/albums/:id', {
          templateUrl: myLocalized.partials + 'album.html',
          controller: 'albumCtrl',
          resolve: {
            album: function(albumsService, $route) {
              return albumsService.getAlbum($route.current.params.id);
            },
            albumid: function($route){
              return $route.current.params.id;
            }
          }
        })
        .otherwise({
          redirectTo: '/'
        });
      $locationProvider.html5Mode(true);
    }
  ]);

  myApp.controller('CarouselCtrl', ['$scope', function($scope) {
    $scope.myInterval = 5000;
    var slides = $scope.slides = [];
    slides.push({
      image: myLocalized.img + 'carousel/carousel-IF.jpg',
      text: ''
    });
    slides.push({
      image: myLocalized.img + 'carousel/all-dojo.jpg',
      text: ''
    });
    slides.push({
      image: myLocalized.img + 'carousel/SMS-biblio.jpg',
      text: ''
    });
  }]);

  myApp.controller('menuController', ['$scope', 'categoryService','ninjaService',
    function($scope, categoryService, ninjaService) {
      categoryService.getCategory().success(function(data) {
          $scope.category = data;
        });
      $scope.BASE_URL = 'http://pisa.coderdojo.it';
      ninjaService.get().success(function(data) {
        $scope.ninja = data;
      });
    }
  ]);

  myApp.controller('titleController', ['$scope', 'TitleService',
    function($scope, TitleService) {
      $scope.title = TitleService;
    }
  ]);
