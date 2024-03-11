const deleteBtn = document.querySelectorAll('button.delete');
const massDelete = document.getElementById('massDelete');
const massDeleteBtn = document.querySelector('button.submitdeleteForm.mass');
const warningMessageContainer = document.querySelector('.warningMessageContainer#one');
const massWarningMessageContainer = document.querySelector('.warningMessageContainer#mass');
const closeWarning = document.querySelector('.closeWarning.one');
const massCloseWarning = document.querySelector('.closeWarning.mass');
const overlay = document.querySelector('.overlay.one');
const massOverlay = document.querySelector('.overlay.mass');
const deleteForm = document.querySelector('.deleteForm.one');



deleteBtn.forEach((element) =>
element.addEventListener('click', () => {
    const route = element.getAttribute('routeForDeleting');
    deleteForm.action = route;
    console.log(route);

    warningMessageContainer.classList.add('show')
}))

massDelete.addEventListener('click', () => {
    massWarningMessageContainer.classList.add('show')
})

massDeleteBtn.addEventListener('click', () => {
    // const route = massDeleteBtn.getAttribute('indexRoute');
    
    // window.location.href = route;
    massWarningMessageContainer.classList.remove('show')

});

const closeWarningFunction = () => {
    warningMessageContainer.classList.remove('show');
}

const closeMassWarningFunction = () => {
    massWarningMessageContainer.classList.remove('show');
}

closeWarning.addEventListener('click', closeWarningFunction);
overlay.addEventListener('click', closeWarningFunction);

massCloseWarning.addEventListener('click', closeMassWarningFunction);
massOverlay.addEventListener('click', closeMassWarningFunction);
