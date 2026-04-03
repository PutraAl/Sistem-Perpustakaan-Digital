@extends('layout.master')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">


        <div class="bg-white p-4 rounded border">
            <p class="text-sm text-gray-500">Total Books</p>
            <h2 class="text-xl font-semibold">12,480</h2>
        </div>

        <div class="bg-white p-4 rounded border">
            <p class="text-sm text-gray-500">Members</p>
            <h2 class="text-xl font-semibold">3,214</h2>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid md:grid-cols-2 gap-4 mb-6">

        <div class="bg-white p-4 rounded border">
            <h2 class="text-sm font-medium mb-2">Monthly Borrow</h2>
            <canvas id="barChart"></canvas>
        </div>

        <div class="bg-white p-4 rounded border">
            <h2 class="text-sm font-medium mb-2">Genres</h2>
            <canvas id="pieChart"></canvas>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white p-4 rounded border">
        <h2 class="text-sm font-medium mb-3">Recent Activity</h2>

        <table class="w-full text-sm">
            <thead class="text-gray-500 border-b">
                <tr>
                    <th class="py-2 text-left">Book</th>
                    <th class="text-left">Member</th>
                    <th class="text-left">Date</th>
                    <th class="text-left">Status</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b">
                    <td class="py-2">Clean Code</td>
                    <td>Siti</td>
                    <td>Apr 1</td>
                    <td><span class="text-red-500">Overdue</span></td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection