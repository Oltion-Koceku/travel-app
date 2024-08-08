<script>
import axios from "axios";
import { store } from "../data/store.js";
export default {
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
            <div v-for="(trip, index) in data" :key="index" class="cardcontainer">
              <div class="photo">
                <img
                  src="https://images.pexels.com/photos/2346006/pexels-photo-2346006.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=1&w=500"
                />
                <div class="photos">Photos</div>
              </div>
              <div class="content">
                <p class="txt4">{{trip.name}}</p>
                <p class="txt5">{{trip.start_date}} ->  {{ trip.end_date }}</p>
                <p class="txt2">
                 {{trip.description}}
                </p>
              </div>
            </div>
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
    .cardcontainer{
        width: 350px;
        height: 550px;
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        transition: 0.3s;
        margin-top: 20px;
    }
    .cardcontainer:hover{
        box-shadow: 0 0 45px gray;
    }
    .photo{
        height: 300px;
        width: 100%;
    }
    .photo img{
        height: 100%;
        width: 100%;
    }
    .txt1{
        margin: auto;
        text-align: center;
        font-size: 17px;
    }
    .content{
        width: 80%;
        height: 100px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        top: -33px;
    }
    .photos{
        width: 90px;
        height: 30px;
        background-color: #E74C3C;
        color: white;
        position: relative;
        top: -30px;
        padding-left: 10px;
        font-size: 20px;
    }
    .txt4{
        font-size:27px;
        position: relative;
        top: 33px;
    }
    .txt5{
        position: relative;
        top: 18px;
        color: #E74C3C;
        font-size: 23px;
    }
    .txt2{
        position: relative;
        top: 10px;
    }
    .footer{
        width: 80%;
        height: 100px;
        margin-left: auto;
        margin-right: auto;
        background-color: white;
        position: relative;
        top: -15px;
    }
    .btn{
        position: relative;
        top: 20px;
    }
    #heart{
        cursor: pointer;
    }
    .like{
        float: right;
        font-size: 22px;
        position: relative;
        top: 20px;
        color: #333333;
    }
    .fa-gratipay{
        margin-right: 10px;
        transition: 0.5s;
    }
    .fa-gratipay:hover{
        color: #E74C3C;
    }
    .txt3{
        color: gray;
        position: relative;
        top: 18px;
        font-size: 14px;
    }
    .comments{
        float: right;
        cursor: pointer;
    }
    .fa-clock, .fa-comments{
        margin-right: 7px;
    }

  nav {
    border: solid 1px black;
    padding: 10px;
    text-align: center;
  }
}
</style>