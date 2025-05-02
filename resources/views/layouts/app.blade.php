<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>&#x1F4B8; Expense</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Tabler Icons CDN -->
    <script src="https://unpkg.com/@tabler/icons@latest/iconfont/tabler-icons.min.js"></script>
</head>

<body class="bg-gray-800 text-white">
    <div class="flex flex-col h-full">


        <!-- Sidebar -->
        <aside class="w-64 h-screen bg-gray-900 text-white flex flex-col fixed top-0 left-0">
            @guest
                <a href="{{ url('/') }}">
                    <div class="bg-blue-500 text-white p-4 text-xl font-bold flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-layout">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 3a3 3 0 0 1 3 3v1a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-1a3 3 0 0 1 3 -3z" />
                            <path d="M8 12a3 3 0 0 1 3 3v3a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-3a3 3 0 0 1 3 -3z" />
                            <path d="M18 3a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3z" />
                        </svg>
                        <h1>Expense</h1>
                    </div>
                </a>
            @endguest
            @auth
                <div class="bg-blue-500 text-white p-4 text-xl font-bold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                        class="icon icon-tabler icons-tabler-filled icon-tabler-layout">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 3a3 3 0 0 1 3 3v1a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-1a3 3 0 0 1 3 -3z" />
                        <path d="M8 12a3 3 0 0 1 3 3v3a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-3a3 3 0 0 1 3 -3z" />
                        <path d="M18 3a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-2a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3z" />
                    </svg>
                    <h1>Expense</h1>
                </div>
                <nav class="flex-1 p-4 space-y-2">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M13.45 11.55l2.05 -2.05" />
                            <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('accounts.index') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('accounts.index') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-receipt-rupee">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                            <path d="M15 7h-6h1a3 3 0 0 1 0 6h-1l3 3" />
                            <path d="M9 10h6" />
                        </svg>
                        <span>Accounts</span>
                    </a>
                    <a href="{{ route('transactions.index') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('transactions.index') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-transaction-rupee">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M21 12h-6h1a3 3 0 0 1 0 6h-1l3 3" />
                            <path d="M15 15h6" />
                            <path d="M5 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M7 5h8" />
                            <path d="M7 5v8a3 3 0 0 0 3 3h1" />
                        </svg>
                        <span>Transactions</span>
                    </a>
                    @role('admin')
                    <a href="{{ route('savings.index') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('savings.index') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-hearts">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14.017 18l-2.017 2l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 0 1 8.153 5.784" />
                            <path
                                d="M15.99 20l4.197 -4.223a2.81 2.81 0 0 0 0 -3.948a2.747 2.747 0 0 0 -3.91 -.007l-.28 .282l-.279 -.283a2.747 2.747 0 0 0 -3.91 -.007a2.81 2.81 0 0 0 -.007 3.948l4.182 4.238z" />
                        </svg>
                        <span>Savings</span>
                    </a>
                    <a href="{{ route('monthlyLedger') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('monthlyLedger') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-calendar">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                            <path d="M16 3v4" />
                            <path d="M8 3v4" />
                            <path d="M4 11h16" />
                            <path d="M11 15h1" />
                            <path d="M12 15v3" />
                        </svg>
                        <span>Monthly Ledger</span>
                    </a>
                    <a href="{{ route('budget') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('budget') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-droplet-dollar">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M17.668 10.29l-4.493 -6.673c-.421 -.625 -1.288 -.803 -1.937 -.397a1.376 1.376 0 0 0 -.41 .397l-4.893 7.26c-1.695 2.838 -1.035 6.441 1.567 8.546a7.175 7.175 0 0 0 5.493 1.51" />
                            <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                            <path d="M19 21v1m0 -8v1" />
                        </svg>
                        <span>Budget</span>
                    </a>
                    <a href="{{ route('expenses') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('expenses') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-message-dollar">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 9h8" />
                            <path d="M8 13h6" />
                            <path d="M13 18l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v3.5" />
                            <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                            <path d="M19 21v1m0 -8v1" />
                        </svg>
                        <span>Expenses</span>
                    </a>
                    <a href="{{ route('emergencySavings') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('emergencySavings') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-sos">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 8a2 2 0 0 1 2 2v4a2 2 0 1 1 -4 0v-4a2 2 0 0 1 2 -2" />
                            <path d="M17 15c.345 .6 1.258 1 2 1a2 2 0 1 0 0 -4a2 2 0 1 1 0 -4c.746 0 1.656 .394 2 1" />
                            <path d="M3 15c.345 .6 1.258 1 2 1a2 2 0 1 0 0 -4a2 2 0 1 1 0 -4c.746 0 1.656 .394 2 1" />
                        </svg>
                        <span>Emergency Savings</span>
                    </a>
                    <a href="{{ route('exportData') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('exportData') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-database-export">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
                            <path d="M4 6v6c0 1.657 3.582 3 8 3c1.118 0 2.183 -.086 3.15 -.241" />
                            <path d="M20 12v-6" />
                            <path d="M4 12v6c0 1.657 3.582 3 8 3c.157 0 .312 -.002 .466 -.005" />
                            <path d="M16 19h6" />
                            <path d="M19 16l3 3l-3 3" />
                        </svg>
                        <span>Export Data</span>
                    </a>
                    <a href="{{ route('user') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('user') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        <span>User</span>
                    </a>
                    @endrole
                </nav>
            @endauth
            <div class="mt-auto">
                @guest
                    <!-- Guest (Not Logged In) -->
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('login') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-login-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                            <path d="M3 12h13l-3 -3" />
                            <path d="M13 15l3 -3" />
                        </svg>
                        Login</a>
                    <a href="{{ route('register') }}"
                        class="flex items-center gap-2 p-2 rounded {{ request()->routeIs('register') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-share">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h3" />
                            <path d="M16 22l5 -5" />
                            <path d="M21 21.5v-4.5h-4.5" />
                        </svg>
                        Register</a>
                @endguest

                @auth
                    <!-- Authenticated User -->
                    <div class="user-info mt-2">
                        <p class="mb-2">Welcome, {{ auth()->user()->name }}</p>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div
                                class="flex items-center rounded {{ request()->routeIs('logout') ? 'bg-red-700' : 'hover:bg-red-700' }}">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-login">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                    <path d="M21 12h-13l3 -3" />
                                    <path d="M11 15l-3 -3" />
                                </svg><button type="submit" class="flex items-center gap-2 p-2 rounded">Logout</button>
                            </div>
                        </form>
                    </div>
                @endauth
            </div>
        </aside>
    </div>
    <!-- Main content -->
    <div class="flex-1 ml-64 p-4">
        @yield('content')
    </div>

</body>

</html>