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
            'cargaVideo' => 'required|file|mimes:mp4,avi,mov', // Asegúrate de incluir los formatos que necesitas
            'categoria_id' => 'required', 
            'subcategoria_id' => 'required' 
        ]);
        
        
        $tituloVideo = $request->input('tituloVideo');
        $descripcionVideo = $request->input('descripcionVideo'); // Aplicar nl2br aquí
        
        // Procesar el archivo de video
        if ($request->hasFile('cargaVideo')) {
            $videoFile = $request->file('cargaVideo');
            $videoPath = $videoFile->store('videos', 'public'); // Cambia 'public' por el disco que desees usar

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


    public function stream($videoPath)
    {
        $path = storage_path('app/public/' . $videoPath);
        if (!file_exists($path)) {
            abort(404);
        }

        $video = fopen($path, 'r');
        $size   = filesize($path); 
        $length = $size;           
        $start  = 0;               
        $end    = $size - 1;       

        header('Content-type: video/mp4');
        header("Accept-Ranges: 0-$length");
        if (isset($_SERVER['HTTP_RANGE'])) {
            $c_start = $start;
            $c_end   = $end;

            list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
            if (strpos($range, ',') !== false) {
                header('HTTP/1.1 416 Requested Range Not Satisfiable');
                header("Content-Range: bytes $start-$end/$size");
                exit;
            }
            if ($range == '-') {
                $c_start = $size - substr($range, 1);
            } else {
                $range  = explode('-', $range);
                $c_start = $range[0];

                $c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $c_end;
            }
            $c_end = ($c_end > $end) ? $end : $c_end;
            if ($c_start > $c_end || $c_start > $size - 1 || $c_end >= $size) {
                header('HTTP/1.1 416 Requested Range Not Satisfiable');
                header("Content-Range: bytes $start-$end/$size");
                exit;
            }
            $start  = $c_start;
            $end    = $c_end;
            $length = $end - $start + 1;
            fseek($video, $start);
            header('HTTP/1.1 206 Partial Content');
            header("Content-Range: bytes $start-$end/$size");
        }
        header("Content-Length: ".$length);
        $buffer = 1024 * 8;
        while(!feof($video) && ($p = ftell($video)) <= $end) {
            if ($p + $buffer > $end) {
                $buffer = $end - $p + 1;
            }
            set_time_limit(0);
            echo fread($video, $buffer);
            flush();
        }

        fclose($video);
        exit;
    }



}
