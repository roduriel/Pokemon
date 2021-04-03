<template>
    <form>
        <div class="input-group" >
        <input class="form-control form-control-lg rounded-pill py-2 pr-5 mr-1 bg-transparent" type="search" placeholder="Search" id="search-input1" v-model="words">
        <span class="input-group-append">
            <button class="btn border-0 bg-transparent ml-n5" type="button">
            <i class="fa fa-search"></i>
            </button>
        </span>
        </div>
    </form>
</template>

<script>
export default {
    name: 'Searcher',
    data(){
        return{
            find:null
        }
    },
    methods: {
        buscar: function(){
            this.find = this.words;
        }
    },
    
}
</script>