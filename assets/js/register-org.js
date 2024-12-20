document.addEventListener("DOMContentLoaded", function() {
    // SKILLS MODAL
    const skillModal = document.getElementById("skillsModal");
    const skillsInput = document.getElementById("skills");
    const skillCloseBtn = document.querySelector("#skillsModal .close");

    skillsInput.addEventListener("click", function() {
        skillModal.style.display = "flex";
    });

    skillCloseBtn.addEventListener("click", function() {
        skillModal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target === skillModal) {
            skillModal.style.display = "none";
        }
    });

    const skillCheckboxes = document.querySelectorAll("#skillOptions input[type=checkbox]");
    skillCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener("click", function(event) {
            const numChecked = document.querySelectorAll("#skillOptions input[type=checkbox]:checked").length;
            if (numChecked > 3) {
                event.preventDefault();
                alert("You can only select 3 priorities.");
            }
        });
    });

    const saveSkillsBtn = document.getElementById("saveSkills");
    saveSkillsBtn.addEventListener("click", function() {
        const selectedSkills = Array.from(document.querySelectorAll("#skillOptions input[type=checkbox]:checked")).map(function(checkbox) {
            return checkbox.value;
        });

        if (selectedSkills.length > 3) {
            alert("You can only select 3 skills.");
            return;
        }

        skillsInput.value = selectedSkills.join(", ");
        skillModal.style.display = "none";
    });

    // CAUSES MODAL
    const causesModal = document.getElementById("causesModal");
    const causeInput = document.getElementById("cause");
    const causeCloseBtn = document.querySelector("#causesModal .close");

    causeInput.addEventListener("click", function() {
        causesModal.style.display = "flex";
    });

    causeCloseBtn.addEventListener("click", function() {
        causesModal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target === causesModal) {
            causesModal.style.display = "none";
        }
    });

    const causeCheckboxes = document.querySelectorAll("#causeOptions input[type=checkbox]");
    causeCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener("click", function(event) {
            const numChecked = document.querySelectorAll("#causeOptions input[type=checkbox]:checked").length;
            if (numChecked > 3) {
                event.preventDefault();
                alert("You can only select 3 causes.");
            }
        });
    });

    const saveCausesBtn = document.getElementById("saveCauses");
    saveCausesBtn.addEventListener("click", function() {
        const selectedCauses = Array.from(document.querySelectorAll("#causeOptions input[type=checkbox]:checked")).map(function(checkbox) {
            return checkbox.value;
        });

        if (selectedCauses.length > 3) {
            alert("You can only select 3 causes.");
            return;
        }

        causeInput.value = selectedCauses.join(", ");
        causesModal.style.display = "none";
    });

    // Show Password
    const showPasswordCheckbox = document.getElementById("peek");
    const passwordInput = document.getElementById("password");

    showPasswordCheckbox.addEventListener("change", function() {
        passwordInput.type = this.checked ? "text" : "password";
    });

    // Form submission
    const form = document.getElementById("organizationForm");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        // Directly redirect to the login page
        window.location.href = "../pages/login.php";
    });
});