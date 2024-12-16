// Get modal elements
const volunteerModal = document.getElementById("volunteerModal");
const unjoinModal = document.getElementById("unjoinModal");

// Get buttons
const volunteerButtons = document.querySelectorAll(".volunteer-button");
const unjoinButtons = document.querySelectorAll(".unjoin-button");
const cancelButton = document.getElementById("cancel-button");
const unjoinCancelButton = document.getElementById("unjoin-cancel-button");
const joinButton = document.querySelector(".join-button");
const confirmUnjoinButton = document.querySelector(".confirm-unjoin-button");

// Get close buttons
const volunteerCloseBtn = volunteerModal.querySelector(".close");
const unjoinCloseBtn = unjoinModal.querySelector(".close");

// Store the current event buttons
let currentVolunteerButton;
let currentUnjoinButton;

// Add click event to all volunteer buttons
volunteerButtons.forEach(button => {
    button.addEventListener("click", function() {
        currentVolunteerButton = this;
        currentUnjoinButton = this.nextElementSibling; // Get the unjoin button
        volunteerModal.style.display = "block";
    });
});

// Add click event to all unjoin buttons
unjoinButtons.forEach(button => {
    button.addEventListener("click", function() {
        currentUnjoinButton = this;
        currentVolunteerButton = this.previousElementSibling; // Get the volunteer button
        unjoinModal.style.display = "block";
    });
});

// When user clicks Join button
joinButton.onclick = function() {
    volunteerModal.style.display = "none";
    if (currentVolunteerButton && currentUnjoinButton) {
        currentVolunteerButton.style.display = "none";
        currentUnjoinButton.style.display = "block";
    }
}

// When user confirms unjoin
confirmUnjoinButton.onclick = function() {
    unjoinModal.style.display = "none";
    if (currentVolunteerButton && currentUnjoinButton) {
        currentUnjoinButton.style.display = "none";
        currentVolunteerButton.style.display = "block";
    }
}

// Close buttons functionality
volunteerCloseBtn.onclick = function() {
    volunteerModal.style.display = "none";
}

unjoinCloseBtn.onclick = function() {
    unjoinModal.style.display = "none";
}

// Cancel buttons functionality
cancelButton.onclick = function() {
    volunteerModal.style.display = "none";
}

unjoinCancelButton.onclick = function() {
    unjoinModal.style.display = "none";
}

// Close modals when clicking outside
window.onclick = function(event) {
    if (event.target == volunteerModal) {
        volunteerModal.style.display = "none";
    }
    if (event.target == unjoinModal) {
        unjoinModal.style.display = "none";
    }
}