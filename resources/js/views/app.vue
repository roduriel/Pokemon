<template>
      <div class="row pt-5 justify-content-center">
        <div class="col-6" id="searcher">
            <!-- <form> -->
                <div class="input-group" >
                <input class="form-control form-control-lg rounded-pill py-2 pr-5 mr-1 bg-transparent" type="search" placeholder="Buscar por N° o por Nombre" id="search-input1" v-model="words">
                <span class="input-group-append">
                    <button class="btn border-0 bg-transparent ml-n5" type="button">
                    <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
<!--             </form> -->
        </div>
      </div>
      <div class="row justify-content-center">
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
      </div>
</template>
  <script>
    import 'vue3-carousel/dist/carousel.css';
    import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
    import Cards from "./cards.vue"
    import Searcher from "./searcher.vue"
    
    export default {
      name: 'App',
      components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
        Cards,
        Searcher
      },
      data() {
        return {
        min:1,
        max:888,
        rnd:null,
        pokemons: null,
        loading: false,
        error: null,
        words:null,
        find: null
        };
      },
      watch: {
        words(value){
          this.getPokemons(value);
        }
      },
      methods: {
        getPokemons(value){
          if(value != null){
            var numb = value.match(/\d/g);
            if(numb == null){
              axios
              .get('https://pokeapi.co/api/v2/pokemon/'+value.trim().toLowerCase())
              .then((response) =>{
                value = parseInt(response.data.id)-1;
                const url = 'https://pokeapi.co/api/v2/pokemon?offset='+value+'&limit=10';
                axios
                .get(url)
                .then((response) =>{
                  this.pokemons = response.data.results
                })
              })
            }else{
              value = parseInt(value.trim())-1;
              const url = 'https://pokeapi.co/api/v2/pokemon?offset='+value+'&limit=10';
              axios
              .get(url)
              .then((response) =>{
                this.pokemons = response.data.results
              })
            }
/*             console.log(numb);
            const url = 'https://pokeapi.co/api/v2/pokemon?offset='+value+'&limit=10';
            axios
            .get(url)
            .then((response) =>{
              this.pokemons = response.data.results
            }) */
          }else{
            const url = 'https://pokeapi.co/api/v2/pokemon?offset='+this.rnd+'&limit=10';
            axios
            .get(url)
            .then((response) =>{
              this.pokemons = response.data.results
            })
          }
        }
      },
      created(){
        var random = Math.floor(this.min + Math.random() * (this.max - this.min));
        this.rnd = random;        
      },
      mounted() {        
        this.getPokemons();
      }

    };
    </script>
    