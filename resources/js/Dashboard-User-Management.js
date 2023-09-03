const addBtn = document.querySelector('.add');
const userFormContainer = document.querySelector('.addUserFormContainer');
const closeUserForm = document.querySelector('.closeUserForm');
const overlay = document.querySelector('.overlay');

addBtn.addEventListener('click', () => {
    userFormContainer.classList.add('showForm')
})


const closeForm = () => {
    userFormContainer.classList.remove('showForm');
}

closeUserForm.addEventListener('click', closeForm);
overlay.addEventListener('click', closeForm);
