   // Get the modal
   var modal = document.getElementById("volunteerModal");

   // Get the button that opens the modal
   var btns = document.getElementsByClassName("volunteer-button");

   // Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close")[0];

   // Loop through all volunteer buttons and add click event
   for (let i = 0; i < btns.length; i++) {
       btns[i].addEventListener('click', function(event) {
           event.preventDefault(); // Prevent form submission
           openModal(); // Open modal
           modal.setAttribute('data-current-button-index', i);
       });
   }

   // Attach event listener to the join button in the modal
   var joinButton = document.querySelector(".join-button");
   joinButton.onclick = function() {
       // Get the index of the current volunteer button
       var currentButtonIndex = modal.getAttribute('data-current-button-index');
       if (currentButtonIndex !== null) {
           var volunteerButton = btns[currentButtonIndex];
           var unjoinButton = volunteerButton.nextElementSibling; // Get the corresponding unjoin button
           volunteerButton.style.display = "none"; // Hide the Volunteer button
           unjoinButton.style.display = "inline-block"; // Show the Unjoin button
       }
       closeModal(); // Close the modal after joining
   };

   // Attach event listener to all unjoin buttons
   var unjoinButtons = document.getElementsByClassName("unjoin-button");
   for (let i = 0; i < unjoinButtons.length; i++) {
       unjoinButtons[i].addEventListener('click', function(event) {
           var volunteerButton = this.previousElementSibling; // Get the corresponding volunteer button
           this.style.display = "none"; // Hide the Unjoin button
           volunteerButton.style.display = "inline-block"; // Show the Volunteer button
       });
   }

   // When the user clicks on <span> (x), close the modal
   span.onclick = function() {
       modal.style.display = "none";
   }

   // Function to open the modal and prevent background scrolling
   function openModal() {
       modal.style.display = "block";
       document.body.classList.add('modal-open'); // Add class to prevent scrolling
   }

   // Function to close the modal and restore background scrolling
   function closeModal() {
       modal.style.display = "none";
       document.body.classList.remove('modal-open'); // Remove class to restore scrolling
   }

   // Attach the closeModal function to the cancel button
   var cancelButton = document.getElementById("cancel-button");
   cancelButton.onclick = closeModal;

   // Attach the closeModal function to the close (x) button
   var closeButton = document.getElementsByClassName("close")[0];
   closeButton.onclick = closeModal;

   // Attach the closeModal function to clicks outside the modal
   window.onclick = function(event) {
       var modal = document.getElementById("volunteerModal");
       if (event.target == modal) {
           closeModal();
       }
   };

   // When the user clicks anywhere outside of the modal, close it
   window.onclick = function(event) {
       if (event.target == modal) {
           modal.style.display = "none";
       }
   }