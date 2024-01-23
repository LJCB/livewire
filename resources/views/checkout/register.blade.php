@extends('layouts.checkout')
@section('stepSection')
    <div class="pt-16">
        @livewire('checkout.student-form', ['courseSelectedId' => $courseId])
    </div>
@endsection