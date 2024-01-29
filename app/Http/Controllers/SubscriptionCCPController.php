<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionCCP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SubscriptionCCPController extends Controller
{
    public function allCCPSubscription()
    {
        $CCPSubscriptions = SubscriptionCCP::all();

        return view('website.admin.subscriptionCCP.allSubscriptionCCP', compact('CCPSubscriptions'));
    }

    public function uploadCCPimag(Request $request)
    {
        // Validate the form input
        $request->validate([
            'ccp_img' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $student = Auth::guard('web')->user();

        $file_extention = $request->ccp_img->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extention;
        $path = 'images/ccp';

        $request->ccp_img->move($path, $file_name);

        SubscriptionCCP::create([
            'student_id' => $student->id,
            'img' => $file_name,
        ]);

        return redirect()->back()->with('success', trans('website/messages.the CCP image was uploaded waite the admin approve it'));
    }

    public function deleteCCPSubscription(Request $request)
    {
        $ccp_subscription = SubscriptionCCP::find($request->ccp_subscription_id);

        File::delete('images/ccp/' . $ccp_subscription->img);
        $ccp_subscription->delete();

        return redirect()->back()->with('warning', trans('website/messages.Your have delete CCP Subscription'));
    }
}
