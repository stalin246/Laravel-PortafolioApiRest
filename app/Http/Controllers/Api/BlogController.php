<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Blog::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Autor'=>'required|max:50',
            'Titulo'=>'required|string|max:50',
            'Contenido'=>'required | string | max:40000',
            'Imagenurl'=>'required  | max:100',
        ]);

        return Blog::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Blog::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Autor'=>'required|max:50',
            'Titulo'=>'required|string|max:50',
            'Contenido'=>'required | string | max:40000',
            'Imagenurl'=>'required  | max:100',
        ]);

        $blog= Blog::find($id);

        $blog->update([
            'Autor'=> request('Autor'),
            'Titulo'=> request('Titulo'),
            'Contenido'=> request('Contenido'),
            'Imagenurl'=> request('Imagenurl')
        ]);

        return $blog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog ->delete();
        return response()->json([
            'response'=>'El blog fue eliminado'
        ]);
    }
}
