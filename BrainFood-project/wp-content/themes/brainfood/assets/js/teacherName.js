"use strict";

let contentItem = document.querySelectorAll(".content__item");

if (contentItem) {
    let appData = {
        "Мочалов А.С.": "egorov.mihailegorov@yandex.ru",
        "Чернышева Л.П.": "489257mihail@gmail.com",
    };

    [].forEach.call(contentItem, element => {

        element.addEventListener("click", function (event) {
            let contentItemTeacherTag = element.querySelector("span");
            let contentItemTeacherDisciplin = contentItemTeacherTag.textContent;
            let contentItemTeacherName = contentItemTeacherDisciplin.split(":");/*получил имя преподавателя */
            let emailTeacher = "";
  
            if (appData.hasOwnProperty(contentItemTeacherName[1].trim())) {
                emailTeacher = appData[contentItemTeacherName[1].trim()];
            } 

            localStorage.setItem("Почта преподавателя", emailTeacher);
            localStorage.setItem("Имя преподавателя", contentItemTeacherName[1].trim());
        });  
    });
}
