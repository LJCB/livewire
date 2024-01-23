<?php

namespace App\Livewire\Admin\Courses\Classes\Materials;

use App\Models\CourseClassMaterial;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class MaterialForm extends Component
{
    use WithFileUploads;

    public $classId;
    public $materialId;
    public $material;
    public $name;
    public $file;
    

    public function mount($classId, $materialId)
    {
        $this->classId = $classId;
        $this->materialId = $materialId;

        if ($materialId != 0) {
            $this->material = CourseClassMaterial::find($materialId);
            $this->name = $this->material->name;
            $this->file = Storage::get('storage/course/class/' . $this->material->course_class_id . '/material/'. $this->material->file);
            $this->classId = $this->material->course_class_id;
        }
    }

    public function render()
    {
        return view('livewire.admin.courses.classes.materials.material-form', [
            'material' => $this->material
        ]);
    }

    public function store()
    {
        
        $rules = ([
            'file' => 'required|mimes:pdf',
            'name' => 'required'        

        ]);
        $customMessages = [
            'name.required' => 'El campo nombre es obligatorio.',
            'file.required' => 'El archivo es obligatorio.',
            'file.mimes' => 'El archivo debe ser PDF.'
        ];

        $this->validate($rules, $customMessages);

        $material = CourseClassMaterial::create([
            'course_class_id' => $this->classId,
            'name' => $this->name,
            'file' => ''   
        ]);

        $filePath = $this->file->storeAs('public/course/class/'. $material->course_class_id . '/material/'. $this->file->getClientOriginalName());
        $material->file = $filePath;
        $material->save();

        session()->flash('message', 'Material registrado correctamente');
    }

    public function update()
    {
        $rules = ([
            'name' => 'required'        

        ]);

        $customMessages = [
            'name.required' => 'El campo nombre es obligatorio.'
        ];
        $this->validate($rules, $customMessages);
        $material = CourseClassMaterial::find($this->materialId);
        $material->name = $this->name;

        if (!is_null($this->file)) {
            if (Storage::exists($material->file)) {
                Storage::delete($material->file);
            }
            $filePath = $this->file->storeAs('public/course/class/', $material->course_class_id.'/material/'. $this->file->getClientOriginalName());
            $material->file = $filePath;
        }
        $material->save();
        session()->flash('message', 'Material actualizado correctamente');
    }
}
