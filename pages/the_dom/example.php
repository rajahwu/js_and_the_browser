<?php include('../../private/initialize.php'); 
      include(SHARED_PATH . '/header.php');
?>

<a href="..">back</a>

<div class="flex">

  <p>The <img class="inline-block" src="./assets/cat.svg" width="16" height="16" alt="Cat"> in the
  <img class="inline-block" src="./assets/hat.svg" width="16" height="16" alt="Hat">.</p>
</div>
<button class="btn" onclick="replaceImages()">Replace</button>
  
  <script>
    function replaceImages() {
      let images = document.body.getElementsByTagName("img");
      for (let i = images.length - 1; i >= 0; i--) {
        let image = images[i];
        if (image.alt) {
          let text = document.createTextNode(image.alt);
          image.parentNode.replaceChild(text, image);
        }
      }
    }
  </script>

  <?php include(SHARED_PATH . '/footer.php');