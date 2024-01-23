<?php

namespace App\Livewire\Checkout;

use App\Models\Checkout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class StudentForm extends Component
{
    public $studentName;
    public $studentEmail;
    public $studentPassword;
    public $studentConfirmPassword;
    public $courseSelectedId;

    public function mount($courseSelectedId)
    {
        $this->courseSelectedId = $courseSelectedId;
    }

    public function render()
    {
        return view('livewire.checkout.student-form');
    }

    public function store()
    {
        $rules = ([
            'studentName' => 'required',
            'studentEmail' => 'required',
            'studentPassword' => 'required',
            'studentConfirmPassword' => 'required|same:studentPassword',
        ]);

        $customMessages = [
            'studentName.required' => 'El nombre del alumno es obligatorio.',
            'studentEmail.required' => 'El correo electrónico es obligatorio.',
            'studentPassword.required' => 'La contraseña es obligatoria.',
            'studentConfirmPassword.required' => 'La contraseña de confrimación es obligatoria.',
            'studentConfirmPassword.same' => 'La contraseña de confrimación no coincide.',
        ];   
        $this->validate($rules, $customMessages);

        $student = $this->storeStudent();
        $checkout = $this->storeCheckout($student);

        return Redirect::route('checkout.payment-modality', $checkout->id)->with('checkoutID', $checkout->id);
    }


    public function storeStudent()
    {
        $student = User::create([
            'name' => $this->studentName,
            'email' => $this->studentEmail,
            'password' => Hash::make($this->studentPassword)
        ]);
        $student->assignRole('student');

        return $student;
    }

    public function storeCheckout($student)
    {
        $checkout = Checkout::create([
            'course_id' => $this->courseSelectedId,
            'user_id' => $student->id,
            'actual_step' => 'register',
        ]);

        return $checkout;
    }
}
