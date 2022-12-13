<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InquiryRequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\InquiryMail;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('inquiry.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->session()->get('inquiry'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InquiryRequest $request)
    {   
        $validated = $request->validated();
        $request->session()->put('inquiry', $validated);
        return redirect(route('confirm'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showConfirm(Request $request)
    {
        $sessionData = $request->session()->get('inquiry');

        if(is_null($sessionData)) {
            return redirect(route('inquiry.index'));
        }
        
        //messageはメールの内容 
        $message = view('emails.inquiry', $sessionData);
        return view('confirm', ['message' => $message]);
    }

    public function postConfirm(Request $request)
    {
        $sessionData = $request->session()->get('inquiry');

        if(is_null($sessionData)) {
            return redirect(route('inquiry.index'));
        }

        $request->session()->forget('inquiry');

        Mail::to($sessionData['email'])
            ->send(new InquiryMail($sessionData));

        return redirect(route('sent'))->with('sent_inquiry', true);
    }

    public function showSentMessage(Request $request)
    {
        // dd($request);
        $request->session()->keep('sent_inquiry');
        $sessionData = $request->session()->get('sent_inquiry');

        if(is_null($sessionData)) {
            return redirect(route('inquiry.index'));
            // ->with(['message' => 'お問い合わせは正常に送信されました。','status' => 'info']);
        }

        return view('sent');
    }

}
