@extends('layouts.app')

@section('content')

    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center bg-gray-900 p-4 mb-4 rounded-md">
            <h1 class="text-2xl font-semibold  rounded-md mb-2">Savings</h1>
            <a href="{{ route('accounts.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add
                Account</a>
        </div>
        <div class="flex justify-between items-center bg-gray-900 p-4 mb-4 rounded-md">
            <h1 class="text-2xl font-semibold mb-2">Total Savings Balance</h1>
        </div>
        <div class="flex justify-between items-center bg-gray-900 p-4 mb-4 rounded-md">
            <h1 class="text-2xl font-semibold mb-2">Monthly Saving Target</h1>
        </div>
        <div class="flex justify-between items-center bg-gray-900 p-4 mb-4 rounded-md">
            <h1 class="text-2xl font-semibold mb-2">Current Month Saving</h1>
        </div>

        <div class="bg-gray-900 text-white font-sans rounded-md p-2">
            <h1 class="text-2xl font-semibold bg-gray-900 p-4 rounded-md mb-2">Active Accounts</h1>

            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            <div class="flex items-center space-x-2"></div>
                                <input type="checkbox" id="select-all"
                                    class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Total Amount
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Is Active
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                
@endsection