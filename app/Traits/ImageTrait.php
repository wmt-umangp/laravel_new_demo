<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Auth, Storage;

trait ImageTrait
{
    public function imageupload(Request $request)
    {
        $files = $request->file('image');
        $folder = 'public/images/User-' . Auth::user()->id . '/';
        $filename = $files->getClientOriginalName();
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        if (!empty($files)) {
            $files->storeAs($folder, $filename);
        }
        return $files->getClientOriginalName();
    }
}
