<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCoverImage;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $task;
    public function __construct()
    {
        $this->task = new Book();
    }

    public function index()
    {
        $res['tasks'] = $this->task->all();
        return view('components.index')->with($res);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $data = $request->except('cover_image');

    // Create the book first
    $book = $this->task->create($data);

    // Check if file is uploaded
    if ($request->hasFile('cover_image')) {
        $file = $request->file('cover_image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/covers', $filename);

        // Save cover image in separate table
        $book->coverImage()->create([
            'image_path' => $filename
        ]);
    }

    return redirect()->route('index')->with('success', 'Book added!');
}

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //edit data

// Show edit form
public function edit($id)
{
    $task = Book::findOrFail($id);
    return view('components.edit', ['task' => $task]);
}

// Save updated data
public function update(Request $request, $id)
{
    $task = Book::findOrFail($id);
    $data = $request->except('cover_image');

    $task->update($data);

    // Update or create cover image
    if ($request->hasFile('cover_image')) {
        $file = $request->file('cover_image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/covers', $filename);

        if ($task->coverImage) {
            $task->coverImage->update([
                'image_path' => $filename
            ]);
        } else {
            $task->coverImage()->create([
                'image_path' => $filename
            ]);
        }
    }

    return redirect()->route('index')->with('success', 'Book updated!');
}


    /**
     * Remove the specified resource from storage.
     */
public function delete($id)
{
    $task = $this->task->find($id);

    // delete related cover image
    if ($task->coverImage) {
        $task->coverImage->delete();
    }

    $task->delete();
    return redirect()->back()->with('success', 'Book deleted!');
}

}
