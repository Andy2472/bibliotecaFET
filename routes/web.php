<?php

use App\Models\Book;
use App\Models\Category;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/desarrollador', function () {
    return view('developedBy');
});


Route::prefix('/student')->name('student.')->group(function () {
    Route::get('libros', function () {

        $categorias = Category::all();

        $libros = Book::paginate(10);

        return view('student.libros', compact('categorias', 'libros'));
    })->name('libros');

    Route::get('categorias/{categoria}', function ($categoria) {

        $categorias = Category::get();

        $categoriaEspecifica = Category::find($categoria);

        $libros = $categoriaEspecifica->book()->paginate(10);

        return view('student.librosPorCategoria', compact('categorias', 'categoriaEspecifica', 'libros', 'categoria'));
    })->name('categorias');
});

