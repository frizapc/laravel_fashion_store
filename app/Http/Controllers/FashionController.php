<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFashionRequest;
use App\Jobs\TestMail;
use App\Mail\MailFake;
use App\Mail\MailFashion;
use Illuminate\Http\Request;
use App\Models\Fashion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FashionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fashions = Fashion::select("id", "title", "content", "updated_at")
                        ->active()
                        ->get();
        
        return view('fashions.index', ["fashions" => $fashions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fashions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFashionRequest $request)
    {
        $fashion = Fashion::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        Mail::to('foryou@gmail.com')->queue(new MailFashion($fashion));

        session()->flash('message',"$request->title telah dibuat");

        return redirect('/fashions');        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $fashion = Fashion::find($id);
            $comments = $fashion->comments;
            $count = $fashion->total_comments();
            return view('fashions.show',[
                "fashion" => $fashion,
                "comments" => $comments,
                "count"=> $count
            ]);
        } catch(\Throwable $th) {
            abort(400, 'Bad Request 400 wkwkwk');
        }
    }

    public function trash()
    {
        $fashions = Fashion::onlyTrashed()->get();
        return view('fashions.trash',["fashions" => $fashions]);
    }
    public function undo(string $id)
    {
        try {
            $fashion = Fashion::onlyTrashed()->find($id);
            $fashion->restore();
            return redirect('/fashions');
        } catch (\Throwable $th) {
             abort(404, 'Page Not Found 404 Mampus');  
        }
    }
    public function remove(string $id)
    {
        try {
            $fashion = Fashion::onlyTrashed()->find($id);
            $fashion->forceDelete();
            return redirect('/fashions/trash');
        } catch (\Throwable $th) {
            abort(404, 'Page Not Found 404 wkwk');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fashion = Fashion::select("id", "title", "content", "updated_at")->find($id);
        return view('fashions.edit',["fashion" => $fashion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fashion = Fashion::find($id);
        $fashion->update([
            "title" => $request->title,
            "content" => $request->content,
        ]);
 
        return redirect("/fashions/$id");   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $fashion = Fashion::destroy($id);
            return redirect("/fashions");
        } catch (\Throwable $th) {
            abort(400, 'Bad Request 400 wkwkwk');
        }
    }
}
