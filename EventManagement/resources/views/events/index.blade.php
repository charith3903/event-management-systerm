<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end bg-dark text-white flex justify-between items-center">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('My Events') }}
        </h2>
        <div>
            <a href="{{ route('events.create') }}" class="text-white">New Event</a>
        </div>
    </div>

    <div class="py-12">
        <div class="container">
            <div class="table-responsive">
                <table class="table mx-auto table-lg"> <!-- Add 'table-lg' class to increase table size -->
                    <thead class="text-lg text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Country</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                            <tr class="bg-blue border-bottom dark:bg-gray-800 dark:border-gray-700">
                                <td class="font-medium py-4 px-6">{{ $event->title }}</td> <!-- Add 'py-4' class for vertical padding -->
                                <td class="py-4 px-6">{{ $event->start_date }}</td>
                                <td class="py-4 px-6">{{ $event->country->name }}</td>
                                <td class="py-4 px-6">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('events.edit', $event) }}" class="text-success">Edit</a>
                                        <form method="POST" action="{{ route('events.destroy', $event) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('events.destroy', $event) }}" class="text-danger"
                                               onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 dark:text-gray-400">No events found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
