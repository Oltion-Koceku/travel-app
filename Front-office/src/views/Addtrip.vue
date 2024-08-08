<script>
import axios from "axios";
import { store } from "../data/store.js";

export default {
  data() {
    return {
      trip: {
        name: "",
        start_date: "",
        end_date: "",
      },
    };
  },

  methods: {
    addTrip() {
      axios
        .post(store.api + "/api/trips", this.trip)
        .then((res) => {
          console.log(res.data);
          store.idTrip = res.data.id;
          this.$router.push({ name: "days" });
        })
        .catch((errors) => {
          console.log(errors.message);
        });
    },

    addDay() {
      axios
        .post(store.api + "/api/days", this.days)
        .then((res) => {
          console.log(res.data);
          // this.$router.push({ name: 'home' });
        })
        .catch((errors) => {
          console.log(errors.message);
        });
    },
  },

  mounted() {},
};
</script>

<template>
  <div>
    <div class="container my-5">
      <div class="main">
        <nav>
          <router-link :to="{ name: 'home' }" class="p-1 btn btn-success"
            >Torna Indietro</router-link
          >
        </nav>
        <div class="trips">
          <form @submit.prevent="addTrip">
            <div class="form-group mb-3">
              <label class="text-white" for="name">Nome Viaggio</label>
              <input
                type="text"
                class="form-control"
                id="name"
                v-model="trip.name"
                placeholder="Scrivi il nome del Viaggio"
              />
            </div>
            <div class="form-group mb-3">
              <label class="text-white" for="start_date">Data di inizio</label>
              <input
                type="date"
                class="form-control"
                id="start_date"
                v-model="trip.start_date"
                placeholder="Data di inizio"
              />
            </div>
            <div class="form-group mb-3">
              <label class="text-white" for="end_date"
                >Data di fine Viaggio</label
              >
              <input
                type="date"
                class="form-control"
                id="end_date"
                v-model="trip.end_date"
                placeholder="Data di fine Viaggio"
              />
            </div>

            <div class="form-group">
              <label class="text-white" for="end_date"
                >Descrizione</label
              >
              <textarea
                type="date"
                class="form-control"
                id="end_date"
                v-model="trip.end_date"
                placeholder="Descrizione..."
              />
            </div>
            <button type="submit" class="btn mt-4 btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.main {
  .trips {
    padding: 30px;
    background-color: #272626;
  }
  nav {
    border: solid 1px black;
    padding: 10px;
    text-align: center;
  }
}
</style>
