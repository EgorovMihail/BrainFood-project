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

 /*анимация меню навигации */
  let sidebarNavButton = document.querySelector(".sidebar__nav-circleExternal");
  let sidebarNav = document.querySelector(".sidebar__nav");
  let sidebarNavImg = document.querySelector(".sidebar__nav-button");
  let content = document.querySelector(".content");

  let count = 0;
  
  let animateNavMenu = function (event) {
    count++;


     if (count % 2 == 1) {
      sidebarNavImg.classList.toggle("sidebar__nav-button-rotate");
      content.style.justifyContent = "flex-end";
      sidebarNav.style.position = "absolute";
      sidebarNav.style.left = (-sidebarNav.offsetWidth + sidebarNavImg.offsetWidth) + "px" ;

      sidebarNav.style.height = main.offsetHeight + "px";
    
      main.style.marginLeft = "75px";
      setTimeout(() => { 
        main.style.width = 100+"%";   
      }, 500);
    
    }
    else{
      sidebarNav.style.position = "relative";
      content.style.justifyContent = "space-between";
      main.style.marginLeft = "30px";
      setTimeout(() => { 
          main.style.width = 100 + "%";   
      }, 300);
      sidebarNavImg.classList.toggle("sidebar__nav-button-rotate");
      sidebarNav.style.left = 0;
      
      sidebarNav.style.height = 100+"%";
    }
  };
  sidebarNavButton.addEventListener("click", animateNavMenu);

  /*===== Всплывающее окно Задать вопрос ======= */
  mainContentButton.addEventListener("click", function(event) {
    popup.classList.toggle("popup-active");
  });
  popupContentClose.addEventListener("click", function(event) {
      popup.classList.toggle("popup-active");
  });
  // Клик по фону, но не по окну.
  $('.popup').click(function(event) {
  	if ($(event.target).closest('.popup__dialog').length == 0) {
       popup.classList.toggle("popup-active");					
  	}
  });	

  /*валидация формы задать вопрос */
  let formInputName = document.querySelector(".form__input-name");
  let formInputUser_nicename = document.querySelector(".form__input-user_nicename");
  let formInputEmail = document.querySelector(".form__input-email");
  let formInputTeacherEmail = document.querySelector(".form__input-teacherEmail");
  let formInputTeacherName = document.querySelector(".form__input-teacherName");
  let popupFormText = document.querySelector(".popup__form-text");

  
  let teacherEmail = localStorage.getItem("Почта преподавателя");
  let teacherName = localStorage.getItem("Имя преподавателя");

   if (formInputName) {
     formInputTeacherEmail.value = teacherEmail;
   }
   if (formInputName) {
     formInputTeacherName.value = teacherName;
   }
   
   

  document.addEventListener("DOMContentLoaded", function (event) {

    const form = document.querySelector(".popup__form");
    form.addEventListener("submit", formSend);

    async function formSend(event) {
      event.preventDefault();

      let error = formValidate(form);
      let formData = new FormData(form);

      if (error == 0) {
        form.classList.add("_sending");

        let responseEmail = await fetch("http://brainfood-project/wp-content/themes/brainfood/mailInEmail.php", {
          method: 'POST',
          body: formData,
        });
        let responseTelegram = await fetch("http://brainfood-project/wp-content/themes/brainfood/mailInTelegram.php",{
          method: 'POST',
          body: formData,
        });

        if (responseEmail.ok && responseTelegram.ok) {
          alert("Вопрос успешно отправлен");
          popupFormText.value = "";//очищение поля "вопрос"
          form.classList.remove("_sending");
        }
        else{
          alert("Произошла непредвиденная ошибка");
          form.classList.remove("_sending");
        }
        
      }
      else{
        alert("Проверте правильность заполнения полей");
      }
    }

    function formValidate(form) {
      let error = 0;
      let formReq = document.querySelectorAll("._req");

      for (let i = 0; i < formReq.length; i++) {
        const input = formReq[i];

        formRemoveError(input);
        
        /*проверка Имени */
        if (input.classList.contains("form__input-name")) {

          if(input.value === ""){
            formAddError(input);
            error++;
          }
          else{
            /*убираем лишние пробелы */
            let name = input.value;
            name =  name.trim().replace(/ {2,}/g, ' ').split(" ");

            if (nameTest(name)) {
              formAddError(input);
              error++;
            }
          }
          
        }

        /*проверка фамилии */
        if (input.classList.contains("form__input-user_nicename")) {

          if(input.value === ""){
            formAddError(input);
            error++;
          }
          else{
            let lastName = input.value;
            lastName =  lastName.trim().replace(/ {2,}/g, ' ').split(" ");

            if (lastNameTest(lastName)) {
              formAddError(input);
              error++;
            }

          }
        }

        /*проверка email */
        if (input.classList.contains("form__input-email")) {
          if(input.value === ""){
            formAddError(input);
            error++;
          }else{
            let email = input.value;
            email = email.trim();

            if (emailTest(email)) {
            formAddError(input);
            error++;
            }
          }
        }

        /*проверка поля вопроса */
        if (input.classList.contains("popup__form-text")) {
          if(input.value === ""){
            formAddError(input);
            error++;
          }
        }
                
      }
      return error;
    }
    

    function formAddError(input) {
      input.parentElement.classList.add("_error");
      input.classList.add("_error");
    }
    function formRemoveError(input) {
      input.parentElement.classList.remove("_error");
      input.classList.remove("_error");
    }

    /*если true то ошибка накапливается */
    /*тест имени */
    function nameTest(name) {
     
      for (let i = 0; i < name.length; i++) {
        let element = name[i];

        element = element.split("");
        let namber = element[0];
        
        if (Number(namber)) {
          return true;
        }
      }
    }
    /*тест фамилии */
    function lastNameTest(lastName) {
      for (let i = 0; i < lastName.length; i++) {
        let element = lastName[i];

        element = element.split("");
        let namber = element[0];

        if (Number(namber)) {
          return true;
        }
      }
    }
    /*тест email */
    function emailTest(email) {
      return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(email.value);
    }

  });


