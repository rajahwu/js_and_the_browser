# [The Document Object Model](https://eloquentjavascript.net/14_dom.html)

The DOM acts as a live data structure.

* *Document Object Model*

```html
<!doctype html>
<html>
  <head>
    <title>My home page</title>
  </head>
  <body>
    <h1>My home page</h1>
    <p>Hello, I am Marijn and this is my home page.</p>
    <p>I also wrote a book! Read it
      <a href="http://eloquentjavascript.net">here</a>.</p>
  </body>
</html>
```

* global binding *document*
* *documentElement* property

## *Tree*

Each *node* may refer to other nodes, *children*, which in turn may have their own children.

We call a data structure a *tree* when it has a branching structure, has no cycles (a node may not contain itself, directly or indirectly), and has a single, well-defined *root*. In the case of the DOM, document.documentElement serves as the root.

* *leaves* nodes without children

![dom tree](./assets/dom_tree.png)

## DOM

Nodes for *elements* represent HTML tags

* *nodeType* property [mdn](https://developer.mozilla.org/en-US/docs/Web/API/Node/nodeType)
* *childNodes* propery
* *NodeList*

![moveing through dom tree](./assets/moving_throuogh_dom.png)

* *parentNode*
* *childNodes*
* *children*
* *firstChild* | *lastChild* properties
* *previousSibling* | *nextibling* properties

The following function scans a document for text nodes containing a given string and returns true when it has found one:

```js
function talksAbout(node, string) {
  if (node.nodeType == Node.ELEMENT_NODE) {
    for (let child of node.childNodes) {
      if (talksAbout(child, string)) {
        return true;
      }
    }
    return false;
  } else if (node.nodeType == Node.TEXT_NODE) {
    return node.nodeValue.indexOf(string) > -1;
  }
}

console.log(talksAbout(document.body, "book"));
// → true
The nodeValue property of a text node holds the string of text that it represents.
```

### Finding Elements

 ```js
let link = document.body.getElementsByTagName("a")[0];
console.log(link.href);
 ```

* *document.getElementById*

```html
<p>My ostrich Gertrude:</p>
<p><img id="gertrude" src="img/ostrich.png"></p>

<script>
  let ostrich = document.getElementById("gertrude");
  console.log(ostrich.src);
</script>
```

* *getElementsByClassName*
* *getElementsByTagName*

* *appendChild*
* *insertBefore*

```html
<p>One</p>
<p>Two</p>
<p>Three</p>

<script>
  let paragraphs = document.body.getElementsByTagName("p");
  document.body.insertBefore(paragraphs[2], paragraphs[0]);
</script>
```

* *replaceChild*

### Creating Nodes

```html
<p>The <img src="img/cat.png" alt="Cat"> in the
  <img src="img/hat.png" alt="Hat">.</p>

<p><button onclick="replaceImages()">Replace</button></p>

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
```

[see in browser](./example.php)
