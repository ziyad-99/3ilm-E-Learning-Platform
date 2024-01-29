<?php

namespace App\Http\Controllers;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Group;
use App\Models\Ressource;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RessourceController extends Controller
{
    public function resourcesContainer(Request $request)
    {
        if ($request->courseType === 'supportingCourse') {

            $group = Group::find($request->group_id);
//            $sessions = $group->sessions;

            return view('website.instructor.resource.resourcesContainer', compact('group'));
        }

        if ($request->courseType === 'languagesCourse') {

            $group = Group::find($request->group_id);
//            $sessions = $group->sessions;

            return view('website.instructor.resource.resourcesContainer', compact('group'));

        }

        if ($request->courseType === 'intensiveCourse') {

            $group = Group::find($request->group_id);
//            $sessions = $group->sessions;

            return view('website.instructor.resource.resourcesContainer', compact('group'));
        }
    }

    public function resource(Request $request)
    {
        $session = Session::where('id', $request->session_id)->first();

        return view('website.instructor.resource.resources', compact('session'));
    }

    public function storeResource(Request $request)
    {
        $file_extention = $request->file->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extention;
        $path = 'files';
        $request->file->move($path, $file_name);

        $resource = Ressource::create([
            'session_id' => $request->session_id,
            'filename' => $file_name,
            'date' => now(),
        ]);

        return redirect()->back()->with('message_resource_add', trans('website/messages.you have add a new resource on this session'));
    }


    public function resourceDelete(Request $request)
    {
        $ressource = Ressource::find($request->id);
        $ressource->delete();

        return redirect()->back()->with('message_resource_delete', trans('website/messages.you have delete a resource on this session'));
    }

    public function resourceDownload(Request $request)
    {
        return response()->download(public_path('files/' . $request->filename));
    }
}
