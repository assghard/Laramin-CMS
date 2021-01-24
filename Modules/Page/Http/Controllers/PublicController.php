<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Page\Entities\Page;
use Modules\Page\Http\Requests\SendContactFormRequest;
use Illuminate\Support\Facades\Mail;
use Modules\Page\Mails\ContactRequestEmail;
use Modules\Dashboard\Entities\UserSubmission;
use Modules\Core\Entities\SystemErrorEntity;

class PublicController extends Controller
{
    public function homepage() 
    {
        $page = Page::findHomepage();

        return view('pages.homepage', compact('page'));
    }

    public function contact() 
    {
        return view('pages.contact');
    }

    public function sendContact(SendContactFormRequest $request) 
    {
        UserSubmission::create($request->only(['email', 'description']));

        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactRequestEmail($request->email, $request->description));
        } catch (\Throwable $th) {
            SystemErrorEntity::createEntity('Page, PublicController sendContact ERROR', [
                'message' => $th->getMessage()
            ]);
        }

        return redirect()->back()->withSuccess('Your request has been sent successfully');
    }

    public function subpage($slug) 
    {
        $page = Page::findSubpageBySlug($slug);
        if(empty($page)){
            abort(404);
        }

        return view('pages.subpage', compact('page'));
    }

}
