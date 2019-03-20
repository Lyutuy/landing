<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;

use DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    //
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $messages = [
                'required' => "Поле :attribute обязательно к заполнению!",
                'email' => "Поле :attribute должно соответсвовать email"
            ];

            $this->validate($request, [
                'name'  => 'required|max:255',
                'email' => 'required|email',
                'text'  => 'required'
            ], $messages);

            $data = $request->all();

            /*$result = */Mail::send('site.email', ['data'=>$data], function($message) use ($data) {
                $mail_admin = env('MAIL_ADMIN');

                $message->from($data['email'], $data['name']);
                $message->to($mail_admin)->subject('Question');

            });

            /*f($result) {
                return redirect()->route('home')->with('status', 'Email is send');
            }*/

        }

    }

    public function show(Request $request)
    {

        /*if ($request->isMethod('get') && $request->isMethod('post')) {
        $name = $request;

        dd($name);
        }*/
        /*if ($request->isMethod('post')) {
            dd($request);
            $messages = [
                'required' => "Поле :attribute обязательно к заполнению!",
                'email' => "Поле :attribute должно соответсвовать email"
            ];

            $this->validate($request, [
               'name'  => 'required|max:255',
               'email' => 'required|email',
               'text'  => 'required'
            ], $messages);
            //dd($request);
        }*/
        //dd($request);
        $data = $request->all();


        $pages = Page::all();
        $portfolios = Portfolio::get(array('name', 'filter', 'images'));
        $services = Service::where('id', '<', 20)->get();
        $peoples = People::take(3)->get();

        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        $menu = array();
        foreach ($pages as $page) {
            $item = array('title' => $page->name, 'alias' => $page->alias);
            array_push($menu, $item);
        }

        $item = array('title' => 'Services', 'alias' => 'service');
        array_push($menu, $item);

        $item = array('title' => 'Portfolio', 'alias' => 'Portfolio');
        array_push($menu, $item);

        $item = array('title' => 'Team', 'alias' => 'team');
        array_push($menu, $item);

        $item = array('title' => 'Contact', 'alias' => 'contact');
        array_push($menu, $item);

        return view('site.index', array(
            'menu'       => $menu,
            'pages'      => $pages,
            'services'   => $services,
            'portfolios' => $portfolios,
            'peoples'    => $peoples,
            'tags'       => $tags
        ));
    }
}
