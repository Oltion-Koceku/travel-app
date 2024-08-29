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
          this.days = res.data.getDays.days;
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
          <tr class="text-center">
            <th scope="col">Giorno</th>
            <th scope="col">Immagine</th>
            <th scope="col">Modifica</th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="text-center center"
            v-for="(day, index) in days"
            :key="index"
          >
            <th class="d-flex align-items-center justify-content-center">{{ day.date }}</th>
            <th>
              <img
                class="w-25"
                src="data:image/png;base64,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"
                alt=""
              />
            </th  >
            <th class="d-flex align-items-center justify-content-center"><div @click="this.$router.push({ name: 'dayDetail', params: { slug: this.$route.params.slug, date: day.date } })" class="btn btn-warning w-50">Modifica</div></th>
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
  .center{
    th{
      height:  200px;
    }
  }
}
</style>