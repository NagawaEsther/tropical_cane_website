<!-- resources/views/frontend/home.blade.php -->

@extends('frontend.layout')

@section('content')
<div class="text-center mb-4">
    <img src="{{ asset('storage/banner1.jpg') }}" alt="Juice Banner" class="img-fluid rounded" style="max-height:400px; object-fit: cover;">
</div>

<h1>Welcome to Tropical Cane Juice</h1>
<p>Fresh, natural juices made with love and care.</p>

<a href="https://wa.me/yourwhatsappnumber" target="_blank" class="btn btn-success btn-lg">Order Now on WhatsApp</a>
@endsection
