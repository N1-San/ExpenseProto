@extends('layouts.app')

@section('content')
    <div class="bg-gray-900 text-white p-6 rounded-md">
        <h1 class="text-2xl font-semibold mb-4">Savings</h1>
        <form action="{{ route('savings.store') }}" method="POST">
            @csrf



            <!-- Transfer Type -->
            <div class="mb-4">
                <label for="from_type" class="block text-gray-200 font-medium">Transfer Type</label>
                <select name="from_type" id="from_type"
                    class="w-full px-4 py-2 border border-gray-600 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="account" {{ old('from_type') == 'account' ? 'selected' : '' }}>Account → Savings</option>
                    <option value="savings" {{ old('from_type') == 'savings' ? 'selected' : '' }}>Savings → Account</option>
                </select>
                @error('from_type')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- From Account/Savings -->
            <div class="mb-4">
                <label for="from_id" class="block text-gray-200 font-medium">From</label>
                <select name="from_id" id="from_id"
                    class="w-full px-4 py-2 border border-gray-600 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">-- Select From --</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                    @endforeach
                    @foreach($savings as $saving)
                        <option value="{{ $saving->id }}">{{ $saving->name }}</option>
                    @endforeach
                </select>
                @error('from_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- To Account/Savings -->
            <div class="mb-4">
                <label for="to_id" class="block text-gray-200 font-medium">To</label>
                <select name="to_id" id="to_id"
                    class="w-full px-4 py-2 border border-gray-600 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">-- Select To --</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                    @endforeach
                    @foreach($savings as $saving)
                        <option value="{{ $saving->id }}">{{ $saving->name }}</option>
                    @endforeach
                </select>
                @error('to_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Amount -->
            <div class="mb-4">
                <label for="amount" class="block text-gray-200 font-medium">Amount</label>
                <input type="number" name="amount" id="amount" step="0.01" min="0.01" value="{{ old('amount') }}"
                    class="w-full px-4 py-2 border border-gray-600 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('amount')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit and Cancel -->
            <div class="mt-4 flex space-x-4">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Transfer
                </button>
                <a href="{{ route('savings.index') }}"
                    class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Cancel
                </a>
            </div>
        </form>
    </div>


@endsection