<?php

namespace App\Http\Controllers\LAdmin\QuestionUser;

use App\Http\Controllers\Controller;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class QuestionUserController extends Controller
{
    //

    public function newQuestion()
    {
        $questionUsers = UserQuestion::whereNull('answer')->get();
        return view('LocalAdmin.QuestionUser.newQuestion', compact('questionUsers'));
    }

    public function createAnswer($id)
    {
        $questionUserID = $id;
        return view('LocalAdmin.QuestionUser.createAnswer', compact('questionUserID'));
    }

    public function storeAnswer(Request $request)
    {

        $questionUserID = $request->input('questionUserID');
        $questionUser = UserQuestion::findOrfail($questionUserID);
        $questionUser->update([
            'answer' => $request->input('answer'),
            'answerBy' => Auth::guard('ladmin')->user()->id,
        ]);

        return redirect()->route('ladmin.questionAnswer.history.question')->with('success_message', 'Question Answered Successfully');
    }

    public function historyQuestion()
    {
        $questionUsers = UserQuestion::whereNotNull('answer')->get();
        return view('LocalAdmin.QuestionUser.historyQuestion', compact('questionUsers'));
    }
}
