<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    #  Lista todos los posts
    public function index()
    {
        echo "Soy muchos posts";
    }

    # Lista un post en específico
    public function show($id)
    {
        echo "Soy el post $id";
    }

    # Guardar el post
    public function store()
    {
        echo "Guardando el post";
    }

    # Actualizar un post
    public function update($id)
    {
        echo "Actualizando el post $id";
    }

    # Eliminar un post
    public function destroy($id)
    {
        echo "Eliminando el post $id";
    }
}
