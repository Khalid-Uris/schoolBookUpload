<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Stroage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.addBook');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name'=>'required',
            'description'=>'required',
            'file'=>'required'
        ]);

        try {
            $obj=new Book();

            $file=$request->file;
            $filename=time().' . '. $file->getClientOriginalExtension();

            $request->file->move('assets',$filename);
            $obj->file=$filename;

            $obj->book_name=$request->book_name;
            $obj->description=$request->description;
            $obj->save();

            return redirect()->route('book.show');
            //return redirect()->route('show');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $show=Book::all();
        return view('admin.book.showBook')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function view($id)
    {
         $view=Book::find($id);
         return view('admin.book.viewBook')->with('view',$view);
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=Book::find($id)->delete();
        return redirect()->route('book.show');
    }
}
