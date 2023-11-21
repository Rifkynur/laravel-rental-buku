<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books',['books' => $books]);
    }

    public function add(){
        $categories = Category::all();
        return view('books-add',['categories' => $categories]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'book_code' => 'required|unique:books|max:100',
            'title' => 'required'
        ]);

        $fileName = '';
        if($request->file('image')){
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileName = $request->title.'-'.now()->timestamp.'.'.$extention;
            $request->file('image')->storeAs('cover',$fileName);
        }
        $request['cover'] = $fileName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status','Book adding Successfully');
    }

    public function edit($slug){
        $book = Book::where('slug',$slug)->first();
        $categories = Category::all();
        return view('books-edit',['book' => $book, 'categories' => $categories]);
    }

    public function update(Request $request,$slug){
        if($request->file('image')){
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileName = $request->title.'-'.now()->timestamp.'.'.$extention;
            $request->file('image')->storeAs('cover',$fileName);
            $request['cover'] = $fileName;
        }

        $book = Book::where('slug',$slug)->first();
        $book->update($request->all());

        if($request->categories){
            $book->categories()->sync($request->categories);
        }
        return redirect('books')->with('status','Book updated Successfully');
    }

    public function delete($slug){
        $book = Book::where('slug',$slug)->first();
        return view('books-delete',['book' => $book]);
    }

    public function destroy($slug){
        $book = Book::where('slug',$slug)->first();
        $book->delete();
        return redirect('books')->with('status','Book deleted Successfully');
    }

    public function deleted(){
        $deletedBooks = Book::onlyTrashed()->get();
        // dd($categories);
        return view('books-deleted-list',['deletedBooks'=>$deletedBooks]);
    }

    public function restore($slug){
        $book = Book::withTrashed()->where('slug',$slug)->first();
        // dd($category);
        $book->restore();
        return redirect('books')->with('status','books has been restored');
    }
}
