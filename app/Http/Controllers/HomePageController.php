<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
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

    public function home()
    {
        $home_page = view('home_page.home');
        return view('home_page.home_page_master')
                    ->with('homa_page_main_content', $home_page);
    }

    public function founderMember(){

        $founder_member = view('home_page.founder_member');
        return view('home_page.home_page_master')
                    ->with('homa_page_main_content',$founder_member);
    }

    public function gallery(){

        $gallery = view('home_page.gallery');
        return view('home_page.home_page_master')
                    ->with('homa_page_main_content',$gallery);
    }

    public function registration(){

        $registration = view('home_page.registration');
        return view('home_page.home_page_master')
                    ->with('homa_page_main_content',$registration);
    }

    public function noticeBoard(){

        $notice_board = view('home_page.notice_board');
        return view('home_page.home_page_master')
                    ->with('homa_page_main_content',$notice_board);
    }

    public function contactUs(){

        $contact_us = view('home_page.contact_us');
        return view('home_page.home_page_master')
                    ->with('homa_page_main_content',$contact_us);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
