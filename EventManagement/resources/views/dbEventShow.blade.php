<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end bg-dark text-gray-800 dark:text-gray-200">
        Dashboard
    </div>

    <div class="container mt-4">
        <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
            <div class="bg-dark dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $event->title }}
                </div>
            </div>
        </div>

        <div class="mt-4 mb-4 p-2 d-flex justify-content-between align-items-center">
            <h3 class="mb-4 text-2xl font-bold  text-white">{{ $event->title }}</h3>
            <div class="d-flex align-items-center  text-white">
                From:
                <span class="mx-2 text-white">{{ $event->start_date->format('m/d/Y') }}</span> |
                <span class="mx-2 text-white">{{ $event->end_date->format('m/d/Y') }}</span>
            </div>
        </div>

        <div class="mb-16 row">
            <div class="col-lg-6 mb-4">
                <div class="flex flex-col">
                    <div class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20" data-te-ripple-init data-te-ripple-color="light" style="border: 4px solid #5dcee2;">
                        <img src="{{ asset('/storage/' . $event->image) }}" class="w-100" style="height: 400px; object-fit: cover;" alt="Event Image" />
                        <a href="#!">
                            <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></div>
                        </a>
                    </div>

                    <div class="mt-4 d-flex" x-data="{
                        eventLike: @js($like),

                        onHandleLike() {
                            axios.post(`/events-like/{{ $event->id }}`).then(res => {
                                this.eventLike = res.data
                            })
                        },

                    }">
                        <button type="button" @click="onHandleLike"  class="btn btn-primary"
                        :class="eventLike ? 'btn btn-danger' :'btn btn-primary'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="me-2" style="width: 20px; height: 20px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                            </svg>
                            Like
                        </button>

                    </div>

                    <div class="mt-4 p-3 border rounded">
                        <span class="text-indigo-600 font-semibold">Host Info</span>
                        <div class="d-flex mt-3 bg-light p-2 rounded">
                            <span class="me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <div>
                                <span class="text-2xl">{{ $event->user->name }}</span>
                                <span class="text-2xl">{{ $event->user->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 p-4 bg-light rounded">
                <p class="mb-4 text-muted">
                    Start: <time>{{ $event->start_time }}</time>
                </p>
                <p>
                    @foreach ($event->tags as $tag)
                        <span class="badge bg-primary p-2 me-2">{{ $tag->name }}</span>
                    @endforeach
                </p>
                <p class="mt-4 text-muted">
                    {{ $event->description }}
                </p>
                <div class="text-end">
                    <div class="d-flex flex-column">
                        <div class="mb-4 d-flex align-items-center text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="me-2 text-primary" style="width: 24px; height: 24px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <div class="text-primary">{{ $event->country->name }}, {{ $event->city->name }}</div>
                        </div>
                        <div class="text-primary">
                            {{ $event->address }}
                        </div>
                    </div>
                </div>
             </div>
             <div class="container-fluid d-flex flex-column align-items-center mt-4 bg-light p-4 rounded">
                <div class="w-100 mb-4">
                    <form action="{{ route('events.comments', $event->id) }}" class="d-flex gap-2" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="content" id="content" placeholder="Comment">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
                <div class="w-100">
                    <div class="row">
                        @foreach ($event->comments()->latest()->get() as $comment)
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center rounded bg-white p-3 shadow-sm">
                                    <div>
                                        <div class="d-flex gap-2 align-items-center mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <h2 class="h6 fw-bold text-dark mb-0">{{ $comment->user->name }}</h2>
                                        </div>
                                        <p class="small text-muted mb-0">{{ $comment->content }}</p>
                                        @can('view', $comment)
                                            <form action="{{ route('events.comments.destroy', [$event->id, $comment->id]) }}" method="POST" class="mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</x-app-layout>
