    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SiswaController;

    Route::get('/aplikasisekolah', [SiswaController::class, 'index']);
    Route::get('/siswa/tambah', [SiswaController::class, 'tambah']);
    Route::post('/siswa/simpan', [SiswaController::class, 'simpan']);
    Route::get('/siswa/detail/{id}', [SiswaController::class, 'detail']);
    Route::get('/siswa/ubah/{id}', [SiswaController::class, 'ubah']);
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update']);
    Route::delete('/siswa/hapus/{id}', [SiswaController::class, 'hapus']);
    Route::get('/aplikasisekolah/search', [SiswaController::class, 'search']);
    

    Route::get('/', function () {
        return view('welcome');
    });

