<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\DonnerController;
use DB;
use Illuminate\Support\Facades\Auth;

class ProblemsComposer
{

    protected $problems;
    protected $allProblems;
    protected $currentUserProblems;
    protected $ratingUserNameObject;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(DonnerController $donnerController)
    {
        // Dependencies automatically resolved by service container...
        global $problems,$allProblems,$currentUserProblems, $ratingUserNameObject;
        $problems = $donnerController->getProblemsData();
        $allProblems = $donnerController->getAllProblems();
        $currentUserProblems = $donnerController->getCurrentUserProblems();
        $ratingUserNameObject = DB::table('problems')
            ->join('donate', 'problems.id', '=', 'donate.problemId')
            ->where('userId', Auth::user()->user_id)
            ->groupBy('donorId')
            ->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        global $problems, $allProblems, $currentUserProblems, $ratingUserNameObject;
        $view->with(['problems' => $problems, 'allProblems' => $allProblems, 'currentUserProblems' => $currentUserProblems,
        'ratingUserNameObject' => $ratingUserNameObject]);
    }
}