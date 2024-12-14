// Skills Dropdown
const selectedSkills = document.getElementById('selectedItems');
const skillsDropdownContent = document.querySelector('.dropdown-content');
const skillsCheckboxes = skillsDropdownContent.querySelectorAll('input[type="checkbox"]');

selectedSkills.addEventListener('click', () => {
    skillsDropdownContent.style.display = skillsDropdownContent.style.display === 'block' ? 'none' : 'block';
});

skillsCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        const selectedCheckboxes = Array.from(skillsCheckboxes).filter(i => i.checked);

        if (selectedCheckboxes.length > 4) {
            checkbox.checked = false;
            alert('You can only select up to 4 skills.');
            return;
        }

        const selected = selectedCheckboxes.map(i => i.value).join(', ');
        selectedSkills.textContent = selected || 'Select Skills';
    });
});

// Causes Dropdown
const selectedCauses = document.getElementById('selectedCauses');
const causesDropdownContent = selectedCauses.nextElementSibling;
const causesCheckboxes = causesDropdownContent.querySelectorAll('input[type="checkbox"]');

selectedCauses.addEventListener('click', () => {
    causesDropdownContent.style.display = causesDropdownContent.style.display === 'block' ? 'none' : 'block';
});

causesCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        const selectedCheckboxes = Array.from(causesCheckboxes).filter(i => i.checked);

        if (selectedCheckboxes.length > 4) {
            checkbox.checked = false;
            alert('You can only select up to 4 causes.');
            return;
        }

        const selected = selectedCheckboxes.map(i => i.value).join(', ');
        selectedCauses.textContent = selected || 'Select Causes';
    });
});

// Close dropdowns when clicking outside
document.addEventListener('click', (event) => {
    if (!event.target.closest('.dropdown')) {
        skillsDropdownContent.style.display = 'none';
        causesDropdownContent.style.display = 'none';
    }
});

function clearCheckboxes() {
    const allCheckboxes = document.querySelectorAll('.dropdown-content input[type="checkbox"]');
    allCheckboxes.forEach(checkbox => {
        checkbox.checked = false;
    });

    // Reset the displayed text for skills and causes
    document.getElementById('selectedItems').textContent = 'Select Skills';
    document.getElementById('selectedCauses').textContent = 'Select Causes';
}

// Call the function when the page loads
window.onload = clearCheckboxes;