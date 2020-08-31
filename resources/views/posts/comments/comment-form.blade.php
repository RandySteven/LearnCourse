@foreach ($comments as $comment)
<div class="display-comment ml-4">
    <div>
        <img src="{{ $comment->user->gravatar() }}" class="rounded-circle" height="30" width="30" alt="">
        <strong>{{ $comment->user->name }}</strong>
        <p>{!! nl2br($comment->comment) !!}</p>
    </div>
    <a href="#" onclick="hideFunction()">Reply</a>
    @if (auth()->user())
        <form action="{{ route('reply.store') }}" method="POST" id="reply">
            @csrf
            <div class="form-group">
                <input type="text" name="comment" class="form-control" placeholder="Reply comment to {{ $comment->user->name }}"/>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
            </div>
        </form>
    @endif
    @include('posts.comments.comment-form', ['comments' => $comment->replies])
</div>

<script>
    function hideFunction(){
        var x = document.getElementById("reply");
        if (x.style.display === "none"){
            x.style.display = "block";
        }else{
            x.style.display = "none";
        }
    }
</script>
@endforeach
