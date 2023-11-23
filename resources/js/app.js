import '../decss/utils/dialogs/index.mjs';

const notifications = document.querySelectorAll('.notification-item');

notifications.forEach(m => {
    const closeModalButtons = m.querySelectorAll(`[data-item-hide="notification"]`);
    closeModalButtons.forEach(op => {
        op.addEventListener('click', () => {
            m.hidden = true;
        });
    });
    setTimeout(() => m.hidden = true, 5000);
})
