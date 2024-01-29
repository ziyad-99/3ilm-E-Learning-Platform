<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TheHocineSaad\LaravelChargilyEPay\Epay_Webhook;
use TheHocineSaad\LaravelChargilyEPay\Models\Epay_Invoice;

class ChargilyController extends Controller
{
    public function subscription()
    {
        $student = Auth::guard('web')->user();
        $invoices = Epay_Invoice::where('student_id', $student->id)->where('paid', 1)->get();

        return view('website.user.subscribtion', compact('invoices'));
    }

    public function ePay(Request $request)
    {
        if ($request->amount >= 75) {
            $student = Auth::guard('web')->user();
            $configurations = [
                'student_id' => $student->id, // (optional) This is the user ID to be added as a foreign key, it's optional, if it's not provided its value will be NULL
                'mode' => $request->mode, // Payment method must be 'CIB' or 'EDAHABIA'
                'payment' => [
                    'client_name' => $student->firstName, // Client name
                    'client_email' => $student->email, // This is where client receives payment receipt after confirmation
                    'amount' => $request->amount, // Must be = or > than 75
                    'discount' => 0, // This is discount percentage, between 0 and 99
                    'description' => 'charge account', // This is the payment description
                ]
            ];

            $checkout_url = Epay_Invoice::make($configurations);
            return redirect($checkout_url);
        } else {
            return redirect()->back()->with('warning', trans('website/website.The amount is less than 75 DA'));
        }
    }

    public function backUrl()
    {
        $student = Auth::guard('web')->user();

        $invoice = Epay_Invoice::where('student_id', $student->id)
            ->orderBy('created_at', 'desc') // Assuming 'created_at' is the timestamp field
            ->first();

        if ($invoice->paid) {

            return view('website.user.payments.paymentsSuccess', compact('invoice'));
        } else {

            return view('website.user.payments.paymentsCancel', compact('invoice'));
        }
    }

    public function webhook()
    {
        $webhookHandler = new Epay_Webhook;
        $invoiceId = $webhookHandler->invoice['invoice_number'];

        if ($webhookHandler->invoiceIsPaied) {

            $invoice = Epay_Invoice::find($invoiceId);

            $invoice->paid = 1;
            $invoice->save();

            $student_id = $invoice->student_id;
            $invoiceAmount = $invoice->amount;

            $student = User::find($student_id);

            $student->balance = $student->balance + $invoiceAmount;
            $student->save();

        } else {
        }
    }

    public function paymentsSuccessfully(Request $request)
    {
        return view('website.user.payments.paymentsSuccess');
    }
}
