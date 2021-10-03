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




/*===== изменение фона у header при скроле ===== */
  window.addEventListener('scroll', function (event) {
    main.getBoundingClientRect();
    let widthMain = innerHeight;
    if (window.pageYOffset > widthMain - 150) {
    header.classList.add("header__active");
    }
    else{
      header.classList.remove("header__active");
    }
  });

  /* Плавная прокрутка к ссылкам якорям из header */
  let getGotoLinkHeader = function () {
    let    menuListLink  = document.querySelectorAll(".menu__list-link[data-goto]");
    
     if (menuListLink.length > 0 ) {
       menuListLink.forEach( menuListLink => {
         menuListLink.addEventListener("click", function (event) {
           const menuLink = event.target;
           if (menuLink.dataset.goto && document.querySelector(menuLink.dataset.goto)) {
             const gotoLink = document.querySelector(menuLink.dataset.goto);
             const gotoLinkValue = gotoLink.getBoundingClientRect().top + pageYOffset - header.offsetHeight;

              if (headerBtnBurger.classList.contains("burger__active")) {
                document.body.classList.remove("_lock");
                headerBtnBurger.classList.remove("burger__active");
                menu.classList.remove("menu__active");
              }

             window.scrollTo({
               top: gotoLinkValue,
               behavior:"smooth"
             });
             event.preventDefault();
           }
         });
     });
    }
  };
  getGotoLinkHeader();

  /* Плавная прокрутка к ссылкам якорям из footer */
  let getGotoLinkFooter = function () {
    let menuListLink  = document.querySelectorAll(".footer__inner-linck[data-goto]");
    
     if (menuListLink.length > 0 ) {
       menuListLink.forEach( menuListLink => {
         menuListLink.addEventListener("click", function (event) {
           const menuLink = event.target;
           if (menuLink.dataset.goto && document.querySelector(menuLink.dataset.goto)) {
             const gotoLink = document.querySelector(menuLink.dataset.goto);
             const gotoLinkValue = gotoLink.getBoundingClientRect().top + pageYOffset - header.offsetHeight;
             window.scrollTo({
               top: gotoLinkValue,
               behavior:"smooth"
             });
             event.preventDefault();
           }
         });
     });
    }
  };
  getGotoLinkFooter();

/*изменение активных ссылок при скроле */
  window.addEventListener("scroll", () => {
    let scrollDistance = window.scrollY;
    document.querySelectorAll(".scroll__section").forEach((el, i) => {
      if (el.offsetTop - header.clientHeight <= scrollDistance) {
        document.querySelectorAll(".menu a").forEach((el) => {
          if (el.classList.contains("active")) {
            el.classList.remove("active");
          }
        });

        document
          .querySelectorAll(".menu li")
          [i].querySelector("a")
          .classList.add("active");
      }
    });
  });


/* myLib start */
;(function() {
  window.myLib = {};

  window.myLib.body = document.querySelector('body');

  window.myLib.closestAttr = function(item, attr) {
    let node = item;

    while(node) {
      let attrValue = node.getAttribute(attr);
      if (attrValue) {
        return attrValue;
      }

      node = node.parentElement;
    }

    return null;
  };

  window.myLib.closestItemByClass = function(item, className) {
    let node = item;

    while(node) {
      if (node.classList.contains(className)) {
        return node;
      }

      node = node.parentElement;
    }

    return null;
  };

  window.myLib.toggleScroll = function() {
    myLib.body.classList.toggle('no-scroll');
  };
})();
/* myLib end */


/* catalog start */

let catalogFunction = function () {
  let catalogSection = document.querySelector('.section__courses');

  if (catalogSection === null) {
    return;
  }

  let removeChildren = function(item) {
    while (item.firstChild) {
      item.removeChild(item.firstChild);
    }
  };

  let updateChildren = function(item, children) {
    removeChildren(item);
    for (let i = 0; i < children.length; i += 1) {
      item.appendChild(children[i]);
    }
  };

  let catalog = catalogSection.querySelector('.course__content');
  let catalogNav = catalogSection.querySelector('.courses__filter');
  let catalogItems = catalogSection.querySelectorAll('.content__item');

  catalogNav.addEventListener('click', function(e) {
    let target = e.target;
    let item = myLib.closestItemByClass(target, 'courses__filter-text');

    if (item === null || item.classList.contains('courses__filter-text__active')) {
      return;
    }

    e.preventDefault();
    let filterValue = item.getAttribute('data-filter');
    let previousBtnActive = catalogNav.querySelector('.courses__filter-text.courses__filter-text__active');

    previousBtnActive.classList.remove('courses__filter-text__active');
    item.classList.add('courses__filter-text__active');

    if (filterValue === 'all') {
      updateChildren(catalog, catalogItems);
      return;
    }

    let filteredItems = [];
    for (let i = 0; i < catalogItems.length; i += 1) {
      let current = catalogItems[i];
      let categories = current.getAttribute('data-category').split(",");
      if (categories.indexOf(filterValue) !== -1) {
        filteredItems.push(current);
      }
    }

    updateChildren(catalog, filteredItems);
  });
}
catalogFunction();
/* catalog end */

/* ==== Перенаправление ===== */
let currentLocation = window.location;
let strLink = "http://brainfood-project/lost-password/?show-reset-form=true";
if (currentLocation == strLink) {
  window.location.href = 'http://brainfood-project/my-account/lost-password/?show-reset-form=true';
}
