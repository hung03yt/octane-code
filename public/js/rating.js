document.addEventListener('DOMContentLoaded', function () {
    const ratingStars = document.querySelectorAll('#star-rating .bi');
    let currentRating = 0;

    ratingStars.forEach(star => {
        star.addEventListener('mouseover', (event) => {
            const value = parseInt(event.target.getAttribute('data-value'));
            ratingStars.forEach((s, index) => {
                s.classList.toggle('bi-star-fill', index < value);
                s.classList.toggle('bi-star', index >= value);
            });
        });

        star.addEventListener('mouseout', () => {
            ratingStars.forEach((s, index) => {
                s.classList.toggle('bi-star-fill', index < currentRating);
                s.classList.toggle('bi-star', index >= currentRating);
            });
        });

        star.addEventListener('click', (event) => {
            currentRating = parseInt(event.target.getAttribute('data-value'));
            ratingInput.value = currentRating;
            const reviewModal = new bootstrap.Modal(document.getElementById('reviewModal'));
            reviewModal.show();
        });
    });
});
