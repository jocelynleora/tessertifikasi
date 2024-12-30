@extends('layouts.app')

@section('content')
    <div class="mt-12">
        <div class="flex justify-between items-center mb-4">
            <h1
                class="text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
                Borrowing Data
            </h1>
            <a href="{{ route('loans.create') }}"
            class="px-6 py-2 bg-pink-500 text-white font-semibold rounded-lg hover:bg-pink-200 transition duration-300">
                Loan a Book
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Borrower
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Book Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Loan Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Due Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loans as $loan)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loan->member->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $loan->book->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $loan->loan_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $loan->due_date }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center">No borrowing data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
