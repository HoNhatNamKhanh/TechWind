document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelector(".slides");
    const slideCount = document.querySelectorAll(".slide").length;
    let currentIndex = 0;
  
    document.querySelector(".prev").addEventListener("click", () => {
      currentIndex = (currentIndex - 1 + slideCount) % slideCount;
      updateSlidePosition();
    });
  
    document.querySelector(".next").addEventListener("click", () => {
      currentIndex = (currentIndex + 1) % slideCount;
      updateSlidePosition();
    });
  
    function updateSlidePosition() {
      slides.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
  
    // Auto-slide every 5 seconds
    setInterval(() => {
      currentIndex = (currentIndex + 1) % slideCount;
      updateSlidePosition();
    }, 5000);
  });
  