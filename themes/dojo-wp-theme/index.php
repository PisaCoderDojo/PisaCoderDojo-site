<!DOCTYPE html>
<html ng-app="PisaCoderDojo">

  <head ng-controller="titleController">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- For IE 9 and below. ICO should be 32x32 pixels in size -->
    <!--[if IE]><link rel="shortcut icon" href="favicon.ico"><![endif]-->
    <!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. -->
    <!-- <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png"> -->
    <!-- Firefox, Chrome, Safari, IE 11+ and Opera. 196x196 pixels in size. -->
    <!-- <link rel="icon" href="favicon.png"> -->

    <link rel="apple-touch-icon" sizes="57x57" href="/icon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/icon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/icon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/icon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/icon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/icon/manifest.json">
    <link rel="mask-icon" href="/icon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/icon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="msapplication-TileImage" content="/icon/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <base href="/">

    <title ng-bind="title.get()"></title>
    <?php wp_head(); ?>
    <meta name="google-site-verification" content="AegUVUn84bKxjWMcMjmNLD9gxwyD0C_8TSASoJg7Yis" />
  </head>

  <body>
    <nav class="navbar-default navbar navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle admin collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=".">
            <img style="height: 50px;" class="img-responsive" src="<?php bloginfo('template_directory'); ?>/img/banner-web_x2.png" />
          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div ng-controller="menuController" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li ng-class="{ active: isActive('/news') }"><a href="news">Notizie</a></li>
            <!--<li ng-class="{ active: isActive('/calendar') }"><a href="calendar">Calendario</a></li>-->
            <li ng-class="{ active: isActive('/albums') }"><a href="albums">Dojo Gallery</a></li>
            <li role="presentation" class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                Risorse <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li ng-repeat="cat in category">
                  <a href="resource/{{cat.id}}">
                    <span ng-bind="cat.name"></span>
                  </a>
                </li>
              </ul>
            </li>
            <li ng-class="{ active: isActive('/about') }"><a href="about">Mentori</a></li>
            <li role="presentation" class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                Ninja <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li ng-repeat="n in ninja">
                  <a ng-href="{{BASE_URL + n.url}}" target='_blank'>
                    <span ng-bind="n.name"></span>
                  </a>
                </li>
              </ul>
            </li>
            <li ng-class="{ active: isActive('/mentor') }"><a href="mentor">Diventa Mentore</a></li>
            <li ng-class="{ active: isActive('/contact') }"><a href="contact">Contatti</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>

    <div class="carousel-header" ng-controller="CarouselCtrl" ng-show="home">
      <uib-carousel interval="myInterval">
        <uib-slide ng-repeat="slide in slides" active="slide.active">
          <img ng-src="{{slide.image}}" style="margin:auto;" />
          <div class="carousel-caption">
            <h4></h4>
            <p></p>
          </div>
        </uib-slide>
      </uib-carousel>
    </div>

    <div class="main row">
      <div class="col-sm-12">
        <div ng-view autoscroll="true"></div>
      </div>
    </div>

    <footer class="footer">
      <div class="container social">
        <div class="row">
          <div class="col-sm-5">

            <!-- Begin MailChimp Signup Form -->
            <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
            <div id="mc_embed_signup">
              <form action="//sfcoding.us10.list-manage.com/subscribe/post?u=eb8799a541ad4e7c8602cf884&amp;id=a55665e114" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                  <h4>Iscriviti alla nostra newsletter</h4>
                  <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;">
                    <input type="text" name="b_eb8799a541ad4e7c8602cf884_a55665e114" tabindex="-1" value="">
                  </div>
                  <div class="clear">
                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                  </div>
                </div>
              </form>
            </div>
            <!--End mc_embed_signup-->

          </div>
          <div class="col-sm-3">
            <cookie-law-wait>
              <div class="fb-like-box" data-href="https://www.facebook.com/pisacoderdojo" data-width="250" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="true">
              </div>
            </cookie-law-wait>
            <div>
              <a class="btn btn-social-icon btn-lg btn-github" href="https://github.com/PisaCoderDojo">
                <i class="fa fa-github"></i>
              </a>
              <span>GitHub</span>
            </div>
          </div>
          <div class="col-sm-4">
            <cookie-law-wait>
              <a class="twitter-timeline" href="https://twitter.com/PisaCoderDojo" data-chrome="" data-widget-id="575254844765765632" height="250" width="250">Tweetdi @PisaCoderDojo</a>
            </cookie-law-wait>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="text-muted">Le nostre collaborazioni</div>
        <img class="img-responsive img-col" src="<?php bloginfo('template_directory'); ?>/img/loghi.png" />
        <div class="privacy-policy">
          <a href="//www.iubenda.com/privacy-policy/961066" class="iubenda-black iubenda-embed" title="Privacy Policy">Privacy Policy</a>
        </div>
      </div>
    </footer>

    <!--FACEBOOK-sdk-->
    <div id="fb-root"></div>

    <!--SCRATCH-->
    <img id="scratch" src="<?php bloginfo('template_directory'); ?>/img/cat-a.png" />

    <!--COOKIE BANNER-->
    <!-- <script type="text/javascript" id="cookiebanner" src="http://cookiebanner.eu/js/cookiebanner.min.js" data-message="Questo sito o gli strumenti di terze parti che utilizza si avvalgono di cookie necessari al funzionamento e per gli scopi illustrati nella relativa policy; continuando con la navigazione si accetta l'utilizzo di tali cookie. Per maggiori dettagli "
    data-moreinfo="//www.iubenda.com/privacy-policy/961066" data-linkmsg="clicca qui">
    </script> -->
    <cookie-law-banner
      message="Questo sito o gli strumenti di terze parti che utilizza si avvalgono di cookie necessari al funzionamento e per gli scopi illustrati nella relativa policy"
      policy-url="http://www.iubenda.com/privacy-policy/961066"
      policy-button="true"
      policy-blank="true"
      element=".footer"
      accept-text="Ho capito">
    </cookie-law-banner>

  </body>
</html>
