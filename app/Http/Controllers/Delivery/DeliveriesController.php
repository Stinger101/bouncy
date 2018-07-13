<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Delivery\StoreDeliveriesRequest;
use App\Http\Requests\Delivery\UpdateDeliveriesRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\User;
use App\Delivery;

class DeliveriesController extends Controller
{


  public function index()
  {
      if (! Gate::allows('delivery_manage')) {
          return abort(401);
      }

      $deliveries = Delivery::with('user')->get();

      return view('admin.delivery.index', compact('deliveries'));
  }

  /**
   * Show the form for creating new Ability.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    if (! Gate::allows('delivery_manage')) {
        return abort(401);
    }
    $users=User::get()->pluck('email','id');
    return view('admin.delivery.create',compact('users'));
  }

  /**
   * Store a newly created Ability in storage.
   *
   * @param  \App\Http\Requests\StoreAbilitiesRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreDeliveriesRequest $request)
  {
      if (! Gate::allows('delivery_manage')) {
          return abort(401);
      }
// return $request->user;
      // $user=User::where('email',$request->user)->first();
      // return $user;
      // $request->user=$user['id'];
      // return $user['id'];

      // $request=$request;
      $delivery=Delivery::create(['user_id'=>$request->user,'date'=>$request->date,'quantity'=>$request->quantity,'price'=>$request->price,'status'=>$request->status]);


      return redirect()->route('admin.delivery.index');
  }


  /**
   * Show the form for editing Ability.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      if (! Gate::allows('delivery_manage')) {
          return abort(401);
      }
      $delivery = Delivery::with('user')->findOrFail($id);
      $users=User::get()->pluck('email','id');

      return view('admin.delivery.edit', compact('delivery','users'));
  }

  /**
   * Update Ability in storage.
   *
   * @param  \App\Http\Requests\UpdateAbilitiesRequest  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateDeliveriesRequest $request, $id)
  {
      if (! Gate::allows('delivery_manage')) {
          return abort(401);
      }
      // $request->user=User::where('email',$request->user)->get('id');
      $delivery = Delivery::findOrFail($id);
      $delivery->update(['user_id'=>$request->user,'date'=>$request->date,'price'=>$request->price,'status'=>$request->status,'quantity'=>$request->quantity]);


      return redirect()->route('admin.delivery.index');
  }

    /**
     * Remove Delivery from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('delivery_manage')) {
            return abort(401);
        }
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();

        return redirect()->route('admin.delivery.index');
    }

    /**
     * Delete all selected Ability at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('delivery_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Delivery::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
