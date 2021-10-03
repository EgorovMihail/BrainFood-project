"use strict";

/*получение элементов */
let body = document.getElementsByTagName("body"),
    header = document.querySelector(".header"),
    main = document.querySelector("main"),
    mainContentButton = document.querySelector(".main__content-button"),
    headerBtnEntry = document.querySelector(".header__btn-entry"),
    headerBtnRegistration = document.querySelector(".header__btn-registration"),
    headerContent = document.querySelector(".header__content"),
    popupRegContentClose =  document.querySelector(".popupReg__content-close"),
    popupReg =  document.querySelector(".popupReg"),
    popupAuthenticationContentClose =  document.querySelector(".popupAuthentication__content-close"),
    popupAuthentication =  document.querySelector(".popupAuthentication"),
    popup = document.querySelector(".popup"),
    popupContentClose =  document.querySelector(".popup__content-close");



/* ======= перевод иконок в svg формат ======= */
$("img.img-svg").each(function () {
  let $img = $(this);
  let imgClass = $img.attr("class");
  let imgURL = $img.attr("src");
  $.get(
    imgURL,
    function (data) {
      var $svg = $(data).find("svg");
      if (typeof imgClass !== "undefined") {
        $svg = $svg.attr("class", imgClass + " replaced-svg");
      }
      $svg = $svg.removeAttr("xmlns:a");
      if (!$svg.attr("viewBox") && $svg.attr("height") && $svg.attr("width")) {
        $svg.attr(
          "viewBox",
          "0 0 " + $svg.attr("height") + " " + $svg.attr("width")
        );
      }
      $img.replaceWith($svg);
    },
    "xml"
  );
});



/*======= меню бургер ====== */
let headerBtnBurger = document.querySelector(".header__btn-burger");
let menu = document.querySelector(".menu");

let burgerMenu = function () {
  if (headerBtnBurger) {
    headerBtnBurger.addEventListener("click", function (event) {
      document.body.classList.toggle("_lock");
      headerBtnBurger.classList.toggle("burger__active");
      menu.classList.toggle("menu__active");
    })
  }
};
burgerMenu();

let userRegistration = document.querySelector(".user-registration");
let registrationStyles = function () {
    /*Убираем рамку у меню регистрации  */
    
    userRegistration.style.border = "none";
    userRegistration.style.backgroundColor = "#494c53";



    /*Цвет input */
    let mainContentTegColor =  userRegistration.querySelectorAll("input");
    for (let i = 0; i < mainContentTegColor.length; i++) {
        mainContentTegColor[i].style.backgroundColor = "#C4C4C4";
    }

    /*кнопка регистрации */
    let   urSubmitButton = document.querySelector(".ur-submit-button");
    let   button = document.querySelector(".button");
 
    if (urSubmitButton) {
        urSubmitButton.style.color = "#f3eeee";
        urSubmitButton.style.fontSize = 16 + "px";
        urSubmitButton.style.backgroundColor = "#0FEE83";

    }
};
registrationStyles();
 
let correctLinks = function () {

    let userRegistrationLinkDashboard = document.querySelector(".user-registration-MyAccount-navigation-link--dashboard");
    if (userRegistrationLinkDashboard) {
        let linkUserRegistrationLinkDashboard = userRegistrationLinkDashboard.querySelector('a');
        linkUserRegistrationLinkDashboard.href = "http://brainfood-project/my-account/";
    }
    /* начало сменить пароль */
    let userRegistrationMyAccountNavigationLinkEditPassword = document.querySelector(".user-registration-MyAccount-navigation-link--edit-password");
    if (userRegistrationMyAccountNavigationLinkEditPassword) {
        let linkUserRegistrationEditPassword = userRegistrationMyAccountNavigationLinkEditPassword.querySelector('a');
        linkUserRegistrationEditPassword.href = "http://brainfood-project/my-account/edit-password/";
    }
    /*конец смены пароля */
    /* начало сменить пароль */
    let userRegistrationMyAccountNavigationLinkUserLogout = document.querySelector(".user-registration-MyAccount-navigation-link--user-logout");

    if (userRegistrationMyAccountNavigationLinkUserLogout) {
        let userRegistrationUserLogout = userRegistrationMyAccountNavigationLinkUserLogout.querySelector('a');
        let userRegistrationContent = document.querySelector(".user-registration-MyAccount-content");
        let userRegistrationContentTegP = userRegistrationContent.querySelectorAll("p");
        let userRegistrationContentTegGoOut = userRegistrationContentTegP[1].querySelector("a");
        let userRegistrationContentLinkGoOut = userRegistrationContentTegGoOut.href;
        userRegistrationUserLogout.href = userRegistrationContentLinkGoOut;
    }
    /*конец смены пароля */
};
correctLinks();

