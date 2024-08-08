<script>
  export default {
    components:{

    }
  }
</script>

<template>
  <div class="nav d-flex justify-content-around">
    <div class="title d-flex align-items-center">
      <h1>Travel-App</h1>
    </div>
    
    <div class="button d-flex justify-content-between align-items-center">
      <button><i class="fa-solid fa-map"></i></button>
      <router-link :to="{ name : 'addtrip' }" ><i class="fa-solid fa-plus"></i></router-link>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.title{
  color:green;
  h1{
  font-weight: 700;
  }
  
}
.button{
  width: 100px;
  button{
    border: none;
    height: 30px;
    width: 30px;
    background-color: white;
    border: 1px solid greenyellow;
    color: green;
  }
}

</style>