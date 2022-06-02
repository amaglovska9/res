app.config(function($routeProvider) {
  $routeProvider
  .when("/", {
    templateUrl : "view/main.html",
	controller:"myCtrl"
  })
  .when("/table", {
    templateUrl : "view/table.html",
	controller:"myCtrl"
  })
  .when("/about", {
    templateUrl : "view/about.html",
	controller:"myCtrl"
  })
  
  .when("/contact", {
    templateUrl : "view/contact.html",
	controller:"myCtrl"
  })
  .when("/fudbal", {
    templateUrl : "view/fudbal.html",
	controller:"myCtrl"
  })
  .when("/fudbal2", {
    templateUrl : "view/fudbal2.html",
	controller:"myCtrl"
  })
  .when("/fudbal3", {
    templateUrl : "view/fudbal3.html",
	controller:"myCtrl"
  })
  .when("/fudbal4", {
    templateUrl : "view/fudbal4.html",
	controller:"myCtrl"
  })
  .when("/promocii", {
    templateUrl : "view/promocii.html",
	controller:"myCtrl"
  })
  .when("/rakomet", {
    templateUrl : "view/rakomet.html",
	controller:"myCtrl"
  })
  .when("/rezultati", {
    templateUrl : "view/rezultati.html",
	controller:"myCtrl"
  })
  .when("/promocii", {
    templateUrl : "view/promocii.html",
	controller:"myCtrl"
  })
  .when("/rakomet2", {
    templateUrl : "view/rakomet2.html",
	controller:"myCtrl"
  })
  .when("/novnatprevar", {
    templateUrl : "view/novnatprevar.html",
	controller:"myCtrl"
  })
  .when("/team", {
    templateUrl : "view/team.html",
	controller:"myCtrl"
  })
  .when("/login", {
    templateUrl : "view/login.html",
	controller:"myCtrl"
  })
  .when("/novosti", {
    templateUrl : "view/novosti.html",
	controller:"myCtrl"
  })
  .when("/kosarka", {
    templateUrl : "view/kosarka.html",
	controller:"myCtrl"
  })
  .when("/kosarka2", {
    templateUrl : "view/kosarka2.html",
	controller:"myCtrl"
  })
  .when("/signup", {
    templateUrl : "view/signup.html",
	controller:"myCtrl"
  });
});