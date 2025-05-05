<form action="{{ route('savings.transfer') }}" method="POST">
    @csrf

    <div class="text-gray-900">


        <label>Transfer Type:</label>
        <select class="text-gray-900" name="from_type" required>
            <option value="account">Account → Savings</option>
            <option value="savings">Savings → Account</option>
        </select>

        <label>From Account:</label>
        <select name="from_id" required>
            @foreach ($accounts as $account)
                <option value="{{ $account->id }}">{{ $account->name }}</option>
            @endforeach
            @foreach ($savings as $saving)
                <option value="{{ $saving->id }}">{{ $saving->name }}</option>
            @endforeach
        </select>

        <label>To Account:</label>
        <select name="to_id" required>
            @foreach ($accounts as $account)
                <option value="{{ $account->id }}">{{ $account->name }}</option>
            @endforeach
            @foreach ($savings as $saving)
                <option value="{{ $saving->id }}">{{ $saving->name }}</option>
            @endforeach
        </select>

        <label>Amount:</label>
        <input type="number" name="amount" step="0.01" min="0" required>

        <button type="submit">Transfer</button>
    </div>
</form>