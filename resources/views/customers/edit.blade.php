@extends('dashboard')

@section('content')
<div class="container">
    <h2>Edit Customer</h2>
    <form action="{{ route('customers.update', $customer->id_customer) }}" method="POST">
        @csrf
        @method('PUT')
        @include('customers.form')
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