/*стили для страниц с контентом */
  let menuItemLi = document.querySelector(".menu-item");/*li */
  let sidebarNavList = document.querySelector(".sidebar__nav-list");/*внешний ul */
  let subMenu = document.querySelectorAll(".sub-menu");/*вложенный ul */


  /*установка цвета текста */
  let mainContent = document.querySelector(".main__content "); 
  let mainContentTegColor =  mainContent.querySelectorAll("p, figcaption, strong, h2, li, ul,span, label");

  for (let i = 0; i < mainContentTegColor.length; i++) {
    mainContentTegColor[i].classList.add("mainContentTegColor");
  }


/* ==== Перенаправление ===== */
let currentLocation = window.location;
let strLinkRessetPas = "http://brainfood-project/lost-password/?show-reset-form=true";
let strLinkTest = "http://brainfood-project/quiz/";
let strLinkContains = "http://brainfood-project/quiz/";

if (currentLocation == strLinkRessetPas) {
  window.location.href = 'http://brainfood-project/my-account/lost-password/?show-reset-form=true';
}

if (currentLocation.href.includes(strLinkContains)) {
  let sidebarMenu = document.querySelector(".sidebar__menu");
  sidebarMenu.style.display = "none";
  sidebarNav.style.display = "none";
  mainContent.style.width = 100 + "%";
}


if (getComputedStyle(sidebarNav).display != "none") {
  /*стили для li */
  let itemLink = sidebarNavList.querySelectorAll('li');
  if (menuItemLi) {
    for (let i = 0; i < itemLink.length; i++) {
      itemLink[i].classList.add("sidebar__nav-item");
      itemLink[i].classList.add("sidebar__nav-item-module");
    }
  }

  /*стиилии для ссылок */
  let link = sidebarNavList.querySelectorAll('a');
  for(let i = 0; i < link.length; i++){
    link[i].classList.add('sidebar__nav-link');
  }

  for (let i = 0; i < subMenu.length; i++) {
    let subMenuLink = subMenu[i].querySelectorAll('a');
    let itemLinks = subMenu[i].querySelectorAll('li');

    for (let i = 0; i < subMenuLink.length; i++) {
      itemLinks[i].classList.remove("sidebar__nav-item-module");
      subMenuLink[i].classList.add("sidebar__nav-item-theme");
    }
  }
  
}


