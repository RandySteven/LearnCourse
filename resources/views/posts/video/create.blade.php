<form action="{{ route('store.video') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
        <div class="text-danger">
            @error('title')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="">Video</label>
        <input type="file" name="video" class="form-control">
    </div>
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <button type="submit">Submit</button>
</form>
