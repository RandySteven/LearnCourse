@foreach ($comments as $comment)
<div class="display-comment ml-4">
    <strong>{{ $comment->user->name }}</strong>
    <p>{!! nl2br($comment->comment) !!}</p>
    <a href="#" onclick="hideFunction()">Reply</a>
    <form action="{{ route('answer.reply') }}" method="POST" id="reply">
        @csrf
        <div class="form-group">
            <input type="text" name="comment" class="form-control" placeholder="Reply answer to {{ $comment->user->name }}"/>
            <input type="hidden" name="forum_id" value="{{ $forum_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>
    @include('forum.comments.comment-form', ['comments', $comment->replies])
</div>
@endforeach
