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

// Tags selection on game CRUD
const select = document.getElementById('tagsSelect');
const hiddenInput = document.getElementById('selectedTags');
const addedOptionsDiv = document.getElementById('addedTags');

const selectedOptions = new Set();

console.log(hiddenInput.value)
hiddenInput.value.split(" ").forEach(o => {
    addOption(o);
});

function addOption(selectedOptionInitial) {
    const selectedOption = selectedOptionInitial || select.value;
    if (isNaN(selectedOption)) return;
    console.log(selectedOption)
    const selectedOptionTag = Array.from(select.querySelectorAll('option')).find(o => o.value === selectedOption);
    if (selectedOption) {
        selectedOptions.add(selectedOption);
        hiddenInput.value = Array.from(selectedOptions).join(' ');
        const customSpan = document.createElement('span');
        customSpan.classList.add('hstack', 'gap-0', 'm-0', 'f-ai-center');
        customSpan.title = selectedOptionTag.title;
        customSpan.id = selectedOption;
        const removeBtn = document.createElement('button');
        removeBtn.addEventListener('click', () => removeOption(selectedOption));
        removeBtn.type = 'button';
        removeBtn.classList.add("removeTagButton", "stealth", "font-icon-button", "p-0", "f-ai-center", "f-jc-center");
        removeBtn.innerHTML = `&times`;
        customSpan.innerHTML = `
                    <span class="button game-tag">${selectedOptionTag.innerText}</span>
                `;
        customSpan.appendChild(removeBtn)
        // Display added options
        addedOptionsDiv.appendChild(customSpan);
    }
}

function removeOption(option) {
    selectedOptions.delete(option);
    hiddenInput.value = Array.from(selectedOptions).join(' ');
    const selectedOptionTag = Array.from(addedOptionsDiv.children).find(o => o.id === option);
    addedOptionsDiv.removeChild(selectedOptionTag);
}

select.addEventListener('change', () => addOption());
