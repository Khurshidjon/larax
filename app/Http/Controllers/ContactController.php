<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Jobs\ProcessPodcast;
use App\Mail\SendToContact;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        $mail = $request->all();
        $request->validate([
            'subscribers'=>'email|required|unique:subscribers'
        ]);
        $email = new Subscriber;
        $email->subscribers = $request->subscribers;
        $email->save();
        $notification = array(
                'message' => 'Siz muvofaqqiyatli obunani amalga oshirdingiz!',
                'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $contact = $request->all();
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:255',
            'subject'=>'string|required',
            'body'=>'required',
        ]);
        $post = new Contact;
        $post->name = $request->name;
        $post->email = $request->email;
        $post->subject = $request->subject;
        $post->body = $request->body;
        $post->save();
        ProcessPodcast::dispatch($post)->delay(now()->addMinutes(10));
        $email = $contact['email'];
        Mail::to($email)->send(new SendToContact($post));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
