@extends('layouts.app')

@section('content')

    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center bg-gray-900 p-4 mb-4 rounded-md">
            <h1 class="text-2xl font-semibold  rounded-md mb-2">Accounts</h1>
            <a href="{{ route('accounts') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add
                Account</a>
        </div>
        @php
            $totalAmount = 0;
            foreach ($accounts as $account) {
                if ($account['is_active']) {
                    $totalAmount += $account['amount'];
                }
            }
        @endphp
        <div class="flex justify-between items-center bg-gray-900 p-4 mb-4 rounded-md">
            <h1 class="text-2xl font-semibold mb-2">Total Active Account Balance</h1>
            <h1 class="text-green-500 text-2xl font-bold">₹{{ number_format($totalAmount, 2) }}</h1>
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
        <tbody class="bg-gray-800 divide-y divide-gray-700">
            @foreach($accounts as $account)
                @if($account['is_active'])
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <div class="flex items-center">
                                <input type="checkbox"
                                    class="form-checkbox row-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ $account['name'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            ₹{{ $account['amount'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ $account['is_active'] ? 'Active' : 'Inactive' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 flex space-x-2">
                            <a href="{{ route('accounts', $account['id']) }}"
                                class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('accounts', $account['id']) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                            <form action="{{ route('accounts', $account['id']) }}" method="POST">
                            </form> @csrf
                            <button type="submit"
                                class="{{ $account['is_active'] ? 'bg-green-500' : 'bg-yellow-500' }} text-white px-2 py-1 rounded hover:{{ $account['is_active'] ? 'bg-green-600' : 'bg-yellow-600' }}">
                                {{ $account['is_active'] ? 'Deactivate' : 'Activate' }}
                            </button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
        </table>
    </div>

    <div class="bg-gray-900 text-white font-sans rounded-md p-2">
        <h1 class="text-2xl font-semibold bg-gray-900 p-4 rounded-md mb-2">Inactive Accounts</h1>

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
    <tbody class="bg-gray-800 divide-y divide-gray-700">
        @foreach($accounts as $account)
            @if(!$account['is_active'])
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        <div class="flex items-center">
                            <input type="checkbox"
                                class="form-checkbox row-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        {{ $account['name'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        ₹{{ $account['amount'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        {{ $account['is_active'] ? 'Active' : 'Inactive' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 flex space-x-2">
                        <a href="{{ route('accounts', $account['id']) }}"
                            class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Edit</a>
                        <form action="{{ route('accounts', $account['id']) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                        </form>
                        <form action="{{ route('accounts', $account['id']) }}" method="POST">
                        </form> @csrf
                        <button type="submit"
                            class="{{ $account['is_active'] ? 'bg-green-500' : 'bg-yellow-500' }} text-white px-2 py-1 rounded hover:{{ $account['is_active'] ? 'bg-green-600' : 'bg-yellow-600' }}">
                            {{ $account['is_active'] ? 'Deactivate' : 'Activate' }}
                        </button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
    </table>
    </div>


    <script>
        document.getElementById('select-all').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>
@endsection