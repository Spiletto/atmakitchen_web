@extends('dashboard')

@section('content')
<div class="container">
    <h2>Add New Customer</h2>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        @include('customers.form')
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
