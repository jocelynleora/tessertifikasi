<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tahoma:wght@400;600&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Tahoma', serif;
        }
        .brand {
            font-family: 'Dancing Script', cursive;
        }
    </style>
</head>
<body class="bg-pink-50">
    <nav class="bg-pink-100 border-b-4 border-pink-300 shadow-lg">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="brand text-3xl text-pink-700 font-bold">
                📚 Library
            </a>
            <!-- Navigation Links -->
            <div class="flex space-x-8">
                <a href="{{ route('home') }}"
                    class="text-pink-700 text-lg hover:text-pink-900 transition duration-300 ease-in-out">Home</a>
                <a href="{{ route('members.index') }}"
                    class="text-pink-700 text-lg hover:text-pink-900 transition duration-300 ease-in-out">Members</a>
                <a href="{{ route('books.index') }}"
                    class="text-pink-700 text-lg hover:text-pink-900 transition duration-300 ease-in-out">Books</a>
                <a href="{{ route('book_categories.index') }}"
                    class="text-pink-700 text-lg hover:text-pink-900 transition duration-300 ease-in-out">Book Categories</a>
            </div>
        </div>
    </nav>
</body>
</html>
