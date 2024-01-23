@extends('layouts.checkout')
@section('stepSection')
    <div class="pt-16">
        @livewire('checkout.payment', ['checkoutId' => $checkoutId])
    </div>
@endsection