<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end bg-dark text-white flex justify-between items-center">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('New Gallery') }}
        </h2>
    </div>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data"
                        class="p-4 bg-blue dark:bg-slate-800 rounded-md">
                        @csrf
                        <div class="mb-3">
                            <label for="caption" class="form-label text-white">Caption</label>
                            <input type="text" id="caption" name="caption"
                                class="form-control" placeholder="Gallery title">
                            @error('caption')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white" for="file_input">Upload file</label>
                            <input class="form-control" id="file_input" type="file" name="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit"
                                class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
