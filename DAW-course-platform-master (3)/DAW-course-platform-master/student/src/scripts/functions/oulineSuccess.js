import { inputs, inputValues } from "../data/variables";

const fillThisInputSucess = () => {
  const values = inputValues();
  for (let i = 0; i < values.length; i++) {
    if (values[i] !== "") {
      console.log(values[i]);
      inputs[i].style.outline = "1px solid #43a854";
    }
  }
  return;
};

const desactiveInputSuccess = () => {
  const values = inputValues();
  for (let i = 0; i < values.length; i++) {
    if (values[i] !== "") {
      inputs[i].style.outline = "unset";
    }
  }
  return;
};

export { fillThisInputSucess, desactiveInputSuccess };