let authenticationStyles = function () {

    let authorizationWrap = document.querySelector(".authorization__wrap");
    if (authorizationWrap) {
        let mainContentTegColor =  authorizationWrap.querySelectorAll("p, span, h3, h2, strong, label, legend");

        if (mainContentTegColor ) {
            for (let i = 0; i < mainContentTegColor.length; i++) {
                mainContentTegColor[i].style.color = "#f3eeee"; 
            }
        }

        let userRegistrationNavigation  = document.querySelector(".user-registration-MyAccount-navigation");
        let userRegistrationContent = document.querySelector(".user-registration-MyAccount-content");

        if (userRegistrationNavigation ) {
            let mainContentTegColorLink =  authorizationWrap.querySelectorAll("a");
            for (let i = 0; i < mainContentTegColorLink.length; i++) {
                mainContentTegColorLink[i].style.color = "#0FEE83";  
            }
        }
        if (userRegistrationNavigation && userRegistrationContent) {
            userRegistrationNavigation.style.backgroundColor = "#3F4147";
            userRegistrationContent.style.backgroundColor = "#494c53";
        }

        let userRegistrationButton = document.querySelector(".user-registration-Button");
        if (userRegistrationButton) {
            userRegistrationButton.style.marginTop = 15 + "px";
            userRegistrationButton.style.borderRadius = 20 + "px";
            userRegistrationButton.style.backgroundColor = "#494C53";
            userRegistrationButton.style.color = "#f3eeee";


        }
    }

};
authenticationStyles();

let entrance = function () {
    let urFrontendForm = document.querySelector(".ur-frontend-form");
    if (urFrontendForm) {
        urFrontendForm.style.border = "none";
        urFrontendForm.style.border = "none";       
    }
    let userRegistrationAjaxLoginSubmit = document.getElementById("user_registration_ajax_login_submit");
    let userRegistrationResetPassword = document.getElementsByClassName("user-registration-ResetPassword");

    if ( userRegistrationAjaxLoginSubmit || userRegistrationResetPassword ) {
        
        let authorizationWrap = document.querySelector(".authorization__wrap");
        let width = document.body.clientWidth;
        if (width > 1200) {
            authorizationWrap.style.paddingRight = 30 + "%";
            authorizationWrap.style.paddingLeft = 30 + "%";
        }
        else if(width > 800){
                authorizationWrap.style.paddingRight = 20 + "%";
                authorizationWrap.style.paddingLeft = 20 + "%";
        }
        else if (width > 600){
                authorizationWrap.style.paddingRight = 10 + "%";
                authorizationWrap.style.paddingLeft = 10 + "%";
        }

        addEventListener("resize", function () {
            let width = document.body.clientWidth;
            if (width > 1200) {
                authorizationWrap.style.paddingRight = 30 + "%";
                authorizationWrap.style.paddingLeft = 30 + "%";
            }
            else if(width > 800){
                authorizationWrap.style.paddingRight = 20 + "%";
                authorizationWrap.style.paddingLeft = 20 + "%";
            }
            else if (width > 600){
                authorizationWrap.style.paddingRight = 10 + "%";
                authorizationWrap.style.paddingLeft = 10 + "%";
            }
        });

        /*востановить пароль */
       
        if (userRegistrationAjaxLoginSubmit) {
            let userRegistrationLostPassword = document.querySelector(".user-registration-LostPassword");
            let userRegistrationLostPasswordLink = userRegistrationLostPassword.querySelector("a");
            userRegistrationLostPasswordLink.style.color = "#0FEE83";
            userRegistrationLostPasswordLink.href = "http://brainfood-project/my-account/lost-password/";
        } 
    }


};
entrance();


/* ==== Перенаправление ===== */
let currentLocation = window.location;
let strLink = "http://brainfood-project/lost-password/?show-reset-form=true";
if (currentLocation == strLink) {
  window.location.href = 'http://brainfood-project/my-account/lost-password/?show-reset-form=true';
}

