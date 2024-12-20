document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.section');
  
    sections.forEach(section => {
      section.addEventListener('click', function() {
        const registerType = this.getAttribute('data-register-type');
        if (registerType === 'volunteer') {
          window.location.href = '../pages/user/register.php'; // Redirect to volunteer registration
        } else if (registerType === 'organization') {
          window.location.href = '../pages/admin/register-org.php'; // Redirect to organization registration
        }
      });
    });
  });