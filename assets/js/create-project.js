// SKILLS MODAL
document.addEventListener("DOMContentLoaded", function() {
    const maxAllowed = 3;

    // Limit for skills checkboxes
    const skillsCheckboxes = document.querySelectorAll('#skillModal input[type="checkbox"]');
    skillsCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            let checkedCount = Array.from(skillsCheckboxes).filter(item => item.checked).length;
            if (checkedCount > maxAllowed) {
                this.checked = false;
                alert('You can select up to ' + maxAllowed + ' skills.');
            }
        });
    });

    // Limit for causes checkboxes
    const causesCheckboxes = document.querySelectorAll('#causesModal input[type="checkbox"]');
    causesCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            let checkedCount = Array.from(causesCheckboxes).filter(item => item.checked).length;
            if (checkedCount > maxAllowed) {
                this.checked = false;
                alert('You can select up to ' + maxAllowed + ' causes.');
            }
        });
    });

    const modal = document.getElementById("skillModal");
    const skillsInput = document.getElementById("skills");
    const closeBtn = document.querySelector(".close");
    const saveBtn = document.getElementById("saveSkills");
    const skillOptions = document.querySelectorAll("#skillOptions input[type='checkbox']");

    // Open modal when skills input is clicked
    skillsInput.addEventListener("click", function() {
        modal.style.display = "flex";
        modal.style.justifyContent = "center";
        modal.style.alignItems = "center";
    });

    // Close modal when close button is clicked
    closeBtn.addEventListener("click", function() {
        modal.style.display = "none";
    });

    // Close modal when clicked outside the modal content
    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });

    // Save selected skills when save button is clicked
    saveBtn.addEventListener("click", function() {
        const selectedSkills = Array.from(skillOptions)
            .filter(skill => skill.checked)
            .map(skill => skill.value);

        // Update the skills input with selected skills
        skillsInput.value = selectedSkills.join(", ");

        // Close modal after saving
        modal.style.display = "none";
    });
});
// CAUSES MODAL
document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("causesModal");
    const closeBtn = document.querySelector("#causesModal .close");
    const saveBtn = document.getElementById("saveCauses");
    const causeOptions = document.querySelectorAll("#causeOptions input[type='checkbox']");

    // Open modal when button is clicked
    const openCausesModalButton = document.getElementById("cause");
    openCausesModalButton.addEventListener("click", function() {
        modal.style.display = "flex";
        modal.style.justifyContent = "center";
        modal.style.alignItems = "center";
    });

    // Close modal when close button is clicked
    closeBtn.addEventListener("click", function() {
        modal.style.display = "none";
    });

    // Close modal when clicked outside the modal content
    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });

    // Allow only one cause to be selected
    causeOptions.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                causeOptions.forEach(function(otherCheckbox) {
                    if (otherCheckbox !== checkbox) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });

    // Save selected cause when save button is clicked
    saveBtn.addEventListener("click", function() {
        const selectedCauses = Array.from(causeOptions)
            .filter(cause => cause.checked)
            .map(cause => cause.value);

        // Update the form input with selected cause
        const causeInput = document.getElementById("cause");
        causeInput.value = selectedCauses.join(", ");

        // Close modal after saving
        modal.style.display = "none";
    });
});