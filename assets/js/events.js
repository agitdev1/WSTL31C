document.querySelector('form').addEventListener('submit', function(e) {
    const button = this.querySelector('.donate-button');
    button.classList.add('loading');
    button.disabled = true;
});