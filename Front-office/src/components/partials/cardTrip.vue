<template>
  <div  class="cardcontainer" >
    <div @click="this.$router.push({name: 'tripDetail', params: {slug: trip.slug}})" class="photo">
      <img
        v-if="trip.image"
        :src="`http://127.0.0.1:8000/storage/${trip.image}`"
      />
      <img v-else :src="`https://picsum.photos/200/300`" />
      <div class="photos">Photos</div>
    </div>
    <div class="content">
      <p class="txt4">{{ trip.name }}</p>
      <p class="txt5">{{ trip.start_date }} -> {{ trip.end_date }}</p>
      <p class="txt2">
        {{ trip.description }}
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props:{
    trip: Object
  }
};
</script>

<style lang="scss" scoped>
.cardcontainer {
  width: 350px;
  height: 550px;
  background-color: white;
  margin-left: auto;
  margin-right: auto;
  transition: 0.3s;
  margin-top: 20px;
}
.cardcontainer:hover {
  box-shadow: 0 0 45px gray;
}
.photo {
  height: 300px;
  width: 100%;
}
.photo img {
  height: 100%;
  width: 100%;
}
.txt1 {
  margin: auto;
  text-align: center;
  font-size: 17px;
}
.content {
  width: 80%;
  height: 100px;
  margin-left: auto;
  margin-right: auto;
  position: relative;
  top: -33px;
}
.photos {
  width: 90px;
  height: 30px;
  background-color: #e74c3c;
  color: white;
  position: relative;
  top: -30px;
  padding-left: 10px;
  font-size: 20px;
}
.txt4 {
  font-size: 27px;
  position: relative;
  top: 33px;
}
.txt5 {
  position: relative;
  top: 18px;
  color: #e74c3c;
  font-size: 23px;
}
.txt2 {
  position: relative;
  top: 10px;
}
.footer {
  width: 80%;
  height: 100px;
  margin-left: auto;
  margin-right: auto;
  background-color: white;
  position: relative;
  top: -15px;
}
.btn {
  position: relative;
  top: 20px;
}
#heart {
  cursor: pointer;
}
.like {
  float: right;
  font-size: 22px;
  position: relative;
  top: 20px;
  color: #333333;
}
.fa-gratipay {
  margin-right: 10px;
  transition: 0.5s;
}
.fa-gratipay:hover {
  color: #e74c3c;
}
.txt3 {
  color: gray;
  position: relative;
  top: 18px;
  font-size: 14px;
}
.comments {
  float: right;
  cursor: pointer;
}
.fa-clock,
.fa-comments {
  margin-right: 7px;
}
</style>