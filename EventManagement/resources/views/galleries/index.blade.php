<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end bg-dark text-white flex justify-between items-center">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('My Gallerise') }}
        </h2>
        <div>
            <a href="{{ route('galleries.create') }}" class="text-white">New Gallery</a>
        </div>
    </div>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Caption</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($galleries as $gallery)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $gallery->image) }}" class="img-thumbnail" style="width: 120px; height: 120px;">
                                        </td>
                                        <td>{{ $gallery->caption }}</td>
                                        <td>
                                            <div class="btn-group gap-2" role="group" aria-label="Gallery actions">
                                                <a href="{{ route('galleries.edit', $gallery) }}" class="text-success">Edit</a>
                                                <form method="POST" action="{{ route('galleries.destroy', $gallery) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"class="text-danger" onclick="return confirm('Are you sure you want to delete this gallery?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No Gallery found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
