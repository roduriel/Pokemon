<template>
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 mt-3">
        <carousel :items-to-show="1.5" :wrap-around="true" :breakpoints="breakpoints">
          <slide v-for="(pokemon, index) in pokemons" :key="index" >
            <div class="carousel__item">
                <Cards v-bind:pokemon="pokemon" v-bind:slide="index" v-bind:url="pokemon.url"/>
            </div>
          </slide>
          <template #addons="{ slidesCount }">
            <navigation v-if="slidesCount > 1" />
            <pagination />
          </template>
        </carousel>
    </div>
  </template>
  <script>
    import 'vue3-carousel/dist/carousel.css';
    import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
    import Cards from "./cards.vue"
    
    export default {
      name: 'App',
      components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
        Cards,
      },
      data() {
        return {
        min:1,
        max:888,
        rnd:null,
        pokemons: null,
        names: [],
        loading: false,
        error: null
        };
      },
      created(){

        var random = Math.floor(this.min + Math.random() * (this.max - this.min));
        this.rnd = random;
        console.log(this.rnd);
    },
      mounted() {
          const url = 'https://pokeapi.co/api/v2/pokemon?offset='+this.rnd+'&limit=10';
        /* this.fetchNews(); */
        axios
        .get(url)
        .then(response =>(this.pokemons = response.data.results))
      }

    };
    </script>
    