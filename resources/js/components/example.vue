<div id="app">
    <countdown v-bind:counter="5"></countdown>
  </div>
  <script>
    // Write your code here

    var vm = new Vue({
      el: '#app'
    });



    // Example case
    let componentDiv = document.querySelector("#app > div");
    if(componentDiv) {
      componentDiv.click();
      componentDiv.click();
      setTimeout(() => {
        console.log(componentDiv.outerHTML);
      });
    }
  </script>
</body>
</html>
