import { alert } from "../data/variables.js";

const alertInfo = (type, message, icon) => {
  return (alert.innerHTML = `
  <p class="alert__content ${type}">
    <span><i class='${icon + " " + type}'></i></span>
   ${message}
  </p>`);
};

export default alertInfo;
