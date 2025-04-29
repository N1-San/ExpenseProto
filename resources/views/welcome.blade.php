@extends('layouts.app')

@section('content')
    <div class="main-content">
        <h1 class="text-2xl font-semibold bg-gray-900 p-4 rounded-md mb-2">Welcome</h1>
        <div class="bg-gray-900 text-white font-sans rounded-md p-2">
            <h1 class="text-2xl font-semibold bg-gray-900 p-4 rounded-md mb-2">
                This is Expense, You can do a lot of money related stuff with it.
            </h1>
            <ul class="text-2xl font-semibold bg-gray-900 p-4 rounded-md mb-2">
                <li>keep track of money in different accounts</li>
                <li>track all transactions in different accounts</li>
                <li>manage a separate savings account</li>
                <li>have a monthly ledger</li>
                <li>keep a monthly budget</li>
                <li>track monthly expenses and automate payments</li>
                <li>have an emergency savings always safe to be used at any moment</li>
                <li>export all your data in a few clicks</li>
            </ul>
        </div>
        <div class="bg-gray-80 text-white font-sans rounded-md p-2 mb-2">
            <div>
                <h1 class="text-2xl font-semibold bg-gray-900 p-4 rounded-md mb-2">
                    TRY IT RIGHT NOW
                </h1>
                <div class="grid md-col-2 items-center">
                    <a href="{{ route('login') }}" class=" text-center bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mb-2">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class=" text-center bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection