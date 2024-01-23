<?php

namespace App\Livewire\Checkout;

use App\Models\Checkout;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class PaymentModality extends Component
{
    public $paymentModality;
    public $checkoutId;
    public $checkout;

    public function mount($checkoutId)
    {
        $this->checkout = Checkout::find($checkoutId);
        $this->checkoutId = $checkoutId;
    }

    public function render()
    {
        return view('livewire.checkout.payment-modality');
    }

    public function selectPaymentModality($paymentModalitySelected)
    {
        $this->checkout->payment_modality = $paymentModalitySelected;
        $this->checkout->actual_step = 'paymentModality';
        $this->checkout->save();
        
        return  Redirect::route('checkout.payment', $this->checkout->id)->with('checkoutID', $this->checkout->id);
    }
}
