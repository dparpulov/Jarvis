<?php

namespace App\Http\Controllers;

use App\Entity\ClickoutURL;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
//use duncan3dc\Forker\Fork; DELETE THIS FROM ARTISAN

class ClickoutURLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clickoutURLs = ClickoutURL::paginate(10);

        return view('urlFolder/url')->with('clickoutURLs', $clickoutURLs);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('urlFolder/urlNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clickoutURL = new ClickoutURL([
            'trackingLinkName' => $request->input('trackingLinkName'),
            'shortTrackingLink' => $request->input('shortTrackingLink'),
            'landingPage' => $request->input('landingPage'),
            'creationDate' => $request->input('clickmeterCreationDate'),
        ]);

        $clickoutURL->save();
        return redirect('urlFolder/url')->with('success', 'Successfuly added url');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\ClickoutURL  $clickoutURL
     * @return \Illuminate\Http\Response
     */
    public function show(ClickoutURL $url)
    {
        return view('urlFolder/urlShow')->with('clickoutURL', $url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\ClickoutURL  $clickoutURL
     * @return \Illuminate\Http\Response
     */
    public function edit(ClickoutURL $url)
    {   
        return view('urlFolder/urlEdit')->with('clickoutURL', $url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\ClickoutURL  $clickoutURL
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClickoutURL $url)
    {
        $url->trackingLinkName = $request->input('trackingLinkName');
        $url->shortTrackingLink = $request->input('shortTrackingLink');
        $url->landingPage = $request->input('landingPage');
        $url->clickmeterCreationDate = $request->input('clickmeterCreationDate');
        $url->save();

        return redirect('urlFolder/url')->with('success', 'ClickoutURL updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\ClickoutURL  $clickoutURL
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClickoutURL $url)
    {
        $url->delete();

        return redirect('urlFolder/url')->with('success', 'ClickoutURL deleted');
    }

    

    /* 
     * Deletes all rows from the Country table 
     */
    public function deleteAllURL(){
        \App\Entity\ClickoutURL::query()->delete();

        return redirect('urlFolder/url')->with('success', 'Clickout URL\'s deleted');

    }
    /*
    * Goes through all Landing page urls and
    * checks if they return a 200 code
    * NEEDS TO BE REWORKED BECAUSE IT IS REALLY SLOW
    */
    public function checkBrokenURL(){
        $shortLinks = ClickoutURL::all()->take(10);
        $brokenLinks = [];
        $workingLinks = [];

        //dd($shortLinks[0]->landingPage);

        for ($i = 0; $i < count($shortLinks); $i++) {
            $headers = @get_headers($shortLinks[$i]->landingPage);
            $headers = (is_array($headers)) ? implode( "\n ", $headers) : $headers;
            $works = (bool)preg_match("/200 OK/", $headers);
            
            if ($works){
                $workingLinks[] = $shortLinks[$i];
            } else {
                $brokenLinks[] = $shortLinks[$i];
            }
        }
        //dd($this->brokenLinks);

        return view('urlFolder/brokenURL')->with('workingLinks', $workingLinks)->with('brokenLinks', $brokenLinks);
    }

}
