const forms = document.querySelectorAll('.HGyDl0')

forms.forEach((form) => {
    const formFields = form.querySelectorAll('input[type="text"], input[type="password"]');
    const formSelect = form.querySelector('select');
    const editButton = form.querySelector('.Q0zWnX');
    const validButton = form.querySelector('.F1m6jB');
    const resetButton = form.querySelector('.jmLISb');
    const deleteForm = form.parentElement.querySelector('.mPdJGF');

    if (editButton && resetButton && validButton) {
        editButton.addEventListener('click', (event) => {
            form.classList.add('enable-edit');
            event.preventDefault();
            formSelect.disabled = false;
            formFields.forEach((field) => {
                field.disabled = false;
                formFields[2].value = '';
                field.type = 'text';
            });

            //remove edit button and trash button and show valid button & reset button
            validButton.classList.remove('UPd2p4');
            resetButton.classList.remove('UPd2p4');
            editButton.classList.add('UPd2p4');
            if(deleteForm) {
                deleteForm.classList.add('UPd2p4');
            }
        });

        resetButton.addEventListener('click', () => {
            form.classList.remove('enable-edit')
            formSelect.disabled = true;
            formFields.forEach((field) => {
                field.disabled = true;
                formFields[2].type = 'password';
                field.type = 'text';
            });

            //remove edit button and show valid button
            validButton.classList.add('UPd2p4');
            resetButton.classList.add('UPd2p4');
            editButton.classList.remove('UPd2p4');
            if (deleteForm) {
                deleteForm.classList.remove('UPd2p4');
            }
        });
    }
});

//ADD A USER
const addButton = document.querySelector('.oJ2F7u');
const addUserForm = document.querySelector('.Ro0m');
const cancelBtn = document.querySelector('.Ro0m button[type="reset"]')

if(addButton && addUserForm && cancelBtn) {
    addButton.addEventListener('click', () => {
        addButton.classList.add('UPd2p4')
        addUserForm.classList.remove('d-none')
    });

    cancelBtn.addEventListener('click', () => {
        addButton.classList.remove('UPd2p4')
        addUserForm.classList.add('d-none')
    })
}


