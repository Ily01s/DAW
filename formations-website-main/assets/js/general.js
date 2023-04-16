function verifField(field){
    const formItem = field.closest('.form-item');
    const fieldWrapper = field.closest('.form-input-wrap');
    const fieldFeedbackText = formItem.querySelector('.form-feedback-text');
    let etat;

    if(field.value === '') {
        fieldWrapper.classList.add('form-input-wrap--incorrect');
        fieldFeedbackText.classList.remove('d-none');
        etat = false;
    } else {
        fieldWrapper.classList.remove('form-input-wrap--incorrect');
        fieldFeedbackText.classList.add('d-none');
        etat = true;
    }
    return etat
}