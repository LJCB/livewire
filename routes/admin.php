<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Rutas generadas para funcionalidades de usuarios administradores
|
*/

/* Users Routes */

Route::middleware('auth')->prefix('admin')->name('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('.dashboard');
    /* Courses Routes */
    Route::prefix('courses')->name('.course')->group(function () {
        Route::view('/', 'admin.courses.index');
        Route::view('/create', 'admin.courses.create')->name('.create');
        Route::get('/show/{courseId}', function ($courseId) {
            return view('admin.courses.show')->with('courseId',  $courseId);
        })->name('.show');


        /* Classes Routes */
        Route::prefix('classes')->name('.classes')->group(function () {
            Route::get('/{courseId}', function ($courseId) {
                return view('admin.courses.classes.index')->with('courseId',  $courseId);
            });
            Route::get('/create/{courseId}', function ($courseId) {
                return view('admin.courses.classes.create')->with('courseId',  $courseId);
            })->name('.create');
            Route::get('/show/{classId}', function ($classId) {
                return view('admin.courses.classes.show')->with('classId',  $classId);
            })->name('.show');


            /* Activities Routes */
            Route::prefix('activities')->name('.activities')->group(function () {
                Route::get('/{classId}', function ($classId) {
                    return view('admin.courses.classes.activities.index')->with('classId',  $classId);
                });
                Route::get('/create/{classId}', function ($classId) {
                    return view('admin.courses.classes.activities.create')->with('classId',  $classId);
                })->name('.create');

                Route::get('/show/{activityId}', function ($activityId) {
                    return view('admin.courses.classes.activities.show')->with('activityId',  $activityId);
                })->name('.show');
            });

            /* Exams Routes */
            Route::prefix('exam')->name('.exam')->group(function () {

                Route::get('/create/{examId}', function ($examId) {
                    return view('admin.courses.classes.exam.create')->with('examId',  $examId);
                })->name('.create');

                Route::get('/show/{classId}', function ($classId) {
                    return view('admin.courses.classes.exam.show')->with('classId',  $classId);
                })->name('.show');

                /* Question Routes */
                Route::prefix('questions')->name('.questions')->group(function () {
                    Route::get('/create/{examId}', function ($examId) {
                        return view('admin.courses.classes.exam.questions.create')->with('examId',  $examId);
                    })->name('.create');

                    /* Answers Routes */
                    Route::prefix('answers')->name('.answers')->group(function () {
                        Route::get('/{questionId}', function ($questionId) {
                            return view('admin.courses.classes.exam.questions.answers.index')->with('questionId',  $questionId);
                        })->name('.index');

                        Route::get('/create/{questionId}', function ($questionId) {
                            return view('admin.courses.classes.exam.questions.answers.create')->with('questionId',  $questionId);
                        })->name('.create');

                        Route::get('/show/{answerId}', function ($answerId) {
                            return view('admin.courses.classes.exam.questions.answers.show')->with('answerId',  $answerId);
                        })->name('.show');
                    });
                });
            });

            /* Class materials Routes */
            Route::prefix('material')->name('.materials')->group(function () {
                Route::get('/{classId}', function ($classId) {
                    return view('admin.courses.classes.materials.index')->with('classId',  $classId);
                });
                Route::get('/create/{classId}', function ($classId) {
                    return view('admin.courses.classes.materials.create')->with('classId',  $classId);
                })->name('.create');

                Route::get('/show/{materialId}', function ($materialId) {
                    return view('admin.courses.classes.materials.show')->with('materialId',  $materialId);
                })->name('.show');
            });
        });
    });

    /* Tutors Routes */
    Route::prefix('tutors')->name('.tutors')->group(function () {
        Route::view('/', 'admin.tutors.index');
        Route::view('/create', 'admin.tutors.create')->name('.create');
        Route::get('/show/{tutorId}', function ($tutorId) {
            return view('admin.tutors.show')->with('tutorId',  $tutorId);
        })->name('.show');
    });
});
