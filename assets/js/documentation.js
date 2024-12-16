const openTabBtn = document.getElementById('openTabBtn');
const pdfViewer = document.getElementById('pdfViewer');

// Open in New Tab functionality
openTabBtn.addEventListener('click', function() {
    try {
        window.open(pdfViewer.src, '_blank');
    } catch (error) {
        console.error('Error opening PDF in new tab:', error);
        alert('Could not open PDF in new tab. Please try again.');
    }
});

// PDF loading handler
pdfViewer.onload = function() {
    console.log('PDF loaded successfully');
};

pdfViewer.onerror = function() {
    console.error('Error loading PDF');
};