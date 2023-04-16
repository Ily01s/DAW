const forgotPasswordForm = document.querySelector('.password-form');
const emailInput = document.querySelector("#form-input-email");

window.addEventListener('load', () => {
    if (forgotPasswordForm) {
        forgotPasswordForm.addEventListener('submit',(event)=>{
            if (!verifField(emailInput)) {
                event.preventDefault();
            }
        })

        emailInput.addEventListener('change',function(){
            verifField(this);
        })
    }
});