@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-6">Loan a Book</h2>

        <!-- Form untuk peminjaman buku -->
        <form action="{{ route('loans.store') }}" method="POST">
            @csrf

            <!-- Nama Member -->
            <div class="mb-4">
                <label for="member_id" class="block text-gray-700 font-medium">Member Name</label>
                <select name="member_id" id="member_id"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled selected>Select a member</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                </select>
                @error('member_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Judul Buku -->
            <div class="mb-4">
                <label for="book_id" class="block text-gray-700 font-medium">Book Title</label>
                <select name="book_id" id="book_id"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled selected>Select a book</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
                @error('book_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Peminjaman -->
            <div class="mb-4">
                <label for="loan_date" class="block text-gray-700 font-medium">Loan Date</label>
                <input type="date" name="loan_date" id="loan_date" value="{{ old('loan_date') ?? now()->toDateString() }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required onchange="calculateDueDate()">
                @error('loan_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Due Date -->
            <div class="mb-4">
                <label for="due_date" class="block text-gray-700 font-medium">Due Date</label>
                <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    readonly>
                @error('due_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-pink-500 text-white font-semibold rounded-lg hover:bg-pink-200 transition duration-300">
                    Loan Book
                </button>
            </div>
        </form>
    </div>

    <script>
        function calculateDueDate() {
            const loanDate = document.getElementById('loan_date').value;
            if (loanDate) {
                const dueDate = new Date(loanDate);
                dueDate.setDate(dueDate.getDate() + 7); // Tambahkan 7 hari ke loan_date
                const day = String(dueDate.getDate()).padStart(2, '0');
                const month = String(dueDate.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
                const year = dueDate.getFullYear();
                document.getElementById('due_date').value = `${year}-${month}-${day}`;
            }
        }
    </script>
@stop
