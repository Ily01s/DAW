import { allInputTagValues, allInputTags } from "../data/variables.js";

const desactiveInputError = () => {
  const inputValues = allInputTagValues();
  inputValues.map((ele, i) => {
    if (ele === "") {
      allInputTags[i].classList.remove("bounce");
      allInputTags[i].style.outline = "unset";
    }
  });
};

const fillThisInputError = () => {
  const inputValues = allInputTagValues();
  inputValues.map((ele, i) => {
    if (ele === "") {
      allInputTags[i].classList.add("bounce");
      allInputTags[i].style.outline = "2px solid red";
    }
  });
};

export { fillThisInputError, desactiveInputError };
