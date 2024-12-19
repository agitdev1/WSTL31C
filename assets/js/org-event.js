function editProjectStatus() {
    // Logic to edit project details
    alert("Edit Project Details clicked!");
}
function editProjectDetails() {
    // Logic to edit project details
    alert("Edit Project Details clicked!");
}
function completeEvent() {
    const statusElement = document.getElementById('event-status');
    statusElement.textContent = 'Completed';
    statusElement.className = 'status-completed';
}

function cancelEvent() {
    const statusElement = document.getElementById('event-status');
    statusElement.textContent = 'Cancelled';
    statusElement.className = 'status-cancelled';
}