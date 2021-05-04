<?php
use App\Http\Controllers\MessagesController;
$class = $thread->isUnread(Auth::id()) ? 'alert-info' : '';

$sellername = MessagesController::sellerName($thread->participantsString($thread->creator()->id));
?>

<div class="media alert {{ $class }}">
    <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
</div>
<p>
    {{ $thread->latestMessage->body }}
</p>
<p>
    <small><strong>From:</strong> {{ $thread->creator()->name }}</small>
</p>
<p>
    <small><strong>To:</strong> {{ $sellername }}</small>
</p>
</div>
