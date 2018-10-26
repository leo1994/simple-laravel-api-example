<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Contact;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\Message as MessageResource;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {   
        return response()->json(MessageResource::collection($contact->messages()->paginate()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MessageRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request, Contact $contact)
    {
        $message = $contact->messages()->create($request->all());
        
        return response()->json(new MessageResource($message), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact, Message $message)
    {
        return response()->json(new MessageResource($message), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MessageRequest  $request
     * @param  \App\Models\Contact  $contact
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, Contact $contact, Message $message)
    {
        $message->update($request->all());

        return response()->json(new MessageResource($message), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, Message $message)
    {
        $message->delete();

        return response()->json([], 204);
    }
}
