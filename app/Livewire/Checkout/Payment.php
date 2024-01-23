<?php

namespace App\Livewire\Checkout;

use App\Models\Checkout;
use App\Models\UserCourses;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Payment extends Component
{
    public $checkoutId;
    public $checkout;

    public function mount($checkoutId)
    {
        $this->checkoutId = $checkoutId;
        $this->checkout = Checkout::find($checkoutId);
    }

    public function render()
    {
        return view('livewire.checkout.payment');
    }

    public function subscribeStudent()
    {
        UserCourses::create([
            'user_id' => $this->checkout->user_id,
            'course_id' => $this->checkout->course_id,
            'progress' => 0,
            'active' => 1
        ]);

        return redirect('login');
    }
}
