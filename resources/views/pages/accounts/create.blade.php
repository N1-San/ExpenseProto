@extends('layouts.app')

@section('content')
    <div class="bg-gray-900 text-white p-6 rounded-md">
        <h1 class="text-2xl font-semibold mb-4">Create Account</h1>
        <form action="{{ route('accounts.store') }}" method="POST">
            @csrf
            @include('pages.accounts.form')
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create</button>
                <a href="{{ route('accounts.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection