@extends('layouts.app')

@section('content')
    <div class="mt-12 max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Member Details</h1>

        <div class="space-y-4">
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>Name:</strong> {{ $member->name }}</p>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>Address:</strong> {{ $member->address }}</p>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>Phone Number:</strong> {{ $member->phone_number }}</p>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>National ID Number:</strong> {{ $member->national_id_number }}</p>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>Join Date:</strong> {{ \Carbon\Carbon::parse($member->join_date)->format('F j, Y') }}</p>
            </div>
        </div>

    

        <div class="mt-6">
            <a href="{{ route('members.index') }}" class="inline-block text-white bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:ring-pink-300 font-medium rounded-lg text-lg px-6 py-3 transition duration-300">Back to Members</a>
        </div>
    </div>
@stop
