# PokechallengeProduction
Este aplicativo web te permitirá buscar a tus pokemon´s favoritos ya sea por su número o su nombre, así mismo,  podrás agregarlos a tu cuenta.

## ARQUITECTURA
- Para la obtención de los pokemon´s en la páina princical, se genera la vista
 con el motor de vistas Blade y con la ayuda del framwork VueJs se renderizan 
 algunos componentes como las tarejtas de los personajes, para que al realizar la
 peticion HTTP, devuelva los datos y estos sean procesados y recorridos para 
 mostrarlos al cliente, durante este proceso se ejecuta una nueva petición de tipo POST 
 al controlador de laravel para poder validar si existe algun usuario y posteriormente 
 esta informacion obtenida tanto en la API de pokemon como en el controlador de laravel
 es regresando a la vista del cliente.
 
- Para guardar la informacion de pokemons favoritos, se muestran la opciones en la
  vista del cliente con VueJs y se realizan 2 peticiones de tipo POST, una para 
  validar si existe un usuario con ese ld de pokemon y la segunta es para poder gardar
  el registro  en nuesta base de datos de MYSQL y finalmente si todo el proceso fue 
  exitoso, se renderizan los componentes con VueJs y se les muestra al cliente con la 
  informacion nuevemnte obtenida en la API y el controlador de Laravel.
  
- Al mostrar la lista de favoritos se realiza una consulta a la base de datos MySQL 
  por medio de una pesticion de tipo POST que envia el framwork JQuery para que pueda
  procesar los datos y mostralos al cliente en la vista de index del controlador de
  Favoritos.
   
## POKEAPI
Para la busqueda de los pokemon´s se utilizó la API del
sitio oficial de POKEMON, gracias a ella obtenemos los 
datos más relevantes y por medio de HTTP requests
hacemos las peticiones para tener acceso a dicha iunformacion.
Se implemento la tecnología AXIOS para las peticiones GET hacia
la PokeAPI y POST para guardar en nuestra base de datos los id´s
de los pokemon´s favoritos del usuarios.
   
## INSTRUCTIVO
Para instalar el proyecto debera tener instalado Docker

1° Debera clonar el repositorio  desdel siguiente link: 
https://github.com/roduriel/PokechallengeProduction.git
con el comando git clone

2° Desde la tarminal, buscar la carpeta donde se guardo
la el archivo y situarse sobre ella.

3° Se deberá ingresar el siguiente comando: 
docker-compose up -d.

4° una vez que haya finalizado el proceso de instalacion
del contenedor, se mostrará en la misma terminal, cuando 
este listo para que accedamos por nuestro navegador.

5° Correremos el siguiente comando:
docker ps
para que podamos observar el id del contenedor en donde
estara funcionando el proyecto.

6° Ejecutamos el comando: 
docker excec -it <idContenedor> /bin/bash
 
7° Posteriormente corremos el comando 
cd ../ 
para regresar un directorio atras.

8° Finalmente podemos correr el comando: php artisan migrate
para correr nuestras migraciones de laravel.

9° Desde el navegador podemos ingresar a la direccion:
localhost:8200 y ya podremos buscar a nuestros pokemon´s
favoritos.

## FUNCIONAMIENTO

- En la primera pantalla de la aplicacion web podrás observar diez
pokemons generads aleatoreamente. Lo anterior con al finalidad de
se muestren varias opciones al usuario.

- Cada trajeta de los personajes cuanta con un boton en forma de 
estrella en el cual podrás darle click para agregarlo a la lista
de tus favoritos, asi mismo encontraras un buscador el cual tendrás
que ingresar el número o nombre exacto del pokemon que deseas visualizar,
en esta busqueda no solo aparecera el personaje buscado si no junto con 9
opciones de pokemons junto con la tuya.

- Luego de que se haya marcado/desmacado el boton de favoritos, aparecerá
una alerta indicando si ya has agregado el registo o debes regitrarte para
poder realizar la acción antes mencionada.

- Finalmente si realizaste exisamente tu resgitro o inciaste sesión con los
botones ubicados en la esquina superior derecha, podrás observar la lista
de todos los pokemon´s que has agregado, asi mismo al regresar a la pagina
de inicio te saldran marcadas aquellas opciones que en otras ocaciones has 
seleccionado.
