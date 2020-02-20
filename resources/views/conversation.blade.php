@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Conversation avec {{ $destinataire->name }}</div>

                <div class="conversation">
                    @foreach($messages as $message)
                        @if ($message->expediteur_id === $expediteur->id)
                        <div class="message right">
                        @else
                        <div class="message">
                        @endif
                            <div>{{ $message->texte }}</div>
                        </div>
                    @endforeach

                    <form action="{{ route('sendMessage')}}" method="POST">
                        @csrf
                        <input type="text" name="texte" placeholder="Entrez un message...">
                        <input type="hidden" name="destinataire_id" value="{{ $destinataire->id }}">
                        <input type="hidden" name="expediteur_id" value="{{ $expediteur->id }}">
                        <button class="btn btn-info" type="submit">Envoyer</button>
                    </form>
                    
                    <!-- Destinataire: {{ $destinataire->name }}
                    <br>
                    Expéditeur: {{ $expediteur->name }} -->
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
