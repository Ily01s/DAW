$(document).ready(function () {
  const form = document.getElementById("formSendMessage");
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    formData.append("action", "sendMessage");
    form.reset();
    sednAJAX(formData);
  });

  setInterval(() => {
    const formData = new FormData(form);
    formData.append("action", "refreshMessages");
    sednAJAX(formData);
  }, 5000);
});

function sednAJAX(formData) {
  fetch("../AJAX/AJAX-forum.php", {
    method: "post",
    body: formData,
  })
    .then(function (response) {
      return response.text();
    })
    .then(function (text) {
      refreshMessages(text);
    })
    .catch(function (error) {
      console.error(error);
    });
}

function refreshMessages(data) {
  let messagesContainer = document.getElementById("messagesContainer");
  messagesContainer.innerHTML = data;
}
