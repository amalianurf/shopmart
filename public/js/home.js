document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".slider");
    const slides = document.querySelectorAll(".slide");
    const pagination = document.querySelector(".pagination");
  
    let currentIndex = 0;
  
    function updateSlider() {
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        updatePagination();
    }
  
    function updatePagination() {
        pagination.innerHTML = "";
        slides.forEach((_, index) => {
            const dot = document.createElement("span");
            dot.className = index === currentIndex ? "active" : "";
            dot.addEventListener("click", () => {
                currentIndex = index;
                updateSlider();
            });
            pagination.appendChild(dot);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider();
    }

    setInterval(nextSlide, 3000);

    updateSlider();
});