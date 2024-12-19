document.querySelectorAll('.donate-button').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const form = this.closest('form');
        const modalForm = document.getElementById('donationForm');
        modalForm.event_name.value = form.event_name.value;
        modalForm.location.value = form.location.value;
        modalForm.start_date.value = form.start_date.value;
        modalForm.end_date.value = form.end_date.value;
        modalForm.organization.value = form.organization.value;
        openModal();
    });
});

document.getElementById('cancelButton').addEventListener('click', function(event) {
    event.preventDefault();
    closeModal();
});

document.getElementById('closeModalButton').addEventListener('click', closeModal);

function openModal() {
    document.getElementById('donationModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('donationModal').style.display = 'none';
    document.body.classList.remove('modal-open'); // Allow scrolling

    // Reset the form fields
    const modalForm = document.getElementById('donationForm');
    modalForm.reset();
}

