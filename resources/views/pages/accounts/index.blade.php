@extends('layouts.app')

@section('content')

    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center bg-gray-900 p-4 mb-4 rounded-md">
            <h1 class="text-2xl font-semibold  rounded-md mb-2">Accounts</h1>
            <a href="{{ route('accounts.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add
                Account</a>
        </div>
        @php
            $totalAmount = 0;
            foreach ($accounts as $account) {
                if ($account['is_active']) {
                    $totalAmount += $account['balance'];
                }
            }
        @endphp
        <div class="flex justify-between items-center bg-gray-900 p-4 mb-4 rounded-md">
            <h1 class="text-2xl font-semibold mb-2">Total Active Account Balance</h1>
            <h1 class="text-green-500 text-2xl font-bold">₹{{ number_format($totalAmount, 2) }}</h1>
        </div>

        <div class="bg-gray-900 text-white font-sans rounded-md p-2">
            <h1 class="text-2xl font-semibold bg-gray-900 p-4 rounded-md mb-2">Active Accounts</h1>
            <div class="w-full overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                <div class="flex items-center space-x-2"></div>
                                    <input type="checkbox" id="select-all-active"
                                        class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                Account Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                Account Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                Balance
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                Is Active
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                Updated At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($activeAccounts as $account)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <div class="flex items-center">
                                        <input type="checkbox"
                                            class="form-checkbox row-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $account->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $account->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ ucfirst($account->accountType->name) }}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    ₹{{ number_format($account->balance, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $account->is_active ? 'Yes' : 'No' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $account->created_at->format('Y-m-d H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $account->updated_at->format('Y-m-d H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 flex space-x-2">
                                    <a href="{{ route('accounts.edit', $account['id']) }}"
                                        class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Edit</a>

                                    <form action="{{ route('accounts.destroy', $account['id']) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                    <form action="{{ route('accounts.toggleActive', $account['id']) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $account['id'] }}">
                                        <input type="hidden" name="is_active" value="{{ $account['is_active'] }}">
                                        <button type="submit"
                                            class="{{ $account['is_active'] ? 'bg-green-500' : 'bg-yellow-500' }} text-white px-2 py-1 rounded hover:{{ $account['is_active'] ? 'bg-green-600' : 'bg-yellow-600' }}">
                                            {{ $account['is_active'] ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 text-white font-sans rounded-md p-2">
        <h1 class="text-2xl font-semibold bg-gray-900 p-4 rounded-md mb-2">Inactive Accounts</h1>
        <div class="w-full overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            <div class="flex items-center space-x-2"></div>
                                <input type="checkbox" id="select-all-inactive"
                                    class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Account Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Account Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Balance
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Is Active
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Updated At
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @foreach($inactiveAccounts as $account)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="form-checkbox row-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $account->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $account->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ ucfirst($account->accountType->name) }}

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                ₹{{ number_format($account->balance, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $account->is_active ? 'Yes' : 'No' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $account->created_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $account->updated_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 flex space-x-2">
                                <a href="{{ route('accounts.edit', $account['id']) }}"
                                    class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Edit</a>

                                <form action="{{ route('accounts.destroy', $account['id']) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                                </form>
                                <form action="{{ route('accounts.toggleActive', $account['id']) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $account['id'] }}">
                                    <input type="hidden" name="is_active" value="{{ $account['is_active'] }}">
                                    <button type="submit"
                                        class="{{ $account['is_active'] ? 'bg-green-500' : 'bg-yellow-500' }} text-white px-2 py-1 rounded hover:{{ $account['is_active'] ? 'bg-green-600' : 'bg-yellow-600' }}">
                                        {{ $account['is_active'] ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </div>
    </div>


    <script>
    document.getElementById('select-all-active').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('.active-table .row-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    document.getElementById('select-all-inactive').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('.inactive-table .row-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>
@endsection