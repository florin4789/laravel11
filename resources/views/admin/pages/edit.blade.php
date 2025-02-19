
    <div class="container">
        <h2>Edit Page: {{ ucfirst($page->title) }}</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pages.update', $page) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea id="editor" name="content" class="form-control">{{ old('content', $page->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Image</label>
                @if($page->image)
                    <img src="{{ asset($page->image) }}" class="img-fluid" alt="Page Image">
                @else
                    <p>No image uploaded.</p>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Upload New Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Page</button>
        </form>
    </div>

    {{-- Include text editor script --}}
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>

