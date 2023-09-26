// Get the existing <h2> elements and their following <p> elements
const h2Elements = document.querySelectorAll('h2');
const pElements = document.querySelectorAll('p');

// Get the slideshow container
const slideshowContainer = document.getElementById('slideshow-content');

const h1Element = document.querySelector('h1');
slideshowContainer.appendChild(h1Element);


// Loop through and move each <h2> and <p> element into a new <div> with the class "slideshow-item"
h2Elements.forEach((h2, index) => {

  const p = pElements[index];
  const slideshowItem = document.createElement('div');
  slideshowItem.classList.add('slideshow-item');

  // Clone the <h2> and <p> elements and append them to the new <div>
  slideshowItem.appendChild(h2.cloneNode(true));
  slideshowItem.appendChild(p.cloneNode(true));

  slideshowContainer.appendChild(slideshowItem);
});

// Remove the original <h2> and <p> elements
h2Elements.forEach((h2) => {
  h2.remove();
});

pElements.forEach((p) => {
  p.remove();
});

// Get the existing slideshow items (divs)
const slideshowItems = document.querySelectorAll('.slideshow-item');

// Create an array to keep track of the current slide
let currentIndex = 0;

function showSlide(index) {
  // Hide all slides (divs)
  slideshowItems.forEach((item) => {
    item.style.display = 'none';
  });

  // Show the current slide (div)
  slideshowItems[index].style.display = 'block';
}

function slideLeft() {
  slideshowItems[currentIndex].style.display = 'none';
  currentIndex = (currentIndex - 1 + slideshowItems.length) % slideshowItems.length;
  slideshowItems[currentIndex].style.display = 'block';
}

const leftSlideBtn = document.getElementById('left_slide_btn');
leftSlideBtn.addEventListener('click', slideLeft);

function slideRight() {
  slideshowItems[currentIndex].style.display = 'none';
  currentIndex = (currentIndex + 1) % slideshowItems.length;
  slideshowItems[currentIndex].style.display = 'block';
}

const rightSlideBtn = document.getElementById('right_slide_btn');
rightSlideBtn.addEventListener('click', slideRight);

// Show the first slide
showSlide(currentIndex);

// Start the slideshow
// setInterval(nextSlide, 4000); // Change slide every 4 seconds (adjust as needed)
