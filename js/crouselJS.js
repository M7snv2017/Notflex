      
    let currentSlide = 0;
    const slides = document.querySelectorAll(".carousel-item");
    function showSlide(index) {
        const offset = -index * 100;
        document.querySelector(".carousel-inner").style.transform = `translateX(${offset}%)`;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    setInterval(nextSlide, 3000);