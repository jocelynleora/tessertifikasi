@extends('layouts.app')

@section('content')
    <div class="mt-12">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
            Books Data</h1>



        <div class="my-4">
            <a href="{{ route('books.create') }}"
            class="px-6 py-2 bg-pink-500 text-white font-semibold rounded-lg hover:bg-pink-200 transition duration-300">
            Add new book
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Author</th>
                        <th scope="col" class="px-6 py-3">Publisher</th>
                        <th scope="col" class="px-6 py-3">Published Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $book->title }}
                            </td>
                            <td class="px-6 py-4">{{ $book->author }}</td>
                            <td class="px-6 py-4">{{ $book->publisher }}</td>
                            <td class="px-6 py-4">{{ $book->published_date }}</td>
                            <td class="px-6 py-4 flex space-x-4">
                                <a href="{{ route('books.show', $book->id) }}"
                                    class="text-gray-600 hover:text-gray-800 font-medium dark:text-gray-500 dark:hover:text-gray-400 hover:underline transition duration-300">Show</a>
                                <a href="{{ route('books.edit', $book->id) }}"
                                    class="text-gray-600 hover:text-gray-800 font-medium dark:gray-blue-500 dark:hover:text-gray-400 hover:underline transition duration-300">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-gray-600 hover:text-gray-800 font-medium dark:text-gray-500 dark:hover:text-gray-400 hover:underline transition duration-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">
                                No books found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
