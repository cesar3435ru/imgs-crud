<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $documentos = Documento::all();
        $documentos = Documento::paginate(10);

        return view('documento.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rutaimg' => 'required|image|max:2048',
            'nombrearchivo' => 'required'
        ]);
    
        $documento = new Documento;
    
        $documento->nombrearchivo = $request->nombrearchivo;
    
        $rutaArchivo = $request->file('rutaimg')->store('public/images');
    
        $documento->rutaimg = $rutaArchivo;
    
        $documento->save();
    
        return redirect()->route('documentos.index')
            ->with('success', 'Documento creado satisfactoriamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $documento = Documento::findOrFail($id);

        return view('documento.show', compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $documento = Documento::findOrFail($id);

        return view('documento.edit', compact('documento'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombrearchivo' => 'required'
        ]);
    
        $documento = Documento::findOrFail($id);
    
        // Eliminar el archivo anterior si existe
        if ($documento->rutaimg && Storage::exists($documento->rutaimg)) {
            Storage::delete($documento->rutaimg);
        }
    
        if($request->hasFile('rutaimg')) {
            $request->validate([
                'rutaimg' => 'required|image|max:2048'
            ]);
    
            $rutaArchivo = $request->file('rutaimg')->store('public/images');
    
            $documento->rutaimg = $rutaArchivo;
        }
    
        $documento->nombrearchivo = $request->nombrearchivo;
    
        $documento->save();
    
        return redirect()->route('documentos.index')
            ->with('success', 'Documento actualizado satisfactoriamente.');
    }
    


    /**
     * Remove the specified resource from storage.
     */


     public function destroy($id)
     {
         $documento = Documento::find($id);
     
         if (!$documento) {
             return redirect()->route('documentos.index')
                 ->with('error', 'Documento no encontrado');
         }
     
         Storage::delete($documento->rutaimg);
         $documento->delete();
     
         return redirect()->route('documentos.index')
             ->with('success', 'Documento eliminado correctamente');
     }
     
}
