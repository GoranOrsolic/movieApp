@extends('layouts.main')

@section('content')
    <div class="container bg-white mx-auto px-4 pt-16">
        <div class="now-playing-movies">
            <h2 class="uppercase tracking-wider p-2 text-black bg-white text-center rounded-full border-2 border-black text-2xl font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach
            </div>
        </div> <!-- end now-playing-movies -->
        <div class="page-load-status my-8">
            <div class="flex justify-center">
                <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll( elem, {
            path: 'nowPlay/page/@{{#}}',
            append: '.now',
            status: '.page-load-status',
            // history: false,
        });
    </script>
@endsection


