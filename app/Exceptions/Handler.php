<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    //membuat pesan eror yang menampilkan pesan didalam file eror > index.blade
    public function render($request, Throwable $e)
    {
        if($e instanceof UnauthorizedException) {
            return response()->view('errors.index', ['exception'=>$e->getMessage(),
            'title' => 'Error 403'
        ],
        403);
        }
        return parent::render($request, $e);
    }
}
