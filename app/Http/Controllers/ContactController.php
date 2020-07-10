<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(SendMessageRequest $request) {
    Mail::to('gcollin65@gmail.com')->send(
      new ContactMessage($request->validated())
    );

    return redirect()
      ->back()
      ->with('alert', 'Email sent successfully!');
  }
}
