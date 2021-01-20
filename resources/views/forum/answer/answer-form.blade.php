@foreach ($answers as $answer)
<div class="display-comment ml-4">
    <strong>{{ $answer->user->name }}</strong>
    <p>{!! nl2br($answer->answer) !!}</p>
    <form action="{{ route('answer.reply') }}" method="POST" id="reply">
        @csrf
        <div class="form-group">
            <input type="text" name="answer" class="form-control" placeholder="Reply answer to {{ $answer->user->name }}"/>
            <input type="hidden" name="forum_id" value="{{ $forum_id }}" />
            <input type="hidden" name="answer_id" value="{{ $answer->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>
</div>
@endforeach
