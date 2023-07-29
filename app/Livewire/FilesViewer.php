<?php

namespace App\Livewire;
use Livewire\WithPagination;
use Livewire\Component;

class FilesViewer extends Component
{
    use WithPagination;
    public function render()
    {
        $files = \App\Models\HubFile::where(function($q){
        
        })->orderBy('id','DESC')->simplePaginate(24); 
        return view('livewire.files-viewer',compact('files'));
    }
}
