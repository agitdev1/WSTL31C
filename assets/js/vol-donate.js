document.addEventListener('DOMContentLoaded', function() {
    // Get the modal
    var modal = document.getElementById('donationModal');

    // Get the button that opens the modal
    var donateButton = document.querySelector('.donate-button');

    // Get the <span> element that closes the modal
    var closeModalButton = document.getElementById('closeModalButton');

    // Get the cancel button inside the modal
    var cancelButton = document.getElementById('cancelButton');

    // When the user clicks the donate button, open the modal 
    donateButton.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    // When the user clicks on <span> (x), close the modal
    closeModalButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // When the user clicks the cancel button, close the modal
    cancelButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission
        modal.style.display = 'none';
    });

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});