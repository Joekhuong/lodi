<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Idol;
use Illuminate\Http\Request;

class IdolsController extends Controller
{
    /**
     * Display list of idols based on search name
     *
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keyword = $request->get('name',null);
        
        $idols = array();

        if($keyword != null)
        {   
            $idols = \App\Idol::where('name', 'like', '%' . $keyword . '%')->get();
        }

        return view('idols.search', compact('idols'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $idols = Idol::where('name', 'LIKE', "%$keyword%")
                ->orWhere('img_url', 'LIKE', "%$keyword%")
                ->orWhere('dob', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $idols = Idol::latest()->paginate($perPage);
        }

        return view('idols.index', compact('idols'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('idols.create',['idol' => new Idol()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|max:100|unique:idols,name'
		]);
        $requestData = $request->all();

        $page = \App\Page::create();        
        $page->save();
        
        $new = Idol::create($requestData);
        $new->page_id = $page->id;
        $new->save();

        return redirect('/admin/idols')->with('flash_message', 'Idol added!');
    }

    public function showPage($idol_id)
    {
        $idol = Idol::findOrFail($idol_id);

        return json_encode($idol,true);
    }

    public function follow($idol_id)
    {
        $follow = \App\Follow::where(['idol_id' => $idol_id, 'user_id' => \Auth::user()->id])->first();

        $idol = \App\Idol::with('page')->findOrFail($idol_id);

        if($follow == null)
        {
            \App\Follow::create([
                'user_id' => \Auth::user()->id,
                'idol_id' => $idol_id
            ]);
        }
        
        return redirect('/pages/'.$idol->page->key);
    }

    public function unfollow($idol_id)
    {
        $follow = \App\Follow::where(['idol_id' => $idol_id, 'user_id' => \Auth::user()->id])->first();

        $idol = \App\Idol::with('page')->findOrFail($idol_id);

        \App\Follow::where([
            'user_id' => \Auth::user()->id,
            'idol_id' => $idol_id
        ])->delete();
        
        return redirect('/pages/'.$idol->page->key);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $idol = Idol::findOrFail($id);

        return view('idols.show', compact('idol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $idol = Idol::findOrFail($id);

        return view('idols.edit', compact('idol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required|max:100'
		]);
        $requestData = $request->all();
        
        $idol = Idol::findOrFail($id);
        $idol->update($requestData);

        return redirect('admin/idols')->with('flash_message', 'Idol updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Idol::destroy($id);

        return redirect('/admin/idols')->with('flash_message', 'Idol deleted!');
    }
}
