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
// Get the form element
// Add an event listener to the form submission
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("volunteerForm");

    form.addEventListener("submit", async function(event) {
        event.preventDefault();

        // Get form data
        const formData = new FormData(form);
        const emailValue = formData.get("email");
        const passwordValue = formData.get("password");

        // Password complexity requirements
        const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if (!passwordRegex.test(passwordValue)) {
            alert("Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, and one number.");
            return;
        }

        // Continue with form submission
        try {
            const response = await fetch(`/check_email?email=${emailValue}`, {
                method: "GET"
            });

            if (!response.ok) {
                throw new Error("Failed to check email availability");
            }

            const data = await response.json();

            if (!data.available) {
                const signInInstead = confirm("This email is already registered. Would you like to sign in instead?");
                if (signInInstead) {
                    window.location.href = "../pages/login.php"; // Redirect to login page
                    return;
                } else {
                    return; // Do not proceed with registration
                }
            }
        } catch (error) {
            console.error("Error:", error.message);
            alert("An error occurred while checking email availability. Please try again later.");
            return;
        }

        // If email is available, continue with form submission
        try {
            const response = await fetch("/register/volunteer", {
                method: "POST",
                body: formData
            });

            if (!response.ok) {
                throw new Error("Failed to submit form");
            }
            // Prompt the user that registration was successful
            window.alert("Registered successfully.");
            setTimeout(function() {
                window.location.href = "../pages/login.php"; // Redirect to login page
            }, 3000); // 3000 milliseconds = 3 seconds
        } catch (error) {
            console.error("Error:", error.message);
            alert("An error occurred while registering. Please try again later.");
        }
    });
})});
