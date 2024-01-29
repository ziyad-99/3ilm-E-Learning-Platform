<?php

namespace App\Http\Controllers;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Group;
use App\Models\Mark;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function quizCourseGroup(Request $request)
    {

        return view('website.instructor.quiz.courseGroups');
    }

    public function quizContainer(Request $request)
    {
        if ($request->courseType === 'supportingCourse') {
            $group = Group::find($request->group_id);
            $sessions = $group->sessions;

            return view('website.instructor.quiz.addQuizContainer', compact('group'));
        }

        if ($request->courseType === 'languagesCourse') {
            $group = Group::find($request->group_id);
            $sessions = $group->sessions;

            return view('website.instructor.quiz.addQuizContainer', compact('group'));
        }

        if ($request->courseType === 'intensiveCourse') {
            $group = Group::find($request->group_id);
            $sessions = $group->sessions;

            return view('website.instructor.quiz.addQuizContainer', compact('group'));
        }
    }

    public function addQuiz(Request $request)
    {
//        $session_id = $request->session_id;

        $session = Session::find($request->session_id);

        return view('website.instructor.quiz.addQuizMultiple', compact('session'));
    }

    public function storeQuiz(Request $request)
    {

        //Convert minutes to seconds then converted to hours
        $duration = Carbon::createFromTimestampUTC($request->duration * 60)->format('H:i:s');

        if ($request->quizType === 'Multiple') {
            // Store Quiz
            $quiz = Quiz::create([
                'session_id' => $request->session_id,
                'quizName' => $request->quizName,
                'quizType' => $request->quizType,
                'date' => now(),
                'duration' => $duration,
                'markPerQuestion' => $request->markPerQuestion,
                'status' => 'active',
            ]);

            // Store Question
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'question' => $request->question,
                'answer' => $request->answer,
                'answerA' => $request->answerA,
                'answerB' => $request->answerB,
                'answerC' => $request->answerC,
            ]);

            $numQuestions = count($request->except(['_token', 'session_id', 'quizName', 'quizType', 'markPerQuestion', 'duration', 'question', 'answer', 'answerA', 'answerB', 'answerC', 'questionTorF']));
            $numQuestions = $numQuestions / 5;

            for ($i = 2; $i < $numQuestions + 2; $i++) {

                $questionKey = "question{$i}";
                $answerAKey = "answerA{$i}";
                $answerBKey = "answerB{$i}";
                $answerCKey = "answerC{$i}";
                $answerKey = "answer{$i}";

                Question::create([
                    'quiz_id' => $quiz->id,
                    'question' => $request->$questionKey,
                    'answer' => $request->$answerKey,
                    'answerA' => $request->$answerAKey,
                    'answerB' => $request->$answerBKey,
                    'answerC' => $request->$answerCKey,
                ]);
            }

            $total_question = $quiz->questions->count();
            $quiz->totalQuestions = $total_question;
            $quiz->save();

            return redirect()->back()->with('message_add_new_quiz', trans('website/messages.You have add a new Multiple quiz on this session'));
        }

        if ($request->quizType === 'true/false') {
            // Store Quiz
            $quiz = Quiz::create([
                'session_id' => $request->session_id,
                'quizName' => $request->quizName,
                'quizType' => $request->quizType,
                'date' => now(),
                'duration' => $duration,
                'markPerQuestion' => $request->markPerQuestion,
                'status' => 'active',
            ]);

            // Store Question
            Question::create([
                'quiz_id' => $quiz->id,
                'question' => $request->questionTorF,
                'answer' => $request->answerTorF,
            ]);

            $numQuestions = count($request->except(['_token', 'session_id', 'quizName', 'quizType', 'markPerQuestion', 'duration', 'question', 'answerA', 'answerB', 'answerC', 'questionTorF', 'answerTorF']));
            $numQuestions = $numQuestions / 2;

            for ($i = 2; $i < $numQuestions + 2; $i++) {
                $questionKey = "questionTorF{$i}";
                $answerKey = "answerTorF{$i}";

                Question::create([
                    'quiz_id' => $quiz->id,
                    'question' => $request->$questionKey,
                    'answer' => $request->$answerKey,
                ]);
            }

            $total_question = $quiz->questions->count();
            $quiz->totalQuestions = $total_question;
            $quiz->save();

            return redirect()->back()->with('message_add_new_quiz', trans('website/messages.You have add a new True or False quiz on this session'));
        }
    }

    public function takeQuiz(Request $request)
    {
        $quiz = Quiz::find($request->quiz_id);

        return view('website.user.takeQuiz', compact('quiz'));
    }

    public function uploadQuiz(Request $request)
    {
        $quiz = Quiz::find($request->quiz_id);
        $questions = $quiz->questions;

        if ($quiz->quizType === 'true/false') {

            $mark = 0;
            foreach ($questions as $question) {
                $answerKey = "answer{$question->id}";
                if ($question->answer === $request->$answerKey) {
                    $mark++;
                }
            }

            Mark::create([
                'student_id' => Auth::guard('web')->id(),
                'quiz_id' => $request->quiz_id,
                'mark' => $mark * $quiz->markPerQuestion,
            ]);

            return redirect()->route('student.specificZoom', ['session_id' => $quiz->session_id])->with('message_quiz_done', trans('website/messages.return to the quiz tab to see you mark'));
        }

        if ($quiz->quizType === 'Multiple') {

            $mark = 0;
            foreach ($questions as $question) {
                $answerKey = "answer{$question->id}";
                if ($question->answer === $request->$answerKey) {
                    $mark++;
                }
            }

            Mark::create([
                'student_id' => Auth::guard('web')->id(),
                'quiz_id' => $request->quiz_id,
                'mark' => $mark * $quiz->markPerQuestion,
            ]);

            return redirect()->route('student.specificZoom', ['session_id' => $quiz->session_id])->with('message_quiz_done', trans('website/messages.return to the quiz tab to see you mark'));
        }
    }
}
