@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-900 text-white p-6 rounded-md">
        <h1 class="text-2xl font-semibold mb-4">Update Account</h1>
        @include('pages.accounts.form', ['account' => $account, 'accountTypes' => $accountTypes])
    </div>
@endsection
