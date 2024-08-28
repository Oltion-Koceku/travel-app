<script>
import { store } from "@/data/store";
import axios from "axios";
export default {
  data() {
    return {
      days: {},
    };
  },
  methods: {
    getApi() {
      axios
        .get(`${store.api}/api/trip-detail/${this.$route.params.slug}`)
        .then((res) => {
          console.log(res.data);
          this.days = res.data.days;
          console.log(this.days);
          
        })
        .catch((error) => {
          console.log(error.message);
        });
    },
  },

  mounted() {
    this.getApi();
  },
};
</script>

<template>
  <div class="container">
    <div class="trips">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Giorno</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(day, index) in days" :key="index">
            <th>{{ day.date }}</th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.trips {
  padding: 30px;
  background-color: #272626;
}
</style>