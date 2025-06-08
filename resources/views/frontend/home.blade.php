@extends('frontend.layout')

@section('content')
<style>
    html, body {
        background: #e2eee2 !important; /* White-green background for the entire page */
        margin: 0; /* Remove default margins */
        padding: 0; /* Remove default padding */
        height: 100%; /* Ensure full page coverage */
    }
    /* Target common wrapper classes in case layout overrides body */
    .wrapper, .container, .content-wrapper {
        background: #e9ebf0 !important;
    }
</style>
<div class="mb-4" style="background: url('{{ asset('images/hero1.jpg') }}') no-repeat center center; background-size: cover; color: #006400; padding: 50px 20px; position: relative; min-height: 500px; margin-top: 0;">
    <div style="position: absolute; top: 40%; left: 5%; width: 40%;">
        <h1 style="color: #006400; text-shadow: 2px 2px 4px #90EE90; font-size: 3.5em; font-weight: 900; font-family: 'Arial Black', sans-serif; line-height: 1.2; letter-spacing: 0.1em; white-space: nowrap;">Get Fresh Juiceables <span style="display: block;">Everyday</span></h1>
        <p style="color: #006400; font-size: 1em;">From $5.00/month for all - EMI options available!</p>
        <a href="https://wa.me/yourwhatsappnumber" target="_blank" class="btn btn-lg" style="background-color: #90EE90; color: #FFFFFF; border: none; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 1em; font-weight: bold;">Details</a>
    </div>
</div>
@endsection
