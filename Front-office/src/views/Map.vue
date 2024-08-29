

<template>
  <div id="map"></div>
</template>

<script>
import tt from '@tomtom-international/web-sdk-maps';

export default {
  mounted() {
    const map = tt.map({
      key: 'MYUKXTQBx1Oph0BydPSYcG0ftGO7hSXX',
      container: 'map',
      center: [7.6553, 45.3961], 
      zoom: 14,
    });
  },
};
</script>

<style>
#map {
  width: 100%;
  height: 100vh;
}
</style>
