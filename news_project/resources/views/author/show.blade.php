//resources/views/products/show.blade.php
@extends('layouts.app')
 
@section('title', 'Show Product')
 
@section('contents')
<h1 class="font-bold text-2xl ml-3">Detail Author</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
                {{ $author->name }}
            </div>
        </div>
 
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
                {{ $author->email }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Bio</label>
            <div class="mt-2">
                {{ $author->bio }}
            </div>
        </div>
        </form>
    </div>
</div>
@endsection