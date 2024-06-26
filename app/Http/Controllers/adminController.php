<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Asistencia;
use App\Models\Calificacion;
use App\Models\Curso;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Asignatura;
use App\Models\Evento;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Agregar middleware de autenticación
    }

    public function index()
    {
          $response = Http::get('https://frasedeldia.azurewebsites.net/api/phrase');
           $data = $response->json();
        $personalR = Personal::where('estado', 1)->count();
        $users = User::where('estado', 1)->count();
        $cursos = Curso::where('estado', 1)->count();
        $calificacione = Calificacion::where('estado', 1)->count();
        $asistencia = Asistencia::where('estado', 1)->count();
        $eventos = Evento::all()->count();
        $agenda = Agenda::all()->count();

        return view('admin.dashboard', compact('data', 'personalR', 'users', 'cursos', 'calificacione','eventos'));
         //return view('admin.dashboard', compact('agenda','eventos','personalR', 'users', 'cursos', 'calificacione' , 'asistencia'));
    }
}
