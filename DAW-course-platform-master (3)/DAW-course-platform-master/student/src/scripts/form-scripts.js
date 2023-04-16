$(document).ready(function () {});

import {
  alert,
  fileInputTag,
  thumbnail,
  form,
  messages,
  btn,
} from "./data/variables.js";
import alertInfo from "./functions/alertInfo.js";
import {
  fillThisInputError,
  desactiveInputError,
} from "./functions/outlineErrors.js";

if (btn.value == "createCourse") {
  fileInputTag.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(file);
      fileReader.addEventListener("load", (e) => {
        thumbnail.setAttribute("src", e.target.result);
      });
    } else {
      thumbnail.setAttribute(
        "src",
        "https://images.unsplash.com/profile-fb-1642446137-6bae7cc893b9.jpg?dpr=2&auto=format&fit=crop&w=60&h=60&q=60&crop=faces&bg=fff"
      );
    }
  });
}

if (btn.value == "createStudent") {
  fileInputTag.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(file);
      fileReader.addEventListener("load", (e) => {
        thumbnail.setAttribute("src", e.target.result);
      });
    } else {
      thumbnail.setAttribute(
        "src",
        "https://images.unsplash.com/profile-fb-1642446137-6bae7cc893b9.jpg?dpr=2&auto=format&fit=crop&w=60&h=60&q=60&crop=faces&bg=fff"
      );
    }
  });
}

if (btn.classList.contains("editCourse")) {
  fileInputTag.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(file);
      fileReader.addEventListener("load", (e) => {
        thumbnail.setAttribute("src", e.target.result);
      });
    } else {
      thumbnail.setAttribute(
        "src",
        "https://images.unsplash.com/profile-fb-1642446137-6bae7cc893b9.jpg?dpr=2&auto=format&fit=crop&w=60&h=60&q=60&crop=faces&bg=fff"
      );
    }
  });
}

if (btn.value == "createCourse") {
  form.addEventListener("submit", (e) => {
    alert.classList.add("active");
    const values = new FormData(form);
    console.log(values.get("courseLevel"));
    if (values.get("courseTitle") == "" || values.get("courseType") == "") {
      e.preventDefault();
      const { type, message, icon } = messages[1];
      fillThisInputError();
      alertInfo(type, message, icon);
    } else {
      const { type, message, icon } = messages[0];
      alertInfo(type, message, icon);
    }
    return setTimeout(() => {
      alert.classList.remove("active");
      desactiveInputError();
    }, 2500);
  });
}

if (btn.value == "createStudent") {
  form.addEventListener("submit", (e) => {
    alert.classList.add("active");
    const values = new FormData(form);
    console.log(values.get("courseLevel"));
    if (
      values.get("studentInterest") == "" ||
      values.get("studentName") == "" ||
      values.get("studentLastName") == "" ||
      values.get("studentDateOfBirth") == "" ||
      values.get("studentPassword") == "" ||
      values.get("studentRepeatPassword") == ""
    ) {
      e.preventDefault();
      const { type, message, icon } = messages[1];
      fillThisInputError();
      alertInfo(type, message, icon);
    } else {
      const { type, message, icon } = messages[0];
      alertInfo(type, message, icon);
    }
    return setTimeout(() => {
      alert.classList.remove("active");
      desactiveInputError();
    }, 2500);
  });
}

if (btn.value == "signin") {
  form.addEventListener("submit", (e) => {
    alert.classList.add("active");
    const values = new FormData(form);
    if (values.get("user") == "" || values.get("password") == "") {
      e.preventDefault();
      const { type, message, icon } = messages[1];
      fillThisInputError();
      alertInfo(type, message, icon);
    }

    return setTimeout(() => {
      alert.classList.remove("active");
      desactiveInputError();
    }, 2500);
  });
}
