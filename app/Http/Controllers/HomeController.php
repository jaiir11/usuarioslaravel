<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(1);

        return view('home', compact('usuarios'));
    }
    
    public function indexajax()
    {
        //$usuarios = User::all();
        $usuarios = [];
        return response()->json([
            'body' => view('home', compact('usuarios'))->render(),
        ]);
    }
    
    public function nextpage()
    {
        $usuarios = User::paginate(1);
        //$usuarios = [];
        return response()->json([
            'body' => view('nextpage', compact('usuarios'))->render(),
        ]);
    }

    public function editarusuario($id)
    {
        //print_r($id);
        $usuario = User::findOrFail($id);
        //dd($usuario);
        return view('editarusuario', compact('usuario'));
    }
    
    public function editarusuariopost(Request $request, $id)
    {
        //print_r($id);
        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->status = $request->status;
        $name = basename($_FILES["imagen"]["name"]);
        //$newname = implode('.', [$base, time(), $jpg]);
        //move_uploaded_file($tmp_name, "images/$newname");
        dd($_FILES);
            /*dd($request->imagen);
        $nameFile = $request->name.'.'.$request->imagen[0];
        $image_resize = Image::make($request->imagen[0]->getRealPath());
        $image_resize->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save(public_path('images/'.$nameFile));
        $usuario->image = '/images/'.$nameFile;*/
        $usuario->save();
        
        //dd($usuario);
        return redirect('/home');
    }
}
