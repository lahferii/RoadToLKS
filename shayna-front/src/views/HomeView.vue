<template>
  <div class="home">
    <headerShayna />
    <heroShayna />
    <womanShayna />
    <instaShayna />
    <partnerShayna />
    <footerShayna />
  </div>
</template>

<script>
// @ is an alias to /src
import headerShayna from '../components/headerShayna.vue';
import heroShayna from '../components/heroShayna.vue';
import womanShayna from '../components/womanShayna.vue';
import instaShayna from '../components/instaShayna.vue';
import partnerShayna from '../components/partnerShayna.vue';
import footerShayna from '../components/footerShayna';

export default {
  name: 'HomeView',
  components: {
    headerShayna,
    heroShayna,
    womanShayna,
    partnerShayna,
    instaShayna,
    footerShayna,
  }
}
</script>
