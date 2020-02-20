<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{

    protected $fillable = [ 'texte', 'expediteur_id', 'destinataire_id'];

    
}
