@extends('layout.main')
@section('content')
  <form method="POST" action="{{url('/upload')}}" class="m-6" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col w-[40%]">
        
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload</label>
        <input id="file"  name="file" type="file"  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" >
        <button type="submit" class="py-2.5 px-5 me-2 mb-2 mt-2  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Save</button>
    </div>
    
  </form>
 @endsection