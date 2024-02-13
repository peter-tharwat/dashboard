<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Research;
use App\Models\Subject;

class DownloadController extends Controller
{

    private function incrementDownloadCount($modelClass, $id)
    {
        $model = $modelClass::find($id);

        if ($model) {
            $model->download_count += 1;
            $model->save();
        }
    }

    public function downloadIncrement($id,$type)
    {
        
        switch ($type) {
            case "post":
                $this->incrementDownloadCount(Article::class, $id);
                break;

            case "research":
                $this->incrementDownloadCount(Research::class, $id);
                break;

            case "subject":
                $this->incrementDownloadCount(Subject::class, $id);
                break;

            default:
                return response()->json(['error' => 'Invalid type']);
        }

        return response()->json(['success' => true]);
    }

}
