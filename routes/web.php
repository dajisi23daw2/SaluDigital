<?php

use App\Http\Controllers\MedicacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\VacunasController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MensajeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Home
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', CheckRole::class . ':user'])->name('home');

//Mensajes
Route::get('/recibir_mensaje', [MensajeController::class, 'recibirMensajes'])->name('recibir_mensaje');
Route::post('/enviar_mensaje', [MensajeController::class, 'enviarMensaje'])->name('enviar_mensaje');
Route::get('/enviar_mensaje', function () {
    return view('enviar_mensaje');
})->middleware('auth')->name('enviar_mensaje');
Route::get('/enviar_mensaje/ver_mensajes', [MensajeController::class, 'verMensajes'])->name('ver_mensajes');
Route::delete('/eliminar_mensaje/{id}', [MensajeController::class, 'eliminarMensaje'])->name('eliminar_mensaje');
Route::post('/marcar_como_leido/{id}', [MensajeController::class, 'marcarComoLeido'])->name('marcar_como_leido');
Route::delete('/marcar_como_leido/{id}', [MensajeController::class, 'marcarComoLeido'])->name('marcar_como_leido');

// Autenticación
Route::get('/login', function () {
    return view('login');
})->middleware(['guest'])->name('login.form');
Route::get('/register', function () {
    return view('register');
})->middleware(['guest'])->name('register.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');

// Panel de control
Route::get('/panel_control', function () {
    return view('panel_control');
})->middleware(['auth', CheckRole::class . ':medico'])->name('panel_control');

// Citas
Route::get('/citas', function () {
    return view('citas');
})->middleware(['auth', CheckRole::class . ':user'])->name('citas');

