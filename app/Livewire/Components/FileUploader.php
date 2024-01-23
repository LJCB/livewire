<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploader extends Component
{

    use WithFileUploads;
    public $files = [];

    public function render()
    {
        return view('livewire.components.file-uploader');
    }

    public function fileDropped()
    {
        dd('Upload files');
    }
}
