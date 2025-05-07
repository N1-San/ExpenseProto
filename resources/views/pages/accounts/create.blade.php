@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-900 text-white p-6 rounded-md">
        <h1 class="text-2xl font-semibold mb-4">Add New Account</h1>
        @include('pages.accounts.form', ['accountTypes' => $accountTypes])
    </div>
@endsection