@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-12">
        <h2 class="text-2xl font-semibold text-center mb-6">Edit Book</h2>

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk update -->

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter book title" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Author -->
            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-medium">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter author name" required>
                @error('author')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Publisher -->
            <div class="mb-4">
                <label for="publisher" class="block text-gray-700 font-medium">Publisher</label>
                <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $book->publisher) }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter publisher name" required>
                @error('publisher')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Published Date -->
            <div class="mb-4">
                <label for="published_date" class="block text-gray-700 font-medium">Published Date</label>
                <input type="date" name="published_date" id="published_date" value="{{ old('published_date', $book->published_date) }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('published_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Number of Pages -->
            <div class="mb-4">
                <label for="number_of_pages" class="block text-gray-700 font-medium">Number of Pages</label>
                <input type="number" name="number_of_pages" id="number_of_pages" value="{{ old('number_of_pages', $book->number_of_pages) }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter number of pages" required>
                @error('number_of_pages')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Member -->
            <div class="mb-4">
                <label for="member_id" class="block text-gray-700 font-medium">Member</label>
                <select name="member_id" id="member_id"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" {{ old('member_id', $book->member_id) === null ? 'selected' : '' }}>None</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}" {{ (old('member_id', $book->member_id) == $member->id) ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
                @error('member_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>


            <!-- Categories (Checkbox) -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Categories</label>
                <div class="flex flex-wrap gap-4">
                    @foreach ($categories as $category)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                class="form-checkbox h-5 w-5 text-blue-600"
                                {{ (is_array(old('categories', $book->categories->pluck('id')->toArray())) && in_array($category->id, old('categories', $book->categories->pluck('id')->toArray()))) ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                <p class="text-sm text-gray-500 mt-1">Select one or more categories.</p>
                @error('categories')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                class="inline-block text-white bg-pink-600 hover:bg-pink-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-6 py-3 transition duration-300">
                    Update Book
                </button>
            </div>
        </form>
    </div>
@stop
