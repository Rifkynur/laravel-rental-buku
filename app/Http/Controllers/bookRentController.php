<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Rentlog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class bookRentController extends Controller
{
    public function index(){
        $users = User::where(['role_id'=>2,'status'=>'active'])->get();
        $books = Book::where('status','in stock')->get();
        return view ('books-rent',['users' => $users, 'books' => $books]);
    }

    public function store(Request $request){
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        
        // cari buku yang status in stock
        $book = Book::findOrFail($request->book_id)->only('status');
        if($book['status'] !== 'in stock'){
            Session::flash('message','Cannot Rent This Book');
            Session::flash('alert-class','alert-danger');
            return redirect('books-rent');
        }
        else{
            // cek apakah peminjam mengembalikan buku lebih dari 3 hari
            $count = Rentlog::where(['user_id' => $request->user_id, 'actual_return_date' => null])->count();

            if($count >= 3){
                Session::flash('message','Cannot Rent This Book, User has reach limit of book');
                Session::flash('alert-class','alert-danger');
                return redirect('books-rent');
            }
            // insert ke tabel rent log menggunakan transaction
            try{
                DB::beginTransaction();
                Rentlog::create($request->all());
                // update table book untuk menentukan stock buku
                $book = Book::findOrFail($request->book_id);
                $book->status = "unavailable";
                $book->save();
                DB::commit();
                Session::flash('message','Rent Book Success');
                Session::flash('alert-class','alert-success');
                return redirect('books-rent');
            }catch(Throwable $th){
                DB::rollBack();
                dd($th);
            }

        }
    }

    public function bookReturn(){
        $users = User::where(['role_id'=>2,'status'=>'active'])->get();
        $books = Book::where('status','unavailable')->get();
        return view ('books-return',['users' => $users, 'books' => $books]);
    }

    public function saveReturn(Request $request){
        $rent = Rentlog::where(['user_id'=>$request->user_id, 'book_id'=>$request->book_id, 'actual_return_date'=>null]);
        $rentData = $rent->first();
        $countRent = $rent->count();
        
        if($countRent == 1){
            // jika ada yang pinjam buku maka return book
            $book = Book::findOrFail($request->book_id);
            $book->status = "in stock";
            $book->save();
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();
                Session::flash('message','Book Return Succesfully');
                Session::flash('alert-class','alert-success');
                return redirect('books-return');
        }else{
            Session::flash('message','Error');
            Session::flash('alert-class','alert-danger');
            return redirect('books-return');
        }
    }
}
