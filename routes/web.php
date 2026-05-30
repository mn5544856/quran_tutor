<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HowItWorksController;
use App\Http\Controllers\FreeTrialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LibraryController;
use App\Models\Course;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| HOME ROUTES + LEGACY REDIRECTS
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/* Legacy /home redirects */
Route::permanentRedirect('/home', '/');
Route::permanentRedirect('/home/', '/');

/* Legacy /home/feed redirects */
Route::permanentRedirect('/home/feed', '/');
Route::permanentRedirect('/home/feed/', '/');

/* Catch-all for any /home/* or /home/feed/* URLs */
Route::get('/home/{any?}', function () {
    return redirect('/', 301);
})->where('any', '.*');

/*
|--------------------------------------------------------------------------
| About
|--------------------------------------------------------------------------
*/
// Route::redirect('/about-us', '/about', 301);
Route::get('about', function () {
    return view('home');
})->name('about');

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::redirect('/contact-us', '/contact', 301);

/*
|--------------------------------------------------------------------------
| Courses
|--------------------------------------------------------------------------
*/
Route::get('/courses/category/{slug}', [CourseController::class, 'byCategory'])->name('courses.category');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('/courses/{slug}', [CourseController::class, 'show'])
    ->where('slug', '[a-z0-9\-]+')
    ->name('courses.show');

/*
|--------------------------------------------------------------------------
| How It Works
|--------------------------------------------------------------------------
*/
Route::get('/how-it-works', [HowItWorksController::class, 'index'])->name('how-it-works.index');

/*
|--------------------------------------------------------------------------
| Free Trial
|--------------------------------------------------------------------------
*/
Route::get('/free-trial', [FreeTrialController::class, 'index'])->name('free-trial.index');
Route::post('/free-trial/book', [FreeTrialController::class, 'book'])->name('free-trial.book');

/*
|--------------------------------------------------------------------------
| Blog
|--------------------------------------------------------------------------
*/
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

/*
|--------------------------------------------------------------------------
| Library
|--------------------------------------------------------------------------
*/
Route::get('/library', [LibraryController::class, 'index'])->name('library.index');
Route::get('/library/category/{category}', [LibraryController::class, 'category'])->name('library.category');
Route::get('/library/{book}/download', [LibraryController::class, 'download'])->name('library.download');
Route::get('/library/{book}/read', [LibraryController::class, 'read'])->name('library.read');
Route::get('/library/{book}', [LibraryController::class, 'show'])->name('library.show');

/*
|--------------------------------------------------------------------------
| Sitemap
|--------------------------------------------------------------------------
*/
Route::get('/sitemap.xml', function () {

    $courses = Course::select('slug', 'updated_at')->get();

    return response()
        ->view('sitemap', compact('courses'))
        ->header('Content-Type', 'application/xml');
});
/*
|--------------------------------------------------------------------------
| Sitemap Generator (optional manual)
|--------------------------------------------------------------------------
*/
Route::get('/generate-sitemap', function () {

    $pages = [
        '/' => ['daily', '1.0'],
        '/courses' => ['daily', '0.9'],
        '/contact' => ['weekly', '0.6'],
        '/how-it-works' => ['weekly', '0.7'],
        '/free-trial' => ['weekly', '0.8'],
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($pages as $page => $data) {
        $xml .= '
    <url>
        <loc>' . url($page) . '</loc>
        <lastmod>' . now()->toDateString() . '</lastmod>
        <changefreq>' . $data[0] . '</changefreq>
        <priority>' . $data[1] . '</priority>
    </url>';
    }

    if (class_exists('App\Models\Course')) {
        $courses = Course::all();

        foreach ($courses as $course) {
            $xml .= '
    <url>
        <loc>' . url("/courses/{$course->slug}") . '</loc>
        <lastmod>' . now()->toDateString() . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>';
        }
    }

    $xml .= '
</urlset>';

    file_put_contents(public_path('sitemap.xml'), $xml);

    return 'Sitemap generated successfully!';
});

/*
|--------------------------------------------------------------------------
| SEO REDIRECTS (LEGACY URL CLEANUP)
|--------------------------------------------------------------------------
*/

/* Author + Category */
Route::permanentRedirect('/author/{slug}', '/');
Route::permanentRedirect('/category/{slug}', '/');

/* Static pages */
Route::permanentRedirect('/disclaimer', '/');
Route::permanentRedirect('/privacy-policy', '/');
Route::permanentRedirect('/enroll-now', '/');
Route::permanentRedirect('/terms-and-conditions', '/');

/* Search pages */
Route::permanentRedirect('/search', '/');

/* IMPORTANT: catch all nested search URLs */
Route::get('/search/{any?}', function () {
    return redirect('/', 301);
})->where('any', '.*');

/* Fallback (must stay LAST) */
Route::fallback(function () {
    abort(404);
});