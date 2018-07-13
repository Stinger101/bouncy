<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreCarouselsRequest;
use App\Http\Requests\Site\UpdateCarouselsRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Carousel;

class CarouselsController extends Controller
{
  use \App\Http\Controllers\Traits\FileUploadTrait;
    /**
     * Display a listing of Abilities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }

        $carousel = Carousel::all();

        return view('admin.carousel.index', compact('carousel'));
    }

    /**
     * Show the form for creating new Ability.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (! Gate::allows('site_manage')) {
          return abort(401);
      }
      return view('admin.carousel.create');
    }

    /**
     * Store a newly created Ability in storage.
     *
     * @param  \App\Http\Requests\StoreAbilitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarouselsRequest $request)
    {
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
        $request=$this->saveFiles($request);
        Carousel::create($request->all());

        return redirect()->route('admin.carousel.index');
    }


    /**
     * Show the form for editing Ability.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
        $carousel = Carousel::findOrFail($id);

        return view('admin.carousel.edit', compact('carousel'));
    }

    /**
     * Update Ability in storage.
     *
     * @param  \App\Http\Requests\UpdateAbilitiesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarouselsRequest $request, $id)
    {
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
        $request=$this->saveFiles($request);
        $carousel = Carousel::findOrFail($id);

        $carousel->update($request->all());

        return redirect()->route('admin.carousel.index');
    }

      /**
       * Remove Carousel from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          if (! Gate::allows('site_manage')) {
              return abort(401);
          }
          $carousel = Carousel::findOrFail($id);
          $carousel->delete();

          return redirect()->route('admin.carousel.index');
      }

      /**
       * Delete all selected Ability at once.
       *
       * @param Request $request
       */
      public function massDestroy(Request $request)
      {
          if (! Gate::allows('site_manage')) {
              return abort(401);
          }
          if ($request->input('ids')) {
              $entries = Carousel::whereIn('id', $request->input('ids'))->get();

              foreach ($entries as $entry) {
                  $entry->delete();
              }
          }
      }
}
