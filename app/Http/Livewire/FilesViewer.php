<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;

class FilesViewer extends Component
{
    use WithPagination;
    public $files = [];
    public function render()
    {
        $files = $this->files;
        return view('livewire.files-viewer',compact('files'));
    }
    public function load_files()
    {
        $this->files = \App\Models\HubFile::where(function($q){

        })->orderBy('id','DESC')->simplePaginate(6);  
    }
}
