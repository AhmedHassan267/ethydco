<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Role;
use App\Models\RoleSpecific;
use App\Models\UserAnswer;
use App\Models\UserCuStatus;
use App\Models\UserTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestsController extends Controller
{
    public function test()
    {
        $roles = Role::Paginate(5);
        $allRoles = Role::get();
        return view('tests.test', [
            'roles' => $roles,
            'allRoles' => $allRoles
        ]);
    }
    public function searchRole(Request $request)
    {
        $search = $request->post('role');
        $allRoles = Role::get();
        $roles = Role::where('id', $search)->paginate();
        return view('tests.test', [
            'roles' => $roles,
            'allRoles' => $allRoles
        ]);
    }

    public function levels($id)
    {
        $role = Role::find($id);
        return view('tests.levels', [
            'role' => $role
        ]);
    }
    public function levelQuestions($id, Request $request)
    {
        $role = Role::find($id);
        $role_specific_id = $request->input('role_specific_id') ?? Session::get('r_s_i');

        $level = $request->input('level') ?? Session::get('level');
        $questions = Question::where('level', $level)
            ->where('role_specific_id', $role_specific_id)
            ->where('role_id', $id)->get();

        return view('tests.levelQuestions', [
            'role' => $role,
            'level' => $level,
            'role_specific' => RoleSpecific::find($role_specific_id),
            'questions' => $questions
        ]);
    }

    public function levelAddQuestion(Request $request, $id)
    {
        $role = Role::find($id);
        $level = $request->input('level');
        $role_specific = RoleSpecific::find($request->input('role_specific_id'));
        return view('tests.addQuestion', [
            'role' => $role,
            'level' => $level,
            'role_specific' => $role_specific
        ]);
    }
    public function levelQuestionEdit(Request $request, $id)
    {
        $question = Question::find($id);
        $level = $request->input('level');
        return view('tests.editQuestion', ['question' => $question, 'level' => $level]);
    }

    public function levelQuestionUpdate(Request $request, $id)
    {
        $level = $request->input('level');
        $question = Question::find($id);
        $question->text = $request->post('question');
        $question->save();

        $answers = Answer::where('question_id', $id)->get();

        foreach ($answers as $answer) {
            $answer->delete();
        }

        $answer1 = new Answer();
        $answer1->question_id = $question->id;
        $answer1->answer_text = $request->post('answer1');
        if ($request->post('rightAnswer') == 1) {
            $answer1->right_answer = '1';
            $question->right_answer = '1';
        }

        $answer1->save();

        $answer2 = new Answer();
        $answer2->question_id = $question->id;
        $answer2->answer_text = $request->post('answer2');
        if ($request->post('rightAnswer') == 2) {
            $answer2->right_answer = '1';
            $question->right_answer = '2';
        }
        $answer2->save();

        $answer3 = new Answer();
        $answer3->question_id = $question->id;
        $answer3->answer_text = $request->post('answer3');
        if ($request->post('rightAnswer') == 3) {
            $answer3->right_answer = '1';
            $question->right_answer = '3';
        }
        $answer3->save();

        $answer4 = new Answer();
        $answer4->question_id = $question->id;
        $answer4->answer_text = $request->post('answer4');
        if ($request->post('rightAnswer') == 4) {
            $answer4->right_answer = '1';
            $question->right_answer = '4';
        }
        $question->save();
        $answer4->save();

        Session::put('r_s_i', $request->input('role_specific_id'));
        Session::put('level', $request->input('level'));
        return redirect(route('test.level.questions', $question->role->id));
    }

    public function levelQuestionDelete(Request $request, $id)
    {

        $question = Question::find($id);
        $level = $request->input('level');

        $role = Role::find($question->role_id);
        $questions = Question::where('level', $level)->where('role_id', $question->role_id)->get();

        $question->delete();
        return redirect(route('test.level.questions', $question->role_id, [
            'role' => $role,
            'questions' => $questions
        ]));
    }

    public function saveLevelNewQuestion(Request $request, $id)
    {
        $question = new Question();
        $question->role_id = $id;
        $question->role_specific_id = $request->input('role_specific_id');
        $level = $request->input('level');
        $question->level = $level;
        $question->text = $request->post('question');
        $question->save();

        $answer1 = new Answer();
        $answer1->question_id = $question->id;
        $answer1->answer_text = $request->post('answer1');
        if ($request->post('rightAnswer') == 1) {
            $answer1->right_answer = '1';
            $question->right_answer = '1';
        }

        $answer1->save();

        $answer2 = new Answer();
        $answer2->question_id = $question->id;
        $answer2->answer_text = $request->post('answer2');
        if ($request->post('rightAnswer') == 2) {
            $answer2->right_answer = '1';
            $question->right_answer = '2';
        }

        $answer2->save();

        $answer3 = new Answer();
        $answer3->question_id = $question->id;
        $answer3->answer_text = $request->post('answer3');
        if ($request->post('rightAnswer') == 3) {
            $answer3->right_answer = '1';
            $question->right_answer = '3';
        }
        $answer3->save();

        $answer4 = new Answer();
        $answer4->question_id = $question->id;
        $answer4->answer_text = $request->post('answer4');
        if ($request->post('rightAnswer') == 4) {
            $answer4->right_answer = '1';
            $question->right_answer = '4';
        }
        $answer4->save();
        $question->save();

        Session::put('r_s_i', $request->input('role_specific_id'));
        Session::put('level', $request->input('level'));
        return redirect(route('test.level.questions', $id));
    }



    public function userTestRoleSpecific($id)
    {
        $role = Role::find($id);
        $roleSpecifics = RoleSpecific::where('role_id', auth()->user()->role_id)->paginate(10);
        $user_cu_status = UserCuStatus::where('user_id', Auth::user()->id)
            ->where('role_id', auth()->user()->role_id)
            ->get();
        return view('tests.user-role-specific', [
            'role' => $role,
            'roleSpecifics' => $roleSpecifics,
            'user_cu_status' => $user_cu_status
        ]);
    }
    public function userTestRoleSpecificLevels(Request $request)
    {
        $zero = $request->input('zero');
        $progress = $request->input('progress');
        $role = Role::find(Auth::user()->role_id);
        $role_specific = RoleSpecific::find($request->input('role_specific_id') ?? Session::get('r_s_i'));

        if($progress != null)
        {
            return view('tests.user-chart',
            [
                'user' => auth()->user(),
                'role' => $role,
                'role_specific' => $role_specific
            ]);
        }






        if ($zero == null) {
            if(UserCuStatus::select("*")
            ->where('role_specific_id',$role_specific->id)
            ->where('user_id',auth()->id())
            ->where('role_id',auth()->user()->role_id)->doesntExist())
            {
                $user_cu_status = new UserCuStatus();
                $user_cu_status->user_id = auth()->id();
                $user_cu_status->role_id = auth()->user()->role_id;
                $user_cu_status->role_specific_id = $role_specific->id;
                $user_cu_status->status = '1';
                $user_cu_status->save();
            }
            else
            {
                $user_cu_status =  UserCuStatus::where('role_specific_id',$role_specific->id)
                ->where('user_id',auth()->id())
                ->where('role_id',auth()->user()->role_id)->first();
                $user_cu_status->status = '1';
                $user_cu_status->save();
            }
            return view('tests.userLevels', [
                'role' => $role,
                'role_specific' => $role_specific
            ]);
        } else {
            if(UserCuStatus::select("*")
            ->where('role_specific_id',$role_specific->id)
            ->where('user_id',auth()->id())
            ->where('role_id',auth()->user()->role_id)->doesntExist())
            {
                $user_cu_status = new UserCuStatus();
                $user_cu_status->user_id = auth()->id();
                $user_cu_status->role_id = auth()->user()->role_id;
                $user_cu_status->role_specific_id = $role_specific->id;
                $user_cu_status->status = '3';
                $user_cu_status->save();
            }
            else
            {
                $user_cu_status =  UserCuStatus::where('role_specific_id',$role_specific->id)
                ->where('user_id',auth()->id())
                ->where('role_id',auth()->user()->role_id)->first();
                $user_cu_status->status = '3';
                $user_cu_status->save();
            }
            return redirect()->back();
        }
    }
    public function userLevelQuestions(Request $request)
    {
        $role = Role::find(Auth::user()->role_id);
        $level = $request->input('level');
        $questions = Question::where('role_id', Auth::user()->role_id)->where('role_specific_id', $request->input('role_specific_id'))->where('level', $level)->get();
        return view('tests.userLevelQuestions', [
            'role' => $role,
            'level' => $level,
            'questions' => $questions,
            'role_specific' => RoleSpecific::find($request->input('role_specific_id'))
        ]);
    }


    public function userLevelSaveTest(Request $request)
    {
        $level = $request->input('level');

        $role_specific_id = $request->input('role_specific_id');
        $questions = Question::where('role_id', Auth::user()->role_id)
            ->where('role_specific_id', $role_specific_id)->where('level', $level)->get();
        $i = 0;
        $right_ans = 0;

        $oldUserAnswers = UserAnswer::where('user_id', Auth::user()->id)->where('level', $level)->get();
        $oldUserTests = UserTest::where('user_id', Auth::user()->id)->where('level', $level)->get();

        foreach ($oldUserAnswers as $oldUserAnswer) {
            $oldUserAnswer->delete();
        }
        foreach ($oldUserTests as $oldUserTest) {
            $oldUserTest->delete();
        }

        foreach ($questions as $question) {
            $user_answer = new UserAnswer();
            $user_answer->user_id = Auth::user()->id;
            $user_answer->question_id = $request->input('question_id')[$i];
            $user_answer->answer = $request->input('rightAnswer')[$i];
            $user_answer->level = $level;
            $user_answer->right_answer = $question->right_answer;
            $user_answer->save();
            if ($user_answer->answer == $user_answer->right_answer) {
                $right_ans = $right_ans + 1;
            }
            $i = $i + 1;
        }
        $user_test = new UserTest();
        $user_test->user_id = Auth::user()->id;
        $user_test->role_id = Auth::user()->role_id;
        $user_test->level = $level;
        $user_test->mark = $right_ans;
        $user_test->full_mark = $i;
        $user_test->go_next = 1;
        $user_test->role_specific_id = $request->input('role_specific_id');
        $user_test->save();
        $role_specific = RoleSpecific::find($request->input('role_specific_id'));

        Session::put('r_s_i', $request->input('role_specific_id'));
        Session::put('level', $request->input('level'));

        return redirect(route('user.role.specific.levels', Auth::user()->role_id, [
            'role_specific' => $role_specific,
            'role' => Role::find(Auth::user()->role_id)
        ]));
    }

    public function testRoleSpecific($id)
    {
        $role = Role::find($id);
        $roleSpecifics = RoleSpecific::where('role_id', $id)->paginate(10);
        return view('tests.role-specific', [
            'role' => $role,
            'roleSpecifics' => $roleSpecifics
        ]);
    }
    public function testRoleSpecificLevels($id, Request $request)
    {
        $role = Role::find($id);
        $roleSpecificId = $request->input('role_specific_id');
        $roleSpecific = RoleSpecific::where('role_id', $id)->where('id', $roleSpecificId)->first();
        return view('tests.role-specific-levels', [
            'role' => $role,
            'roleSpecific' => $roleSpecific
        ]);
    }
}
