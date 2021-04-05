<template>
        <article class="card">
            <img src="../../../public/img/bg-pattern-card.svg" alt="imagen header card" class="card-header">
            <div class="card-body">
                <img :src="personaje" alt="imagen pokemon" class="card-body-img" title="Fuente Imagen: https://pokeapi.co/">
                <h5>N° {{id}}</h5>
                <h1 class="card-body-title"> 
                    <b>{{pokemon.name}}</b> <span>{{hp}}</span>
                </h1>
                <p class="card-body-text">{{xp}} Exp</p>
                <p class="card-body-text" >
                    <input type="checkbox" class="chk" :id="'st'+id" v-model="fav" @change="check($event)">
                    <label :for="'st'+id" class="chklabel"></label>
                </p>
            </div>
            <div class="card-footer">
                <div class="card-footer-social">
                    <h3>{{attack}}K</h3>
                    <p>Ataque</p>
                </div>
                <div class="card-footer-social">
                    <h3>{{special}}K</h3>
                    <p>Ataque Especial</p>
                </div>
                <div class="card-footer-social">
                    <h3>{{defense}}K</h3>
                    <p>Defensa</p>
                </div>
            </div>
        </article>

</template>

<script>
    export default {
        name: 'Cards' ,
        props: {
            pokemon: Object,
            slide: Number
        },
        data() {
            return {
                id: null,
                personaje: null,
                hp: null,
                xp: null,
                attack: null,
                special: null,
                defense: null,
                fav:null,
            };
        },
        watch: {
            pokemon: function(){
                console.log('estoy en el card');
                this.getinfo(this.pokemon);
            }
        },
          methods: {
            getinfo(pokemon){
                axios
                .get(pokemon.url)
                .then(response =>{
                    axios.post('chekuser',{favorite: this.fav})
                        .then((response)=>{
                            if(response.data.session){
                                axios.post('chekfav',{pokemonId: this.id})
                                .then((response)=>{
                                    if(response.data.checked){
                                        this.fav= true;
                                    }
                                });
                            }
                    });
                    this.id        = response.data.id;
                    this.personaje = (response.data.sprites.other.dream_world.front_default == null ? response.data.sprites.front_default : response.data.sprites.other.dream_world.front_default);
                    this.hp        = response.data.stats[0].base_stat;
                    this.xp        = response.data.base_experience;
                    this.attack    = response.data.stats[1].base_stat;
                    this.special   = response.data.stats[3].base_stat;
                    this.defense   = response.data.stats[2].base_stat;
                    });
            },
            check:function(e) {
                if(this.fav == true){
                    axios.post('chekuser',{favorite: this.fav})
                    .then((response)=>{
                        if(response.data.session){
                             axios.post('favorites',{pokemonId: this.id})
                            .then((response)=>{
                                var msg = 'Has agregado a '+ this.pokemon.name + ' a tus favoritos.'
                                this.$swal('', msg, 'success')

                            });
                            
                        }else{
                            this.$swal('', 'Debes iniciar sesion o crear una cuenta para guardar tu pokemón', 'error')
                            this.fav = false;
                        }

                    })
                }else{
                    axios.post('chekuser',{favorite: this.fav})
                    .then((response)=>{
                        if(response.data.session){
                             axios.post('favoritesdel',{pokemonId: this.id})
                            .then((response)=>{
                                var msg = 'Has quitado a '+ this.pokemon.name + ' de tus favoritos.'
                                this.$swal('', msg, 'info')

                            });
                            
                        }else{
                            this.$swal('', 'Debes iniciar sesion o crear una cuenta para guardar tu pokemón', 'error')
                            this.fav = true;
                        }

                    })                  
                }
            }
        },
        mounted() {
            axios
            .get(this.pokemon.url)
            .then(response =>{
                axios.post('chekuser',{favorite: this.fav})
                    .then((response)=>{
                        if(response.data.session){
                            axios.post('chekfav',{pokemonId: this.id})
                            .then((response)=>{
                                if(response.data.checked){
                                    this.fav= true;
                                }
                            });
                        }
                });
                this.id        = response.data.id;
                this.personaje = (response.data.sprites.other.dream_world.front_default == null ? response.data.sprites.front_default : response.data.sprites.other.dream_world.front_default);
                this.hp        = response.data.stats[0].base_stat;
                this.xp        = response.data.base_experience;
                this.attack    = response.data.stats[1].base_stat;
                this.special   = response.data.stats[3].base_stat;
                this.defense   = response.data.stats[2].base_stat;
                });
        },

    }
</script>