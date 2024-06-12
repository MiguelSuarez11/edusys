<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AsignaturasController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DependentDropdownController;
use App\Http\Controllers\estudianteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\profesorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CursoProfesorController;
use App\Http\Controllers\FullCalenderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});






// Rutas de Control e Ingresos del sistema
Route::middleware('auth')->group(function () {
    // RUTA DE RECURSOS DE PERSONAL
    Route::resource('/personal', PersonalController::class);
    /////////////////////////////////////////////////////////////////////////


    // RUTA DE RECURSOS DE USUARIOS
    Route::resource('/usuarios', UserController::class);
    //////////////////////////////////////////////////////////////////


    //RUTA DE RECURSOS DE CURSOS
    Route::resource('/cursos', CursoController::class);
    //Ruta GET para Listar Cursos y retornar en un json
    Route::get('/Lista De Cursos', [CursoController::class, 'getCursos'])->name('cursoss.index');
    //Ruta GET para Listar Estudiantes y retornar en un json
    Route::get('/estudiantes/{cursoId}', [CursoController::class, 'getEstudiantes'])->name('estudiantes.index');
    ////////////////////////////////////////////////////////////////////////////


    //RUTA DE RECURSOS  ASIGNATURAS
    Route::resource('/asignaturas', AsignaturasController::class);
    //////////////////////////////////////////////////////////////////////////////////////


    //RUTA DE RECURSOS DE ASIGNACION DE ROLES
    Route::resource('/roles', RoleController::class);
    //////////////////////////////////////////////////////////////////////


    //RUTA DE RECURSOS CALIFICACIONES
    Route::resource('calificaciones', CalificacionesController::class);
    // Ruta GET para el Listado de calificaciones
    Route::get('/Listado De Calificaciones', [CalificacionesController::class, 'index_calificaciones'])->name('calificaciones.index_calificaciones');
    // Ruta GET para Ver Calificaciones de un estudiante
    Route::get('/Mis Calificaciones/{id}', [CalificacionesController::class, 'mostrarAsig'])->name('estudiantes.shows');
    ///////////////////////////////////////////////////////////////////////////////////


    // RUTA DE RECURSOS DE EVENTOS
    Route::resource('eventos', EventoController::class);


    Route::get('/administrador', [adminController::class, 'index'])->name('admin.dashboard');
    Route::get('/estudiante', [estudianteController::class, 'index'])->name('estudiante.dashboard');
    Route::get('/profesor', [profesorController::class, 'index'])->name('profesor.dashboard');
    Route::get('/dashboard', [adminController::class, 'index'])->name('dashboard');





    // ASIGNACION DE CURSOS
    Route::get('/curso-profesor', [CursoProfesorController::class, 'index'])->name('cursos.asignacion');
    Route::get('/curso-profesor/{user}/edit', [CursoProfesorController::class, 'edit'])->name('cursos.asignacionEdit');
    Route::put('/curso-profesor/{user}', [CursoProfesorController::class, 'update'])->name('cursos.asignacionUpdate');
    Route::get('/asignacion-curso', [CursoProfesorController::class, 'asignacionCurso'])->name('cursos.asignacionCurso');
});



//Rutas de Configuracion de Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas de profesores
Route::middleware('auth')->group(function () {
    // Route::get('/calificaciones', [CalificacionesController::class, 'index'])->name('calificacion.index');
    Route::get('/asistencia', [AsistenciaController::class, 'index'])->name('asistencia.index');
    Route::post('/asistencia', [AsistenciaController::class, 'store'])->middleware('auth');
    Route::post('/profesor/store', [CalificacionesController::class, 'store'])->name('profesor.store');
    Route::get('/estudiante', [CalificacionesController::class, 'mostrarAsig'])->name('estudent.index');


    Route::get('/profesor/estudiantes/{cursoId}', [CalificacionesController::class, 'getEstudiantes']);



    // Rutas de calificaciones

    Route::get('/profesor/estudiantes/{cursoId}', [CalificacionesController::class, 'getPersonalsByCurso']);
});





// Cursos y estudiantes


Route::get('/profesor/estudiantes/{curso}', [CalificacionesController::class, 'getEstudiantesByCurso'])->name('profesor.getEstudiantesByCurso');
Route::get('/estudiantess/{AsigId}', [CalificacionesController::class, 'getEstudiantesByAsig'])->name('estudent.getEstudiantesByAsig');


// Ruta para obtener la calificación del estudiante en una asignatura específica
Route::get('/asignaturas/{asigId}/estudiantes/{estudianteId}/calificacion', [CalificacionesController::class, 'getCalificacionEstudiante']);
//Ruta para assitencias



Route::middleware('auth')->group(function () {



    // RUTA DE CALENDARIOS
    Route::get('/courses', [FullCalenderController::class, 'index_cursos']);
    Route::get('/fullcalender', [FullCalenderController::class, 'index'])->name('calendario');
    Route::post('/fullcalenderAjax', [FullCalenderController::class, 'ajax']);
});




//COMPROBAR FUNCIONALIDAD
// Route::put('/calificaciones/{id}', [CalificacionesController::class, 'update'])->name('calificaciones.update');


require __DIR__ . '/auth.php';
