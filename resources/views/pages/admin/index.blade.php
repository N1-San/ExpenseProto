@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gray-950 text-white font-sans p-4">
    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center bg-gray-900 p-4 rounded-md">
            <h1 class="text-2xl font-semibold">Admin Panel</h1>
        </div>

        <div class="bg-gray-900 rounded-md p-4 flex-grow">
            <div x-data="{ tab: 'ManageRoles' }" class="flex flex-col">
                <nav class="flex space-x-6 bg-gray-800 p-4 rounded-md">
                    <a href="#" @click.prevent="tab = 'ManageRoles'" :class="{ 'bg-gray-700': tab === 'ManageRoles' }" class="p-2 rounded">Manage Roles</a>
                    <a href="#" @click.prevent="tab = 'ManageUsers'" :class="{ 'bg-gray-700': tab === 'ManageUsers' }" class="p-2 rounded">Manage Users</a>
                    <a href="#" @click.prevent="tab = 'ManageModules'" :class="{ 'bg-gray-700': tab === 'ManageModules' }" class="p-2 rounded">Manage Modules</a>
                    <a href="#" @click.prevent="tab = 'Lockdown'" :class="{ 'bg-gray-700': tab === 'Lockdown' }" class="p-2 rounded">Lockdown</a>
                </nav>

                <div class="mt-4">
                    <div x-show="tab === 'ManageRoles'">
                        @include('pages.admin.tabs.ManageRoles.index')
                    </div>
                    <div x-show="tab === 'ManageUsers'">
                        @include('pages.admin.tabs.ManageUsers.index')
                    </div>
                    <div x-show="tab === 'ManageModules'">
                        @include('pages.admin.tabs.ManageModules.index')
                    </div>
                    <div x-show="tab === 'Lockdown'">
                        @include('pages.admin.tabs.Lockdown.index')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection