const passwordForm = document.querySelector('.password-form');
const passwordFields = document.querySelectorAll('input[type=password]');

window.addEventListener('load', () => {
    if (passwordForm && passwordFields) {
        passwordForm.addEventListener('submit',(event)=>{
            passwordFields.forEach((field) => {
                if(!verifField(field) || !verifPasswordsMatch(passwordFields[1])){
                    event.preventDefault();
                }
            });
        })

        passwordFields.forEach((field) => {
            field.addEventListener('input', function() {
                verifField(this);
            });
        });

        passwordFields[1].addEventListener('input', function() {
            verifPasswordsMatch(this);
        })
    }
})


function verifPasswordsMatch(field) {
    const formItem = field.closest('.form-item');
    const fieldWrapper = field.closest('.form-input-wrap');
    const fieldFeedbackText = formItem.querySelector('.form-feedback-text');
    let etat;

    if (passwordFields[0].value !== passwordFields[1].value && field.value.length > 0) {
        fieldWrapper.classList.add('form-input-wrap--incorrect');
        fieldFeedbackText.classList.remove('d-none');
        fieldFeedbackText.innerText = 'Les mot de passes ne sont pas identiques';
        etat = false;
    } else if (passwordFields[0].value === passwordFields[1].value && field.value.length > 0) {
        fieldWrapper.classList.remove('form-input-wrap--incorrect');
        fieldFeedbackText.classList.add('d-none');
        etat = true;
    } else {
        verifField(field);
        fieldFeedbackText.innerText = 'Mot de passe de confirmation vide';
        etat = false;
    }
    return etat;
}
