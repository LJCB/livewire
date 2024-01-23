<?php

namespace App\Livewire\Admin\Tutors;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class TutorForm extends Component
{
    public $tutorId;
    public $tutor;

    public $name;
    public $email;
    public $password;
    public $courses;
    public $coursesSelected = [];


    public function mount($tutorId)
    {
        $this->courses = Course::all();
        if ($tutorId != 0) {
            $this->tutor = User::find($tutorId);
            $this->name = $this->tutor->name;
            $this->email = $this->tutor->email;
            $this->coursesSelected = array_fill_keys($this->tutor->courses()->pluck('id')->toArray(), true);
        }
    }

    public function render()
    {
        return view('livewire.admin.tutors.tutor-form');
    }

    public function store()
    {
        $rules = ([
            'email' => 'required|unique:users|email',
            'name' => 'required',
            'password' => 'required'

        ]);
        $customMessages = [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
        ];
        $this->validate($rules, $customMessages);

        $tutor = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $tutor->assignRole('tutor');

        $coursesIdSelected = array_keys(array_filter($this->coursesSelected));
        $tutor->courses()->attach($coursesIdSelected);

        session()->flash('message', 'Tutor registrado correctamente');
    }

    public function update()
    {   
        $rules = ([
            'email' => 'email',
            'name' => 'required',
        ]);
        $customMessages = [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no tiene un formáto válido.',
        ];

        $this->validate($rules, $customMessages);

        $tutor = User::find($this->tutorId);
        $tutor->name = $this->name;
        $tutor->email = $this->email;
        $tutor->save();
        
        $tutor->courses()->detach();
        $coursesIdSelected = array_keys(array_filter($this->coursesSelected));
        $tutor->courses()->attach($coursesIdSelected);

        session()->flash('message', 'Tutor actualizado correctamente');
    }
}
