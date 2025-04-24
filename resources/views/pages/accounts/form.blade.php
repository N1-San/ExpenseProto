<div class="flex flex-col gap-4">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-300">Account Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $account->name ?? '') }}"
            class="mt-1 block w-full rounded-md bg-gray-800 text-white border-gray-600 focus:ring-blue-500 focus:border-blue-500">
        @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="amount" class="block text-sm font-medium text-gray-300">Total Amount</label>
        <input type="number" name="amount" id="amount" value="{{ old('amount', $account->amount ?? '') }}"
            class="mt-1 block w-full rounded-md bg-gray-800 text-white border-gray-600 focus:ring-blue-500 focus:border-blue-500">
        @error('amount')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center gap-2">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" name="is_active" id="is_active" value="1"
        class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
        {{ old('is_active', $account->is_active ?? false) ? 'checked' : '' }}>
    <label for="is_active" class="text-sm font-medium text-gray-300">Is Active</label>
</div>
</div>