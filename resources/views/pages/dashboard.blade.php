@extends('layouts.app')

@section('content')

    <div class="bg-gray-900 text-white h-screen font-sans rounded-md">
        <!-- Top Bar -->
        <div class="flex justify-between items-center p-4 border-b border-gray-800">
            <div class="flex gap-4 items-center">
                <button class="bg-gray-800 text-white px-3 py-1 rounded-md-full">Utkarsh</button>
                <nav class="flex gap-4 text-sm">
                    <a href="#" class="text-white">Overview</a>
                    <a href="#" class="text-gray-400">Spendings</a>
                    <a href="#" class="text-gray-400">Earnings</a>
                    <a href="#" class="text-gray-400">Savings</a>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                <input type="text" placeholder="Search..." class="bg-gray-800 px-3 py-1 text-sm rounded-md" />
                <div class="w-8 h-8 rounded-md-full bg-gray-600"></div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-4">
            <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
            <!-- Tabs -->
            <div class="flex gap-4 mb-4 text-sm">
                <button class="bg-white text-black px-3 py-1 rounded-md">Overview</button>
                <button class="text-gray-400">Analytics</button>
                <button class="text-gray-400">Reports</button>
                <button class="text-gray-400">Notifications</button>
            </div>

            <!-- Metrics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div class="bg-gray-800 p-4 rounded-md">
                    <p>Total Amount</p>
                    <h2 class="text-2xl font-bold">$45,231.89</h2>
                    <p class="text-green-500 text-xs">+20.1% from last month</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-md">
                    <p>This Month Saving</p>
                    <h2 class="text-2xl font-bold">+2350</h2>
                    <p class="text-green-500 text-xs">+180.1% from last month</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-md">
                    <p>This Month Spending</p>
                    <h2 class="text-2xl font-bold">+12,234</h2>
                    <p class="text-green-500 text-xs">+19% from last month</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-md">
                    <p>Active Now</p>
                    <h2 class="text-2xl font-bold">+573</h2>
                    <p class="text-green-500 text-xs">+201 since last hour</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div class="bg-gray-800 p-4 rounded-md">
                    <p>Total Amount</p>
                    <h2 class="text-2xl font-bold">$45,231.89</h2>
                    <p class="text-green-500 text-xs">+20.1% from last month</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-md">
                    <p>This Month Saving</p>
                    <h2 class="text-2xl font-bold">+2350</h2>
                    <p class="text-green-500 text-xs">+180.1% from last month</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-md">
                    <p>This Month Spending</p>
                    <h2 class="text-2xl font-bold">+12,234</h2>
                    <p class="text-green-500 text-xs">+19% from last month</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-md">
                    <p>Active Now</p>
                    <h2 class="text-2xl font-bold">+573</h2>
                    <p class="text-green-500 text-xs">+201 since last hour</p>
                </div>
            </div>

            <!-- Charts and Sales -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 bg-gray-800">
                <div class="bg-gray-800 p-4 rounded-md">
                    <p class="mb-2">Monthly Savings</p>
                    <canvas id="lineChart"></canvas>
                </div>
                <div className="bg-[#1c1c1e] border border-white rounded-2xl p-4 w-full max-w-sm shadow-md">
                    <h2 className="text-white text-xl font-semibold mb-4">
                        Individual Amount Transactions
                    </h2>

                    <div className="space-y-3 text-white text-sm">
                        <div className="flex justify-between">
                            <span>Salary</span>
                            <span>₹60,000</span>
                        </div>
                        <div className="flex justify-between">
                            <span>Side Income</span>
                            <span>₹15,000</span>
                        </div>
                        <div className="flex justify-between">
                            <span>Part-Time</span>
                            <span>₹8,500</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        label: 'Total Savings',
                        data: [1200, 1500, 1800, 2000, 1700, 1900, 2200, 2400, 2100, 2300, 2500, 2700],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        tension: 0.4
                    },
                    {
                        label: 'Salary Savings',
                        data: [1000, 1200, 1400, 1600, 1500, 1700, 2000, 2200, 1900, 2100, 2300, 2500],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 2,
                        tension: 0.4
                    },
                    {
                        label: 'Side Savings',
                        data: [200, 300, 400, 500, 200, 300, 200, 200, 200, 200, 200, 200],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 2,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Months'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Amount ($)'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection