<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Groups;
use App\GroupRelation;
use App\User;
use App\Invitation;
use App\Score;
use App\Mail\RegisterGroupToken;
use Auth;
use Image;

class ScoresController extends Controller
{

    public function getList(){
        $scores = Score::paginate(15);
        return view('admin.scores.list', compact('scores'));
    }

    public function create()
    {
        return view('admin.scores.create');
    }

    public function store(Request $request)
    {
        $score = new Score();
            $score->name = strip_tags($request->input('name'));
            $score->score = strip_tags($request->input('score'));
            $score->save();

        return redirect('/admin/scores');
    }

    public function show(Score $score)
    {
        return view('admin.scores.show', compact('score'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        $score->score = strip_tags($request->input('score'));
        $score->save();

        return redirect('/admin/scores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        $score->delete();
        return "success";
    }
}
