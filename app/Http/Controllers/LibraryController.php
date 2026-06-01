<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        
        $featuredBooks = Book::where('is_featured', true)->latest()->take(4)->get();
        $books = Book::latest()->paginate(12);
        return view('library.index', compact('featuredBooks', 'books'));
    }

    public function category($category)
    {
        $books = Book::where('category', $category)->latest()->paginate(12);
        return view('library.index', compact('books'));
    }

    public function download(Book $book)
    {
        // Increment download counter
        $book->incrementDownloads();
        
        // Return file download response
        return response()->download(storage_path('app/public/' . $book->pdf_file), $book->title . '.pdf');
    }

    public function show(Book $book)
    {
        return view('library.show', compact('book'));
    }
    
    public function read(Book $book)
{
    // Check if PDF file exists in the database
    if (!$book->pdf_file) {
        abort(404, 'PDF file not associated with this book.');
    }

    // Build full storage path
    $filePath = storage_path('app/public/' . ltrim($book->pdf_file, '/'));

    // Check if file exists on disk
    if (!file_exists($filePath)) {
        abort(404, 'PDF file not found.');
    }

    // Return PDF inline (forces browser to open/read, not download)
    return response()->file($filePath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $book->slug . '.pdf"'
    ]);
}

    
}