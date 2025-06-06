@extends('frontend.layout')

@section('content')
<h2>About Us</h2>
<p>Tropical Cane Juice started with a passion for healthy living...</p>

<h3>Mission</h3>
<p>To provide fresh, healthy juices to our community.</p>

<h3>Vision</h3>
<p>Be the top choice for natural juices in the region.</p>

<div class="row mt-4">
    <div class="col-md-6">
        <img src="{{ asset('storage/team.jpg') }}" alt="Our Team" class="img-fluid rounded">
    </div>
    <div class="col-md-6">
        <img src="{{ asset('storage/juice_process.jpg') }}" alt="Juice Making Process" class="img-fluid rounded">
    </div>
</div>
@endsection
