<p>Bonjour,</p>

<p>{{ $owner->name }} vous invite à rejoindre la colocation <strong>{{ $colocation->name }}</strong>.</p>

<p>
   <a href="{{ route('invitation.accept', $invitation->token) }}">Accepter</a>
<a href="{{ route('invitation.refuse', $invitation->token) }}">Refuser</a>
</p>
