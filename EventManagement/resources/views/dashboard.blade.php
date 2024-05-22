<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end bg-dark text-gray-800 dark:text-gray-200">
            Dashboard
        </div>

        <div>
          <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
            <div class="bg-dark dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

    <div class="py-12">
        <section class="p-3 mb-2 bg-dark text-primary-emphasis">
            <div class="container px-6 py-10 mx-auto">
                <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Latest Events</h1>

                <div class="row mt-8">
                    @foreach ($events as $event)
                    <div class="col-md-3 mb-4">
                        <div class="card" style="width: 18rem; height: 24rem;"> <!-- Fixed card size -->
                            <img src="{{ asset('/storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 12rem; object-fit: cover;"> <!-- Fixed image size -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <div>
                                    @foreach ($event->tags as $tag)
                                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                                <a href="{{ route('dbEventShow', $event->id) }}" class="btn btn-primary mt-2">More info</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
