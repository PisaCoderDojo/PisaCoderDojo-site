window.fbAsyncInit = function () {
  FB.init({
    appId: '852604174797487',
    xfbml: true,
    version: 'v2.4'
  });
};
(function (d, s, id) {
  console.log("FACEBOOK");
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {
    return;
  }
  js = d.createElement(s);
  js.id = id;
  js.src = "//connect.facebook.net/it_IT/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
  console.log("FACEBOOK");
}(document, 'script', 'facebook-jssdk'));
