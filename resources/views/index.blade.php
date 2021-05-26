@extends('layouts.main')

@section('content')
    <div class="container bg-white mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider p-2 text-black bg-white text-center rounded-full border-2 border-black text-2xl font-semibold">Popular Movies</h2>
            <div class="overflow-x-auto">
            <div class="flex gap-6 mb-5">
                @foreach ($popularMovies as $movie)
                    <x-movies-card :movie="$movie" />
                @endforeach
            </div>
            </div>
        </div>
        <div class="text-center mt-6 mb-10"><a class="rounded-full border-2 border-black pr-2 pl-2 hover:opacity-75" href="{{ route('movies.index') }}">More</a></div>
        <!-- end pouplar-movies -->
        <div class="now-playing-movies">
            <h2 class="uppercase tracking-wider p-2 text-black bg-white text-center rounded-full border-2 border-black text-2xl font-semibold">Now Playing</h2>
            <div class="overflow-x-auto">
            <div class="flex gap-6 mb-5">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movies-card :movie="$movie" />
                @endforeach
            </div>
            </div>
        </div>
        <div class="text-center mt-6  mb-10"><a class="rounded-full border-2 border-black pr-2 pl-2 hover:opacity-75" href="{{ route('movies.nowPlay') }}">More</a></div>
        <!-- end now-playing-movies -->
        <div class="popular-tv">
            <h2 class="uppercase tracking-wider p-2 text-black bg-white text-center rounded-full border-2 border-black text-2xl font-semibold">Popular TV Shows</h2>
            <div class="overflow-x-auto">
                <div class="flex gap-6 mb-5">
                @foreach ($popularTv as $tvshow)
                    <x-tvs-card :tvshow="$tvshow" />
                @endforeach
            </div>
            </div>
        </div>
        <div class="text-center mt-6 mb-10"><a class="rounded-full border-2 border-black pr-2 pl-2 hover:opacity-75" href="{{ route('tv.index') }}">More</a></div>
        <!-- end popular-tv -->
        <div class="top-rated-tv">
            <h2 class="uppercase tracking-wider p-2 text-black bg-white text-center rounded-full border-2 border-black text-2xl font-semibold">Top Rated TV Shows</h2>
            <div class="overflow-x-auto">
                <div class="flex gap-6 mb-5">
                @foreach ($topRatedTv as $tvshow)
                    <x-tvs-card :tvshow="$tvshow" />
                @endforeach
            </div>
            </div>
        </div>
            <div class="text-center mt-6 mb-10"><a class="rounded-full border-2 border-black pr-2 pl-2 hover:opacity-75" href="{{ route('tv.TopRatedTV') }}">More</a></div>
        <!-- end top-rated-tv -->
            <div class="popular-actors">
            <h2 class="uppercase tracking-wider p-2 text-black bg-white text-center rounded-full border-2 border-black text-2xl font-semibold">Popular Actors</h2>
                <div class="overflow-x-auto">
                    <div class="flex gap-6 mb-5">
                @foreach ($popularActors as $actor)
                    <div class="actor shadow-lg rounded mt-8">
                        <a href="{{ route('actors.show', $actor['id']) }}">
                            <div class="w-48"><img src="{{ $actor['profile_path'] }}" alt="profile image" class="rounded-md hover:opacity-75 transition ease-in-out duration-150"></div>
                        </a>
                        <div class="items-center m-2">
                            <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                            <div class="text-sm overflow-ellipsis text-black">{{ $actor['known_for'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
                </div>
            </div>
            <div class="text-center pt-6 pb-10"><a class="rounded-full border-2 border-black pr-2 pl-2 hover:opacity-75" href="{{ route('actors.index') }}">More</a></div>
    </div>
@endsection
