<?php

namespace App\Http\Controllers;
use App\Tbl_Empleado_SIA;
use App\Sorteo;
use App\Models\Video;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
//agregado
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class VideoController extends Controller
{
    public function video(Request $request)
    {
        $mensaje = "Sistema para subir contenido multimedia";
        $Videos = Video::with('categoria')->get();

        $categorias = Categoria::where('estatus', 'A')->get();
       
        //dd($Videos->first(), $Videos->first()->categoria);

        return  view('video.video', compact('mensaje', 'Videos', 'categorias')); 
    }

    public function altaCategoriaSub(Request $request)
    {
        $mensaje = "Hola mundo ";
        $categoriaMostrar = Categoria::where('estatus', 'A')->get();
        $categorias = Categoria::all(); // Obtener todas las categorías

        $subcategorias = Subcategoria::all(); // Obtener todas las categorías


        return  view('video.altaCategoriaSub', compact('mensaje', 'categorias', 'subcategorias', 'categoriaMostrar')); 
    }

    public function storeCategoria(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
        ]);

        // Crear una nueva categoría
        $categoria = new Categoria();
        $categoria->nombre = strtoupper($request->nombre_categoria);
        $categoria->estatus= 'A';
        $categoria->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('video.altaCategoriaSub')
                        ->with('success', 'Categoría creada con éxito.');
    }

    public function storeSubcategoria(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'categoria_id' => 'required|exists:categoria,id',
            'nombre_subcategoria' => 'required|string|max:255',
        ]);

        // Crear una nueva subcategoría
        $subcategoria = new Subcategoria();
        $subcategoria->categoria_id = $request->categoria_id;
        $subcategoria->nombre = strtoupper($request->nombre_subcategoria);
        $subcategoria->estatus= 'A';
        $subcategoria->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('video.altaCategoriaSub')
                        ->with('success', 'Subcategoría creada con éxito.');
    }

    // En VideoController
    public function obtenerSubcategorias($categoriaId)
    {
        $subcategorias = Subcategoria::where('categoria_id', $categoriaId)->get();
        //dd($subcategorias);
        return response()->json($subcategorias);
    }



    
    public function registroVideo(Request $request)
    {
        //phpinfo();

        //dd($request->file('cargaVideo')->getError());

        //dd($request);
        $request->validate([
            'tituloVideo' => 'required',
            'descripcionVideo' => 'required',
            'cargaVideo' => 'required|file|mimes:mp4,webm', // Asegúrate de incluir los formatos que necesitas
            'categoria_id' => 'required', 
            'subcategoria_id' => 'required' 
        ]);
        
        
        $tituloVideo = $request->input('tituloVideo');
        $descripcionVideo = $request->input('descripcionVideo'); // Aplicar nl2br aquí
        
        // Procesar el archivo de video
        if ($request->hasFile('cargaVideo')) {
            $videoFile = $request->file('cargaVideo');
            $videoPath = $videoFile->store('videoss', 'public'); // Cambia 'public' por el disco que desees usar

            $video = new Video();
            $video->titulo = strtoupper($tituloVideo);
            $video->descripcion = $descripcionVideo;
            $video->estatus = "A";
            $video->link = $videoPath; // Asegúrate de tener una columna en tu base de datos para la ruta del video
            $video->categoria_id = $request->input('categoria_id'); 
            $video->subcategoria_id = $request->input('subcategoria_id'); 
            $video->save();
            //dd($request->all());
            return back()->with('success', 'Todos los datos han sido actualizados correctamente.');
        }

        return back()->with('error', 'El archivo de video es requerido.');
    }

    public function ActualizarEstatus(Request $request, $id) {
        $video = Video::findOrFail($id);
        $video->estatus = $request->input('estatus', 'A'); // Asumiendo 'A' como valor por defecto para "Dar de Alta"
        $video->save();
    
        $mensaje = $video->estatus == 'A' ? 'Video dado de alta.' : 'Video dado de baja.';
        
        return back()->with('status', $mensaje);
    }

    public function ActualizarEstatusCategoria(Request $request, $id) {
        $video = Categoria::findOrFail($id);
        $video->estatus = $request->input('estatus', 'A'); // Asumiendo 'A' como valor por defecto para "Dar de Alta"
        $video->save();
    
        $mensaje = $video->estatus == 'A' ? 'Categoria dada de alta.' : 'Cateogria dado de baja.';
        
        return back()->with('status', $mensaje);
    }

    public function ActualizarEstatusSubCategoria(Request $request, $id) {
        $video = Subcategoria::findOrFail($id);
        $video->estatus = $request->input('estatus', 'A'); // Asumiendo 'A' como valor por defecto para "Dar de Alta"
        $video->save();
    
        $mensaje = $video->estatus == 'A' ? 'SubCategoria dada de alta.' : 'SubCateogria dado de baja.';
        
        return back()->with('status', $mensaje);
    }


    public function videoMostrar(Request $request)
    {
        $mensaje = "Hola mundo";
        $Videos = Video::all();
        return  view('video.videoMostrar', compact('mensaje', 'Videos'));  
    }

    public function stream($filename)
    {
        // Construir la ruta absoluta al archivo en el sistema de archivos
        $path = storage_path('app/public/videos/' . $filename);

        // Verificar si el archivo existe
        if (!file_exists($path)) {
            abort(404, 'El archivo no existe.');
        }

        $stream = function () use ($path) {
            readfile($path);
        };

        return response()->stream($stream, 200, [
            "Content-Type" => "video/mp4",
        ]);
    }




}
