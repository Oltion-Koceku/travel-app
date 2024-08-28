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
        description: "",
        image: null, // Aggiungi un campo per l'immagine
      },
      errors: {}, // Aggiungi un oggetto per memorizzare gli errori
    };
  },

  methods: {
    addTrip() {
      const formData = new FormData();
      formData.append("name", this.trip.name);
      formData.append("start_date", this.trip.start_date);
      formData.append("end_date", this.trip.end_date);
      formData.append("description", this.trip.description);
      if (this.trip.image) {
        formData.append("image", this.trip.image);
      }

      axios
        .post(store.api + "/api/trips", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          console.log(res.data);
          store.idTrip = res.data.id;
          this.$router.push("/");
        })
        .catch((error) => {
          if (error.response && error.response.data) {
            this.errors = error.response.data.errors; // Memorizza gli errori
          } else {
            console.log(error.message);
          }
        });
    },

    handleFileUpload(event) {
      this.trip.image = event.target.files[0];
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
          <form @submit.prevent="addTrip" enctype="multipart/form-data">
            <div class="form-group mb-3">
              <label class="text-white" for="name">Nome Viaggio</label>
              <input
                type="text"
                class="form-control"
                id="name"
                v-model="trip.name"
                placeholder="Scrivi il nome del Viaggio"
              />
              <div v-if="errors.name" class="text-danger">
                {{ errors.name[0] }}
              </div>
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
              <div v-if="errors.start_date" class="text-danger">
                {{ errors.start_date[0] }}
              </div>
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
              <div v-if="errors.end_date" class="text-danger">
                {{ errors.end_date[0] }}
              </div>
            </div>
            <div class="form-group">
              <label class="text-white" for="description">Descrizione</label>
              <textarea
                class="form-control"
                id="description"
                v-model="trip.description"
                placeholder="Descrizione..."
              ></textarea>
              <div v-if="errors.description" class="text-danger">
                {{ errors.description[0] }}
              </div>
            </div>

            <div class="form-group mb-3">
              <label class="text-white" for="image">Carica Immagine</label>
              <input
                type="file"
                class="form-control"
                id="image"
                @change="handleFileUpload"
              />
              <div v-if="errors.image" class="text-danger">
                {{ errors.image[0] }}
              </div>
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
