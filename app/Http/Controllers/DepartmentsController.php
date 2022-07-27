<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Role;
use App\Models\RoleSpecific;
use App\Models\TestingData;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{

    public function profile()
    {
       /*  $testData = TestingData::get();
        foreach ($testData as $data) {
                $role_specific_id = RoleSpecific::where('name',$data->competencyTitle)->pluck('id')->first();
                if($data->level1 != null)
                {
                    $question = new Question();
                    $question->role_id = '1';
                    $question->role_specific_id = $role_specific_id;
                    $question->text = $data->level1;
                    $question->level = '1';
                    $question->right_answer = '1';
                    $question->save();

                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'right';
                    $answer->right_answer = '1';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();

                }
                if($data->level2 != null)
                {
                    $question = new Question();
                    $question->role_id = '1';
                    $question->role_specific_id = $role_specific_id;
                    $question->text = $data->level2;
                    $question->level = '2';
                    $question->right_answer = '1';
                    $question->save();

                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'right';
                    $answer->right_answer = '1';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();

                }
                if($data->level3 != null)
                {
                    $question = new Question();
                    $question->role_id = '1';
                    $question->role_specific_id = $role_specific_id;
                    $question->text = $data->level3;
                    $question->level = '3';
                    $question->right_answer = '1';
                    $question->save();

                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'right';
                    $answer->right_answer = '1';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();

                }
                if($data->level4 != null)
                {
                    $question = new Question();
                    $question->role_id = '1';
                    $question->role_specific_id = $role_specific_id;
                    $question->text = $data->level4;
                    $question->level = '4';
                    $question->right_answer = '1';
                    $question->save();

                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'right';
                    $answer->right_answer = '1';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();

                }
                if($data->level5 != null)
                {
                    $question = new Question();
                    $question->role_id = '1';
                    $question->role_specific_id = $role_specific_id;
                    $question->text = $data->level5;
                    $question->level = '5';
                    $question->right_answer = '1';
                    $question->save();

                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'right';
                    $answer->right_answer = '1';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = 'wrong';
                    $answer->right_answer = '0';
                    $answer->save();

                } */
                /* $r = new RoleSpecific();
                $r->role_id = 1;
                $r->name = $data->competencyTitle;
                $r->des = $data->generalDescription;
                $r->state = 0;
                $r->save(); */
            /* $data->competencyTitle = 'AmineSystem (TA) ';
            $data->save(); */
            /* if($data->generalDescription != null)
            {
                $saver = $data->generalDescription;
            }
            else
            {
                $data->generalDescription = $saver;
                $data->save();
            }
             $stringOperations = $data->level4;
            $stringOperations = str_replace('?? ','',$stringOperations);
            $data->level4 = $stringOperations;
            $data->save(); */
        //}
        $roles = Role::Paginate();
        return view ('departments',[
            'roles' => $roles
        ]);
    }
}
