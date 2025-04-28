
@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white p-6 rounded-md">
    <h1 class="text-2xl font-semibold mb-4">Add New Transaction</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <!-- Account Selection -->
        <div class="mb-4">
            <label for="account_id" class="block text-gray-200 font-medium">Select Account</label>
            <select name="account_id" id="account_id" class="w-full px-4 py-2 border border-gray-600 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Select Account --</option>
                @foreach($accounts as $account)
                    <option value="{{ $account->id }}" {{ old('account_id') == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
                @endforeach
            </select>
            @error('account_id')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Amount -->
        <div class="mb-4">
            <label for="amount" class="block text-gray-200 font-medium">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount') }}" class="w-full px-4 py-2 border border-gray-600 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('amount')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Transaction Type -->
        <div class="mb-4">
            <label for="transaction_type" class="block text-gray-200 font-medium">Transaction Type</label>
            <select name="transaction_type" id="transaction_type" class="w-full px-4 py-2 border border-gray-600 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="credit" {{ old('transaction_type') == 'credit' ? 'selected' : '' }}>Credit</option>
                <option value="debit" {{ old('transaction_type') == 'debit' ? 'selected' : '' }}>Debit</option>
            </select>
            @error('transaction_type')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Note -->
        <div class="mb-4">
            <label for="note" class="block text-gray-200 font-medium">Note</label>
            <textarea name="note" id="note" rows="3" class="w-full px-4 py-2 border border-gray-600 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('note') }}</textarea>
            @error('note')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="mt-4 flex space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Create</button>
            <a href="{{ route('transactions') }}" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</a>
        </div>
    </form>
</div>
@endsection
