const dropdownElements = document.querySelectorAll('.dropdown');
const DROPDOWN_OPEN_HEIGHT = 149;
const DROPDOWN_CLOSE_HEIGHT = 34;
const DROPDOWN_TRANSITION = {
    value: 300,
    unit: 'ms'
};

const transitionValue = Object.values(DROPDOWN_TRANSITION).join('');
document.documentElement.style.setProperty('--dropdown-transition', transitionValue);

dropdownElements.forEach((dropdownElement) => {
    const btnElement = dropdownElement.querySelector('button');

    if (btnElement) {
        btnElement.addEventListener('click', (evt) => {
            const dropdownElement = evt.target.closest('.dropdown');
            const isOpen = dropdownElement.classList.contains('dropdown--open')

            if (!dropdownElement) {
                return;
            }

            if (!isOpen) {
                dropdownElement.classList.add('dropdown--open');
                dropdownElement.style.height = DROPDOWN_OPEN_HEIGHT + 'px';
            } else {
                dropdownElement.classList.remove('dropdown--open');
                dropdownElement.style.height = DROPDOWN_CLOSE_HEIGHT + 'px';
            }
        });
    }
});
