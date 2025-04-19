<div class="mostwhatch">
        <h1>Most Watched</h1>
        <div id="customCarousel" class="carousel">
            
            <div class="carousel-inner">
              <div class="carousel-item">
              <?php echo "<a href='MoviePage.php?userid=".$uid."&id=2'>";?>
              <img src="Images/1917.jpeg" alt="Image 1">
              
              </div>
              <div class="carousel-item">
              <?php echo "</a><a href='MoviePage.php?userid=".$uid."&id=3'>";?>
                <img src="Images/Rio.jpeg" alt="Image 2">
              </div>
              <div class="carousel-item">
              <?php echo "</a><a href='MoviePage.php?userid=".$uid."&id=1'>";?>
              <img src="Images/PiratesOfTheCaribbean.jpeg" alt="Image 3">
              <?php echo"</a>" ?>
              </div>
            </div>
            <button class="carousel-control-prev" onclick="prevSlide()">&#10094;</button>
            <button class="carousel-control-next" onclick="nextSlide()">&#10095;</button>
          </div>
    </div>