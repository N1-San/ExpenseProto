@extends('layouts.app')

@section('content')

    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center bg-gray-900 p-4 mb-4 rounded-md">
            <h1 class="text-2xl font-semibold  rounded-md mb-2">Transactions</h1>
            <a href="{{ route('transactions.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add
                Transaction</a>
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
                            Account
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Amount
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Transaction Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Note
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @foreach($transactions as $transaction)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <div class="flex items-center">
                                <input type="checkbox"
                                class="form-checkbox row-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ $transaction->account->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            ₹{{ $transaction->amount }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ $transaction->transaction_type }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ $transaction->note }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ $transaction->created_at->format('Y-m-d H:i:s') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('select-all').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>
@endsection