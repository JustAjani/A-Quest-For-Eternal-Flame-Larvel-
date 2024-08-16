document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            } else {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'translateY(50px)';
            }
        });
    }, {
        threshold: 0.1 // Trigger when at least 10% of the target is visible
    });

    const elementsToAnimate = document.querySelectorAll('.card, .text-container, h2, .slider, .video-container');
    elementsToAnimate.forEach(element => {
        element.style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
        element.style.opacity = '0';
        element.style.transform = 'translateY(50px)';
        observer.observe(element);
    });
});