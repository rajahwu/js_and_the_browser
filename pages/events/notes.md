# Handling Events

## Event Handlers

```js
<p>Click this document to activate the handler.</p>
<script>
  window.addEventListener("click", () => {
    console.log("You knocked?");
  });
</script>
```

## Events and DOM nodes

Each browser event handler is registered in a context.

Event listeners are called only when the event happens in the context of the object they are registered on.

The **addEventListener** method allows you to add any number of handlers so that it is safe to add handlers even if there is already another handler on the element.

```js
<button>Click me</button>
<p>No handler here.</p>
<script>
  let button = document.querySelector("button");
  button.addEventListener("click", () => {
    console.log("Button clicked.");
  });
</script>
```

The **removeEventListener** method, called with arguments similar to addEventListener, removes a handler.

```js
<button>Act-once button</button>
<script>
  let button = document.querySelector("button");
  function once() {
    console.log("Done.");
    button.removeEventListener("click", once);
  }
  button.addEventListener("click", once);
</script>
```

## Event object

Handler functions are passed an argument: the **event object**.

```js
<button>Click me any way you want</button>
<script>
  let button = document.querySelector("button");
  button.addEventListener("mousedown", event => {
    if (event.button == 0) {
      console.log("Left button");
    } else if (event.button == 1) {
      console.log("Middle button");
    } else if (event.button == 2) {
      console.log("Right button");
    }
  });
</script>
```

## Propagaton

For most event types, handlers registered on nodes with children
  will also receive events that happen in the children.

The event is said to propagate outward, from the node where it happened
  to that node’s parent node and on to the root of the document.
  Finally, after all handlers registered on a specific node have had their turn, handlers registered on the whole window get a chance to respond to the event.

At any point, an event handler can call the **stopPropagation** method on the event object
  to prevent handlers further up from receiving the event.

```js
<p>A paragraph with a <button>button</button>.</p>
<script>
  let para = document.querySelector("p");
  let button = document.querySelector("button");
  para.addEventListener("mousedown", () => {
    console.log("Handler for paragraph.");
  });
  button.addEventListener("mousedown", event => {
    console.log("Handler for button.");
    if (event.button == 2) event.stopPropagation();
  });
</script>
```

Most event objects have a **target** property that refers to the node where they originated.

```js
<button>A</button>
<button>B</button>
<button>C</button>
<script>
  document.body.addEventListener("click", event => {
    if (event.target.nodeName == "BUTTON") {
      console.log("Clicked", event.target.textContent);
    }
  });
</script>
```

## Default actions

For most types of events, the JavaScript event handlers
  are called before the default behavior takes place.

If the handler doesn’t want this normal behavior to happen
  it can call the preventDefault method on the event object.

```js
<a href="https://developer.mozilla.org/">MDN</a>
<script>
  let link = document.querySelector("a");
  link.addEventListener("click", event => {
    console.log("Nope.");
    event.preventDefault();
  });
</script>
```

## Key events

When a key on the keyboard is pressed, your browser fires a "**keydown**" event.
  When it is released, you get a "**keyup**" event.

```js
<p>This page turns violet when you hold the V key.</p>
<script>
  window.addEventListener("keydown", event => {
    if (event.key == "v") {
      document.body.style.background = "violet";
    }
  });
  window.addEventListener("keyup", event => {
    if (event.key == "v") {
      document.body.style.background = "";
    }
  });
</script>
```

Despite its name, "**keydown**" fires not only when the key is physically pushed down.
  When a key is pressed and held, the event fires again every time the key repeats.

The example looked at the **key** property of the event object to see which key the event is about.

Modifier keys such as shift, control, alt, and meta (command on Mac) generate key events just like normal keys.

But when looking for key combinations, you can also find out whether these keys are held down
  by looking at the shiftKey, ctrlKey, altKey, and metaKey properties of keyboard and mouse events.

```js
<p>Press Control-Space to continue.</p>
<script>
  window.addEventListener("keydown", event => {
    if (event.key == " " && event.ctrlKey) {
      console.log("Continuing!");
    }
  });
</script>
```

The DOM node where a key event originates depends on the element that has focus when the key is pressed.

The DOM node where a key event originates depends on the element that has focus when the key is pressed.

When nothing in particular has focus, **document.body** acts as the target node of key events.

## Pointer events

### Mouse clicks

The "mousedown" and "mouseup" events are similar to "keydown" and "keyup" and fire
  when the button is pressed and released.

After the "mouseup" event, a "click" event fires on the most specific node that
  contained both the press and the release of the button.

For example, if I press down the mouse button on one paragraph and then move the
  pointer to another paragraph and release the button, the "click" event will
  happen on the element that contains both those paragraphs.

If two clicks happen close together, a "dblclick" (double-click) event also fires,
  after the second click event.

The clientX and clientY properties contain the event’s coordinates relative to the
  top-left corner of the window, or pageX and pageY properties

The pageX and pageY properties are relative to the top-left corner of the whole
  document (which may be different when the window has been scrolled).

The following implements a primitive drawing program. Every time you click the document, it adds a dot under your mouse pointer.

```php
<style>
  body {
    height: 200px;
    background: beige;
  }
  .dot {
    height: 8px; width: 8px;
    border-radius: 4px; /* rounds corners */
    background: blue;
    position: absolute;
  }
</style>
<script>
  window.addEventListener("click", event => {
    let dot = document.createElement("div");
    dot.className = "dot";
    dot.style.left = (event.pageX - 4) + "px";
    dot.style.top = (event.pageY - 4) + "px";
    document.body.appendChild(dot);
  });
</script>
```

### Mouse motion

Every time the mouse pointer moves, a "mousemove" event is fired.

This event can be used to track the position of the mouse.

A common situation in which this is useful is
  when implementing some form of mouse-dragging functionality.

As an example, the following program displays a bar and sets up event handlers so that dragging to the left or right on this bar makes it narrower or wider:

```js
<p>Drag the bar to change its width:</p>
<div style="background: orange; width: 60px; height: 20px">
</div>
<script>
  let lastX; // Tracks the last observed mouse X position
  let bar = document.querySelector("div");
  bar.addEventListener("mousedown", event => {
    if (event.button == 0) {
      lastX = event.clientX;
      window.addEventListener("mousemove", moved);
      event.preventDefault(); // Prevent selection
    }
  });

  function moved(event) {
    if (event.buttons == 0) {
      window.removeEventListener("mousemove", moved);
    } else {
      let dist = event.clientX - lastX;
      let newWidth = Math.max(10, bar.offsetWidth + dist);
      bar.style.width = newWidth + "px";
      lastX = event.clientX;
    }
  }
</script>
```

Note that the "mousemove" handler is registered on the whole window.

The buttons property (note the plural), which tells us about the buttons that are currently held down.

When this is zero, no buttons are down. When buttons are held, its value is the sum of the codes for those buttons—the left button has code 1, the right button 2, and the middle one 4. With the left and right buttons held, for example, the value of buttons will be 3.

### Touch events
