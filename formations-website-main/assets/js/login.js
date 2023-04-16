const createAccountBtn = document.querySelector('.create-an-account-btn');
const alreadyHaveAccountBtn = document.querySelector('.already-have-an-account-btn');
const loginForm = document.querySelector('.login-form-wrapper');
const signinForm = document.querySelector('.signin-form-wrapper');
const showPasswordBtns = document.querySelectorAll('.password-input-toggle');

const logInFields = loginForm.querySelectorAll('.login-form input');
const signInFields = signinForm.querySelectorAll('.signin-form input');

window.addEventListener('load', () => {
    // LOGIN FORM
    loginForm.addEventListener('submit',(event)=>{
        logInFields.forEach( (field) => {
            if (!verifField(field)) {
                event.preventDefault();
            }
        });
    })

    logInFields.forEach((field) => {
        field.addEventListener('input', function() {
            verifField(this);
        });
    });

    // SIGNIN FORM
    signinForm.addEventListener('submit',(event)=>{
        signInFields.forEach( (field) => {
            if (!verifField(field)) {
                event.preventDefault()
            }
        });
    })

    signInFields.forEach( (field) => {
        field.addEventListener('input', function() {
            verifField(this)
        });
    });

    //GLOBAL
    createAccountBtn.addEventListener('click', () => {
        document.title = 'FormU - Sign In';
        loginForm.classList.add('d-none');
        signinForm.classList.remove('d-none');
    });

    alreadyHaveAccountBtn.addEventListener('click', () => {
        document.title = 'FormU - Log In';
        loginForm.classList.remove('d-none');
        signinForm.classList.add('d-none');
    });

    showPasswordBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            const inputNode = btn.parentNode.children[0];
            if (inputNode.type === 'password') {
                btn.textContent = 'Cacher'
                inputNode.type = 'text';
            } else {
                btn.textContent = 'Afficher'
                inputNode.type = 'password';
            }
        })
    })
})