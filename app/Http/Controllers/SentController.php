<?php

namespace App\Http\Controllers;

use App\Sent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SentController extends Controller
{

    public function index()
    {
        //
        $sentMails = auth()->user()->sent_emails;

        return view('dashboard.sent.index', ['sentMails'=> $sentMails]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $fromEmail = $request->get('fromEmail').env('vmail');
        $to = $request->get('to').env('vmail');
        $subject = $request->get('subject');
        $body = $request->get('body');


        Mail::raw($body, function ($message) use ($fromEmail, $to, $subject) {
            $message->from($fromEmail);
            $message->subject($subject);
            $message->to($to);
        });


        Sent::create([
            'to' => request('to'),
            'subject' => request('subject'),
            'body' => request('body'),
            'user_id'  => $user->id
        ]);

        return redirect('/dashboard/compose')->with('Email sent successfully');


    }


    public function show(Sent $sent, $id)
    {
        //
        $sent = Sent::findOrFail($id);

        return view('dashboard.sent.email', ['sent'=>$sent]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function edit(Sent $sent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sent $sent)
    {
        //
    }


    public function destroy(Sent $sent)
    {
        //
        $id = \request()->get('id');
        $sent = Sent::findOrFail($id);
        $sent->delete();

        return redirect('/dashboard/sent');
    }
}
