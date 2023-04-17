<script>
  export default {
    // state
    data() {
      return {
        data: "-- NO DATA --"
      }
    },
    mounted() {
      const vm = this;
      fetch('http://localhost:80/index.php').then(function (response) {
        // The API call was successful!
        return response.text();
      }).then(function (html) {
        // This is the HTML from our response as a text string
        console.log(html);
        vm.data = html;
      }).catch(function (err) {
        // There was an error
        console.warn('Something went wrong.', err);
      });
    }
  }
</script>

<template>
  <div class="about">
    <h1>Value from PHP: {{ data }}</h1>
  </div>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
