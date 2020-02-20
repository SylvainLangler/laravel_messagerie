<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Message;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Je récupère tous les utilisateurs sauf celui qui est connecté
        $users = User::where('id', '!=', Auth::id())->get();
        
        return view('home', [
            'users' => $users
        ]);
    }

    public function conversation(Request $request)
    {

        $destinataire = User::where('name',$request->input('destinataire'))->firstOrFail();
        $expediteur = Auth::user();
        $messages = Message::where([
            ['destinataire_id', $destinataire->id],
            ['expediteur_id', $expediteur->id]
        ])
        ->orWhere([
            ['destinataire_id', $expediteur->id],
            ['expediteur_id', $destinataire->id]
        ])
        ->orderBy('created_at')->get();

        return view('conversation', [
            'destinataire' => $destinataire,
            'expediteur' => $expediteur,
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'texte' => 'bail|required|max:255',
            'expediteur_id' => 'required|integer',
            'destinataire_id' => 'required|integer'
        ]);
        $message = Message::create($validatedData);
        return back();
    }
}
