@extends('layouts.app')

@section('title', 'Page Accueil')


@section('navbar')
    <div class="navbar navbar-top mb-2 shadow-lg bg-askHim-blue text-neutral-content">
        <div class="flex-none hidden lg:flex">
            <button class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     class="inline-block w-6 h-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <div class="flex-1 hidden px-2 mx-2 lg:flex">
            <span class="text-lg font-bold">AskHim</span>
        </div>

        <div class="flex-1 lg:flex-none">
            <div class="form-control ">
                <input type="text" placeholder="Search" class="input input-ghost">
            </div>
        </div>
        <div class="flex-none">
            <button class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     class="inline-block w-6 h-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
        <div class="flex-none">
            <button class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     class="inline-block w-6 h-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </button>
        </div>
        <div class="flex-none">
            <div class="avatar">
                <div class="rounded-full w-10 h-10 m-1">
                    <img src="https://i.pravatar.cc/500?img=32">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Job</th>
                <th>Favorite Color</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>1</th>
                <td>Cy Ganderton</td>
                <td>Quality Control Specialist</td>
                <td>Blue</td>
            </tr>
            <tr>
                <th>2</th>
                <td>Hart Hagerty</td>
                <td>Desktop Support Technician</td>
                <td>Purple</td>
            </tr>
            <tr>
                <th>3</th>
                <td>Brice Swyre</td>
                <td>Tax Accountant</td>
                <td>Red</td>
            </tr>
            <tr>
                <th>4</th>
                <td>Marjy Ferencz</td>
                <td>Office Assistant I</td>
                <td>Crimson</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection














