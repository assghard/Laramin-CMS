<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Media\Entities\Media;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        return view('media::index');
    }

    public function create()
    {
        return view('media::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('media::edit');
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id)->delete($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Media has been deleted from database and disk'
        ]);
    }

    public function updateImageBox($id, Request $request) 
    {
        $media = Media::find($id);
        if(empty($media)){
            return response()->json(['success' => false, 'message' => 'Media not found']);
        }

        try {
            if ($media->file_name != $request->file_name) {
                $media->file_name = mb_strtolower(Str::slug($request->file_name, '_')).'.'.$media->getExtensionAttribute();
            }

            if(empty($request->title)){
                $media->forgetCustomProperty('title');
            }else{
                $media->setCustomProperty('title', $request->title);
            }

            if(empty($request->alt)){
                $media->forgetCustomProperty('alt');
            }else{
                $media->setCustomProperty('alt', $request->alt);
            }

            $media->save();
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'Saved']);
    }
}
