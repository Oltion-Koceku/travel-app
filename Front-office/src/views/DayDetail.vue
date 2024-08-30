<script>
import loader from "@/components/partials/loader.vue";
import axios from "axios";
import { store } from "@/data/store";
import tt from "@tomtom-international/web-sdk-maps";
import '@tomtom-international/web-sdk-maps/dist/maps.css';


export default {
  data() {
    return {
      day: {},
      loader: false,
    };
  },

  components: {
    loader,
  },

  methods: {
    getApi() {
      this.loader = true;
      axios
        .get(
          `${store.api}/api/day-detail/${this.$route.params.slug}/${this.$route.params.date}`
        )
        .then((res) => {
          this.day = res.data.getDay;
          this.loader = false;
        })
        .catch((error) => {
          console.log(error.message);
          this.loader = false;
        });
    },

    initializeMap() {
      // Definisci la mappa come variabile normale
      const map = tt.map({
        key: "MYUKXTQBx1Oph0BydPSYcG0ftGO7hSXX",
        container: "map",
        center: [7.6553, 45.3961],
        zoom: 14,
      });

      map.on("dblclick", (e) => {
        e.preventDefault();
        const { lng, lat } = e.lngLat;
        this.addLngLat(map, lng, lat);
      });
    },

    addLngLat(map, lng, lat) {
  const marker = new tt.Marker({
    anchor: 'center'
  })
    .setLngLat([lng, lat])
    .addTo(map);
}


  },

  watch: {
    loader(newValue) {
      if (!newValue) {
        this.$nextTick(() => {
          this.initializeMap();
        });
      }
    },
  },

  mounted() {
    this.getApi();
  },
};
</script>


<template>
  <div class="container my-4">
    <loader v-if="loader" />
    <div v-else class="trips text-white">
      <div
        class="image d-flex justify-content-center flex-column align-items-center"
      >
        <img
          class="w-25"
          src="https://www.orec-europe.com//front/images/noimage.png"
          alt=""
        />

        <p>{{ day.date }}</p>
      </div>
      <div id="map" class="maps"></div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.trips {
  padding: 30px;
  background-color: #272626;
  #map {
    width: 100%;
    height: 500px;
  }
}
</style>
