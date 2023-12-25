<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreTestRequest;
//use App\Http\Requests\UpdateTestRequest;
use App\Models\ContactInfo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
//        return view( 'test.index');
        return view('test.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view( 'test.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestRequest  $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $test_id = Test::insertGetId([
            'body'=>$data['body'],
            'name'=>$data['name']
        ]);

        return redirect()->route('test.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestRequest  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }

  /**
   * @return \Illuminate\Http\Response
   */
    public function pdf(Request $request)
    {
      //
      $data = $request->session()->all();
//      $data = ContactInfo::find(2);
//      dd($data['_token']);
      $pdf = Pdf::loadView('pdfOutput', ['data'=>$data]);
      $pdf->setOption(['dpi' => 150, 'defaultFont'=>'sans-serif']);
      return $pdf->stream();
    }
}
