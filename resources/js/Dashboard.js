const deleteBtn = document.querySelectorAll('button.delete');
const warningMessageContainer = document.querySelector('.warningMessageContainer');
const closeWarning = document.querySelector('.closeWarning');
const overlay = document.querySelector('.overlay');
const deleteForm = document.querySelector('.deleteForm');

deleteBtn.forEach((element) =>
element.addEventListener('click', () => {
    const route = element.getAttribute('routeForDeleting');
    deleteForm.action = route;
    console.log(route);

    warningMessageContainer.classList.add('show')
}))

const closeWarningFunction = () => {
    warningMessageContainer.classList.remove('show');
}

closeWarning.addEventListener('click', closeWarningFunction);
overlay.addEventListener('click', closeWarningFunction);

