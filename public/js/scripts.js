
function del(clicked_id) {
    var txt = clicked_id,
        numb = txt.match(/\d/g),
        pokemonId = numb.join("");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:"/favoritesdel",
        type:"POST",
        data:{
            pokemonId: pokemonId
        },
        success:function (data) {
            location.reload();
        }
    }) 
}

$(function () {
    $.ajax({
        url:"/mypokemons",
        type:"GET",
        success:function (data) {
            $.each(data.pokemons,function(index,pokemon){
                $.ajax({
                    url:"https://pokeapi.co/api/v2/pokemon/"+pokemon.pokemon_id,
                    type:"GET",
                    success:function (response) {
                        var img = response.sprites.other.dream_world.front_default;
                        $('#pokecards').append('<div class="card text-white bg-secondary ml-3 mt-3" style="width: 10rem;"><div class="card-body text-center p-2"><div class="row justify-content-end mr-1"><button type="button" class="close" aria-label="Close" onclick="del(this.id)" id="btn'+response.id+'"><span class="text-white" aria-hidden="true">&times;</span></button></div><h5 class="card-title mt-1" id="pokename" style="text-transform: capitalize;">'+response.name+'</h5><img src="'+(img==null ? response.sprites.front_default : img)+'" width="80rem" height="100rem"></div></div>');
                    }
                });

            })

        }
    })    
    
});
