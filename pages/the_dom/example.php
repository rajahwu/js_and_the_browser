<?php include('../../private/initialize.php');
include(SHARED_PATH . '/header.php');
?>
<div class="container p-5 m-5 prose">
  <a href="..">back</a>
  <h1>The DOM Examples</h1>
  <h2 id="creating_nodes">Creating Nodes</h2>

  <?php
  echo '<code><pre>';
  echo '  function replaceImages() {
    let images = document.body.getElementsByTagName("img");
    for (let i = images.length - 1; i >= 0; i--) {
      let image = images[i];
      if (image.alt) {
        let text = document.createTextNode(image.alt);
        image.parentNode.replaceChild(text, image);
      }
    }
    
   const btn = document.getElementById("replace_btn"); 
   const btnText = document.getElementById("replace_btn_text");
   btn.setAttribute("disabled", true);
   btnText.setAttribute("data-button-pressed", "true");
   if(btnText.getAttribute("data-button-pressed") == "true") {
    btnText.style.display = "none"
   }
  }';
  echo '</pre></code>';
  ?>

  <div class="flex flex-col items-center justify-center border-2 p-5 mx-5 bg-slate-500 text-white">
    <p class="text-xl mb-0 h-16">The <img class="inline-block" src="./assets/cat.svg" width="16" height="16" alt="Cat"> in the
      <img class="inline-block" src="./assets/hat.svg" width="16" height="16" alt="Hat">.
    </p>
    <span class="text-orange-800 mx-auto" id="replace_btn_text">Press button to replace images with alt text</span>
    <button id="replace_btn" class="btn mt-0" onclick="replaceImages()">Replace</button>
  </div>

  <div id="attributes">
    <?php

    echo '<code><pre>';
    echo ' function elt(type, ...children) {
      let node = document.createElement(type);
      for (let child of children) {
        if (typeof child != "string") node.appendChild(child);
        else node.appendChild(document.createTextNode(child));
      }
      return node;
    }
  
    document.getElementById("quote").appendChild(
      elt("footer", "—",
          elt("strong", "Karl Popper"),
          ", preface to the second edition of ",
          elt("em", "The Open Society and Its Enemies"),
          ", 1950"));';
    echo '</pre></code>';
    ?>

    <div>
      <blockquote id="quote">
        No book can ever be finished. While working on it we learn
        just enough to find it immature the moment we turn away
        from it.
      </blockquote>
    </div>
  </div>


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

      const btn = document.getElementById("replace_btn");
      const btnText = document.getElementById("replace_btn_text");
      btn.setAttribute("disabled", true);
      btnText.setAttribute("data-button-pressed", "true");
      if (btnText.getAttribute("data-button-pressed") == "true") {
        btnText.style.display = 'none'
      }

    }

    function elt(type, ...children) {
      let node = document.createElement(type);
      for (let child of children) {
        if (typeof child != "string") node.appendChild(child);
        else node.appendChild(document.createTextNode(child));
      }
      return node;
    }

    document.getElementById("quote").appendChild(
      elt("footer", "—",
        elt("strong", "Karl Popper"),
        ", preface to the second edition of ",
        elt("em", "The Open Society and Its Enemies"),
        ", 1950"));
  </script>

  <?php include(SHARED_PATH . '/footer.php');
