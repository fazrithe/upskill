<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserAnswerScore;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        $data_score = UserAnswerScore::with('user')->orderBy('total_score','DESC')->paginate(5);
        return view('pages/dashboard',compact('data_score'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
