@extends('layouts.app')

@section('content')
    <div class="bg-gray-900 text-white p-6 rounded-md">
        <h1 class="text-2xl font-semibold mb-4">Edit Account</h1>
        <form action="{{ route('accounts.update', $account->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $account->id }}">
            @include('pages.accounts.form')
            <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
            <a href="{{ route('accounts') }}" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection