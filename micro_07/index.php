<!doctype html>
<html>
  <head>
    <title>Micro 08</title>
    <style>
      .box {
        width: 25px;
        height: 25px;
        border: 1px solid black;
        float: left;
      }
      .yellow {
        background-color: yellow;
      }
      .green {
        background-color: green;
      }
      .blue {
        background-color: blue;
      }
      .orange {
        background-color: orange;
      }
      .red {
        background-color: red;
      }
      .pink {
        background-color: pink;
      }
    </style>
  </head>

  <body>
    <h1>Micro 08</h1>

    Pick a box color:
    <select id="colordropdown">
      <option value="yellow">Yellow</option>
      <option value="green">Green</option>
      <option value="blue">Blue</option>
      <option value="orange">Orange</option>
      <option value="red">Red</option>
      <option value="pink">Pink</option>
    </select>
    <button id="add">Add a new box</button>

    <div id="boxes"></div>

    <!-- the fetch convenience function -->
    <script src="fetch_convenience_function.js"></script>

    <!-- your custom code -->
    <script>

      // DOM references to our HTML elements
      let btn = document.getElementById('add');
      let boxes = document.getElementById('boxes');
      let color = document.getElementById('colordropdown');

      // Task #1 -  when the page loads you should initiate
      // a 'fetch' request to load the 'load_boxes.php' file --
      // this file will query a database and will obtain the
      // previously added boxes.
      //
      // The PHP file has been written for you, but you should read through
      // it as it represents a very common pattern for web development
      // (using a small file to obtain specific data for a piece of an application)
      // Note that the file uses a techique called JSON (JavaScript
      // Object Notation) which will allow the PHP file to send over a fully
      // populated Array that can be used right here in JavaScript!
      //
      // Once this information has been loaded you should create
      // divs for each one of these boxes and add them to the page. Each div
      // should be given a class of 'box', and a color class based on its color property.
      // This will have the effect of making the page "sticky" and
      // all boxes will exist forever, as long as they are represented
      // in the database.  The data itself is in a JSON format -- to
      // turn it into a JavaScript array simply use the "JSON.parse" function
      // For example:
      //
      //  success: function(data) {
      //      console.log("Success!");
      //      const jsonData = JSON.parse(data);
      //      console.log(jsonData);
      //  }
      //
      // note that the end result will be an array of objects

      async function getBoxes() {
        let result = await fetch('get_boxes.php');
        let data = await result.json();
        for (let i = 0; i < data.length; i++) {
          let box = data[i];
          let newBox = document.createElement('div');
          newBox.classList.add('box', box.color);
          boxes.appendChild(newBox);
        }
      }

      getBoxes();

  document.querySelector('#add').onclick=function(event){
    performFetch({
      url:'savebox.php',
      method:'POST',
      data:
      {
      color: color.value,
      },
      success:
      function(data){
      console.log("SUCCESS:" + data);
      let newElement = document.createElement('div');
      newElement.classList.add(color.value);
      newElement.classList.add('box');
      document.querySelector('#boxes').appendChild(newElement);
      },
      error: 
      function(message){
        console.log("ERROR:" + message);
      }
    });
  }

    </script>

  </body>

</html>
