<script>
import axios from "axios";
import { store } from "../data/store.js";
import cardTrip from "@/components/partials/cardTrip.vue";
export default {
  components:{
    cardTrip
  },

  data() {
    return {
      data: {},
    };
  },

  methods: {
    getApi() {
      axios
        .get(store.api + "/api/trips")
        .then((res) => {
          this.data = res.data.trips;
          console.log(this.data);
          
        })

        .catch((errors) => {
          console.log(errors.message);
        });
    },
    
  },

  mounted() {
    this.getApi();
  },
};
</script>

<template>
  <div>
    <div class="container">
      <div class="main">
        <div class="trips">
            <cardTrip :trip="trip" v-for="(trip, index) in data" :key="index" />
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.main {
  .trips {
    background-color: #ffffff;
    display: flex;
    flex-wrap: wrap;
  }

  body{
        margin: 0;
        padding: 0;
        font-family: 'roboto' , sans-serif;
        background-color: #F2F2F2;
    }
    h1{
        text-align: center;
        color: #333333;
    }

  nav {
    border: solid 1px black;
    padding: 10px;
    text-align: center;
  }
}
</style>