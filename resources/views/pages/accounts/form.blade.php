@php
    $isEdit = isset($account);
@endphp

<form method="POST" action="{{ $isEdit ? route('accounts.update', $account->id) : route('accounts.store') }}">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <!-- Account Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-200">Account Name</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full rounded-md bg-gray-800 text-white border-gray-600 focus:border-blue-500 focus:ring-blue-500"
                value="{{ old('name', $account->name ?? '') }}" required>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Balance -->
        <div>
            <label for="balance" class="block text-sm font-medium text-gray-200">Balance</label>
            <input type="number" name="balance" id="balance" step="0.01"
                class="mt-1 block w-full rounded-md bg-gray-800 text-white border-gray-600 focus:border-blue-500 focus:ring-blue-500"
                value="{{ old('balance', $account->balance ?? 0) }}" required>
            @error('balance')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Account Type -->
        <div>
            <label for="account_type_id" class="block text-sm font-medium text-gray-200">Account Type</label>
            <select name="account_type_id" id="account_type_id"
                class="mt-1 block w-full rounded-md bg-gray-800 text-white border-gray-600 focus:border-blue-500 focus:ring-blue-500"
                required>
                <option value="">Select Account Type</option>
                @foreach($accountTypes as $type)
                    <option value="{{ $type->id }}"
                        {{ old('account_type_id', $account->account_type_id ?? '') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            @error('account_type_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Active Status -->
        <div>
            <label for="is_active" class="block text-sm font-medium text-gray-200">Status</label>
            <select name="is_active" id="is_active"
                class="mt-1 block w-full rounded-md bg-gray-800 text-white border-gray-600 focus:border-blue-500 focus:ring-blue-500"
                required>
                <option value="1" {{ old('is_active', $account->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $account->is_active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('is_active')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-6">
        <button type="submit"
            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
            {{ $isEdit ? 'Update Account' : 'Create Account' }}
        </button>
    </div>
</form>
