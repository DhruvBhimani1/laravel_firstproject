@extends('layout.main')
@section('content')
    <form class="max-w-sm mx-auto mt-10" action="{{$url}}" method="POST">
        @csrf
        <h1 class="text-center text-lg text-blue-700">
         {{$title}}
        </h1>
        <x-input type="email" name="email"   label="Your email" :value="$user->email ?? ''" />
        <x-input type="text" name="firstname"  label="Pls Enter your name" :value="$user->firstname ?? ''"/>
        <x-input type="text" name="lastname"    label="Pls Enter your lastname" :value="$user->lastname ?? ''"/>
        <x-input type="password" name="password"  label="Your password" value="" />
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>
@endsection