Route::get('/citas/solicitud_citas', [CitaController::class, 'create'])->middleware(['auth', CheckRole::class . ':user'])->name('solicitud_citas');
Route::post('/citas', [CitaController::class, 'store'])->middleware(['auth', CheckRole::class . ':user'])->name('citas.store');
Route::delete('/citas/solicitud_citas', [CitaController::class, 'destroy'])->middleware(['auth', CheckRole::class . ':user'])->name('citas.destroy');
Route::get('/agenda', [CitaController::class, 'agenda'])->middleware(['auth', CheckRole::class . ':user'])->name('agenda');
Route::get('/gestion_citas', [CitaController::class, 'gestionCitas'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_citas');
Route::get('/citas/{cita}/edit', [CitaController::class, 'edit'])->middleware(['auth', CheckRole::class . ':medico'])->name('citas.edit');
Route::delete('/gestion_citas/{id}', [CitaController::class, 'destroy2'])->middleware(['auth', CheckRole::class . ':medico'])->name('citas.destroy2');
Route::post('/citas/aprobar/{id}', [CitaController::class, 'aprobarCita'])->middleware(['auth', CheckRole::class . ':medico'])->name('citas.aprobar');
Route::delete('/citas/eliminar_cita/{id}', [CitaController::class, 'destroy2'])->middleware(['auth', CheckRole::class . ':medico'])->name('eliminar_cita');

// Vacunas
Route::post('/vacunas', [VacunasController::class, 'store'])->middleware(['auth', CheckRole::class . ':medico'])->name('vacunas.store');
Route::get('/vacunas', [VacunasController::class, 'index'])->middleware(['auth', CheckRole::class . ':user'])->name('vacunas');
Route::get('/vacunas/buscar', [VacunasController::class, 'buscar'])->name('vacunas.buscar');
Route::get('/gestion_vacunas/lista_vacunas', [VacunasController::class, 'listaVacunas'])->middleware(['auth', CheckRole::class . ':medico'])->name('lista_vacunas');
Route::delete('/eliminar_vacuna/{id}', [VacunasController::class, 'eliminarVacuna'])->middleware(['auth', CheckRole::class . ':medico'])->name('eliminar_vacuna');
Route::get('/gestion_vacunas/lista_vacunas/editar_vacunas/{id}/editar',  [VacunasController::class, 'edit'])->middleware(['auth', CheckRole::class . ':medico'])->name('editar_vacunas');
Route::put('/gestion_vacunas/lista_vacunas/editar_vacunas/{id}', [VacunasController::class, 'update'])->middleware(['auth', CheckRole::class . ':medico'])->name('vacunas.update');
Route::get('/gestion_vacunas', [VacunasController::class, 'create'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_vacunas');
Route::post('/gestion_vacunas', [VacunasController::class, 'store'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_vacunas.store');

// Medicación
Route::get('/medicacion/detalles_medicacion/{id}', [MedicacionController::class, 'mostrarDetalles'])->name('detalles_medicacion');
Route::post('/medicacion', [MedicacionController::class, 'store'])->middleware(['auth', CheckRole::class . ':user'])->name('medicacion.store');
Route::get('/medicacion', [MedicacionController::class, 'index'])->middleware(['auth', CheckRole::class . ':user'])->name('medicacion');
Route::get('/gestion_medicacion/lista_medicacion/editar_medicacion/{id}/editar',  [MedicacionController::class, 'edit'])->middleware(['auth', CheckRole::class . ':medico'])->name('editar_medicacion');
Route::put('/gestion_medicacion/lista_medicacion/editar_medicacion/{id}', [MedicacionController::class, 'update'])->middleware(['auth', CheckRole::class . ':medico'])->name('medicacion.update');
Route::post('/gestion_medicacion/guardar', [MedicacionController::class, 'guardar'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_medicacion.guardar');
Route::get('/gestion_medicacion', [MedicacionController::class, 'create'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_medicacion');
Route::post('/gestion_medicacion', [MedicacionController::class, 'store'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_medicacion.store');
Route::get('/gestion_medicacion/lista_medicacion', [MedicacionController::class, 'listaMedicacion'])->middleware(['auth', CheckRole::class . ':medico'])->name('lista_medicacion');
Route::delete('/eliminar_medicacion/{id}', [MedicacionController::class, 'eliminarMedicacion'])->middleware(['auth', CheckRole::class . ':medico'])->name('eliminar_medicacion');

// Diagnósticos
Route::post('/diagnosticos', [DiagnosticoController::class, 'store'])->middleware(['auth', CheckRole::class . ':medico'])->name('diagnosticos.store');
Route::get('/gestion_diagnosticos/lista_diagnosticos/editar_diagnostico/{id}/editar',  [DiagnosticoController::class, 'edit'])->middleware(['auth', CheckRole::class . ':medico'])->name('editar_diagnostico');
Route::put('/gestion_diagnosticos/lista_diagnosticos/editar_diagnostico/{id}', [DiagnosticoController::class, 'update'])->middleware(['auth', CheckRole::class . ':medico'])->name('diagnosticos.update');
Route::post('/gestion_diagnosticos/guardar', [DiagnosticoController::class, 'guardar'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_diagnosticos.guardar');
Route::get('/gestion_diagnosticos', [DiagnosticoController::class, 'create'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_diagnosticos');
Route::post('/gestion_diagnosticos', [DiagnosticoController::class, 'store'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_diagnosticos.store');
Route::get('/gestion_diagnosticos/lista_diagnosticos', [DiagnosticoController::class, 'listaDiagnostico'])->middleware(['auth', CheckRole::class . ':medico'])->name('lista_diagnosticos');
Route::delete('/eliminar_diagnosticos/{id}', [DiagnosticoController::class, 'eliminarDiagnostico'])->middleware(['auth', CheckRole::class . ':medico'])->name('eliminar_diagnosticos');
Route::get('/diagnosticos', [DiagnosticoController::class, 'index'])->middleware(['auth', CheckRole::class . ':user'])->name('diagnosticos');

// Informes
Route::get('/gestion_informes/lista_informes/editar_informes/{id}/editar', [InformesController::class, 'edit'])->middleware(['auth', CheckRole::class . ':medico'])->name('editar_informes');
Route::put('/gestion_informes/lista_informes/editar_informes/{id}', [InformesController::class, 'update'])->middleware(['auth', CheckRole::class . ':medico'])->name('informes.update');
Route::get('/informes', [InformesController::class, 'index'])->middleware(['auth', CheckRole::class . ':user'])->name('informes');
Route::get('/gestion_informes', [InformesController::class, 'gestionInformes'])->middleware(['auth', CheckRole::class . ':medico'])->name('gestion_informes');
Route::post('/guardar_informe', [InformesController::class, 'guardarInforme'])->middleware(['auth', CheckRole::class . ':medico'])->name('guardar_informe');
Route::view('/informe_creado', 'informe_creado')->middleware(['auth', CheckRole::class . ':medico'])->name('informe_creado');
Route::get('/descargar_informe/{id}', [InformesController::class, 'descargarInforme'])->middleware(['auth', CheckRole::class . ':user'])->name('descargar_informe');
Route::get('/filtrar_informes', [InformesController::class, 'filtrarInformes'])->middleware(['auth', CheckRole::class . ':user'])->name('filtrar_informes');
Route::get('/gestion_informes/lista_informes', [InformesController::class, 'listaInformes'])->middleware(['auth', CheckRole::class . ':medico'])->name('lista_informes');
Route::delete('/eliminar_informe/{id}', [InformesController::class, 'eliminarInforme'])->middleware(['auth', CheckRole::class . ':medico'])->name('eliminar_informe');

// Configuración
Route::get('/cambiar_password', [ConfiguracionController::class, 'cambiarPassword'])->name('cambiar_password');
Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');
Route::post('/configuracion', [ConfiguracionController::class, 'cambiarPassword'])->name('configuracion.cambiar_password');
Route::post('/configuracion/cambiar_password', [ConfiguracionController::class, 'cambiarPassword'])->name('configuracion.cambiar_password');
Route::get('/configuracion', function () {
    return view('configuracion');
})->middleware('auth')->name('configuracion');
Route::post('/configuracion/cambiar_passwords', [ConfiguracionController::class, 'cambiarPassword'])->name('configuracion.cambiar_passwords');