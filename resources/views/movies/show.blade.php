@extends('layouts.main')
@section('content')
    <div class="movie-info border-b border-white">
        <div class="mx-auto px-4 py-16 flex flex-col md:flex-row" style="background-image: linear-gradient(to right, rgba(10.98%, 11.76%, 12.55%, 1.00) 150px, rgba(10.98%, 11.76%, 12.55%, 0.84) 100%), url(https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces{{ $movie['backdrop_path'] }})">
            <div class="flex-none">
                <img src="{{ $movie['poster_path'] }}" alt="poster" class="w-64 lg:w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl text-white mt-4 md:mt-0 font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-white text-sm">
                    <svg class="fill-current text-yellow-300 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['genres'] }}</span>
                </div>

                <p class="text-white mt-8">
                    {{ $movie['overview'] }}
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                            @foreach ($movie['crew'] as $crew)
                                <div class="mr-8">
                                    <div class="text-white font-bold">{{ $crew['name'] }}</div>
                                    <div class="text-sm text-white">{{ $crew['job'] }}</div>
                                </div>

                            @endforeach
                    </div>
                </div>
                <div x-data="{ isOpen: false }">
                    @if (count($movie['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true"
                                class="flex inline-flex items-center text-white rounded font-semibold hover:opacity-75 transition ease-in-out duration-150"
                            >
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                        <div
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            x-show.transition.opacity="isOpen"
                        >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-transparent rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                            @click="isOpen = false"
                                            @keydown.escape.window="isOpen = false"
                                            class="text-3xl text-white leading-none hover:opacity-75">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-4">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                            <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div> <!-- end movie-info -->
    <div class="movie-cast border-b border-white">
        <div class="container mx-auto px-4 py-16">
            <h2 class="uppercase tracking-wider p-2 text-black bg-white text-center rounded-full border-2 border-black text-2xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                                @foreach ($movie['cast'] as $cast)
                                    <div class="mt-8 text-white">
                                        <a href="#">
                                            <a href="{{ route('actors.show', $cast['id']) }}">
                                                <img src="{{ $cast['profile_path'] }}" alt="actor1" class="rounded-md hover:opacity-75 transition ease-in-out duration-150">
                                        </a>
                                        <div class="mt-2">
                                            <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>                                            <div class="text-sm text-gray-400">
                                                <div class="text-white">{{ $cast['character'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
            </div> <!-- end movie-cast -->
            <div class="movie-images" x-data="{ isOpen: false, image: ''}">
                <div class="container mx-auto px-4 py-16">
                    <h2 class="uppercase tracking-wider p-2 text-black bg-white text-center rounded-full border-2 border-black text-2xl font-semibold">Images</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                            @foreach ($movie['images'] as $image)
                                <div class="mt-8">
                                    <a
                                        @click.prevent="
                                isOpen = true
                                image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                            "
                                        href="#"
                                    >
                                        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="rounded-md hover:opacity-75 transition ease-in-out duration-150">
                                    </a>
                                </div>
                            @endforeach
                    </div>

                    <div
                        style="background-color: rgba(0, 0, 0, .5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        x-show="isOpen"
                    >
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button
                                        @click="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="text-3xl leading-none hover:text-gray-300">&times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <img :src="image" alt="poster">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end movie-images -->
@endsection
