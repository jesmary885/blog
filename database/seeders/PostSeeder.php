<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(100)->create(); /*quiero que almacene esta coleccion en una variable posts luego quiero 
        colocar esta coleecion en un for voy a pedir que recorra la coleccion posts y cada vez que encuentre
        un nuevo registro que lo almacene temporalmente en la variable post*/
        foreach ($posts as $post){ //dentro vamos a llamar al factory image
            /*llamo al modelo image acceso al metodo factory y le paso el metodo create, aca es que voy a llanar
            los campos imageable_id e imageable_type que estan en la tabla image, con este codigo logramos que 
            por cada post que se genere se descargue una imagen por esto el numero 1 de una imagen*/
            Image::factory(1)->create([
                'imageable_id'=>$post->id,
                'imageable_type'=>Post::class
            ]);
            /*$post->tags()->attach(1); si le pongo uno me va a agregar un nuevo registro a la tabla
            y al campo tag_id le va a asignar el valor que haya definido en los parentesis y en el campo
            post_id va a recuperar el id de esa variable post que estoy definiendo en esta linea, y
            para asociar mas etiquetas a este post debo colocar un array, quedando asi
             $post=>tags()->attach([1,2]);, ahora como nos interesa asignar etiquetas al azar lo vamos
             a hacer de la siguiente manera*/

             $post->tags()->attach([
                 rand(1,4),//aca le digo que me escoja al azar un nro entre 1 y 4
                 rand(5,8)//aca le digo que me escoja al azar un nro entre 5 y 8
                 //asi lograre tener dos etiquetas por cada seeder
             ]);
        }
    }
}
