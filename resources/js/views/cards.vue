<template>
<!--     <div class="card h-100 text-white bg-dark" style="width: 18rem;">
       <img class="card-img-top" :src="personaje" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{pokemon.name}}</h5>
            <p class="card-text">{{personaje}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div> -->

        <article class="card">
            <img src="../../../public/img/bg-pattern-card.svg" alt="imagen header card" class="card-header">
            <div class="card-body">
                <img :src="personaje" alt="imagen pokemon" class="card-body-img" title="Fuente Imagen: https://pokeapi.co/">
                <h5>N° {{id}}</h5>
                <h1 class="card-body-title"> 
                    <b>{{pokemon.name}}</b> <span>{{hp}}</span>
                </h1>
                <p class="card-body-text">{{xp}} Exp</p>
                <p class="card-body-text">
                    <input type="checkbox" class="chk" :id="'st'+id" value="false" />
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
                defense: null
            };
        },
        mounted() {
            axios
            .get(this.pokemon.url)
            .then(response =>([
                this.id        = response.data.id,
                this.personaje = response.data.sprites.other.dream_world.front_default,
                this.hp        = response.data.stats[0].base_stat,
                this.xp        = response.data.base_experience,
                this.attack    = response.data.stats[1].base_stat,
                this.special   = response.data.stats[3].base_stat,
                this.defense   = response.data.stats[2].base_stat,
                ]));
        },

    }
</script>