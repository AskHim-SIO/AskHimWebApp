<template>
  <div id="app">
      <div class="header">
        <navbar></navbar>
      </div>
      <div class="page">
        <router-view/>
      </div>
      <div class="footer">
        <footerbar></footerbar>
      </div>
  </div>
</template>
<script>

import navbar from "./components/navbar";
import footerbar from "./components/footerbar";

export default {
  name: 'App',
  components: {
    navbar,
    footerbar
  }
}
</script>


