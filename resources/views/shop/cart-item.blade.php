<tr>
  <td><a href="http://www.gibscoffee.com/shop/kenya-aa-beans-medium-roast-454gm">
    <img src="/img/{{$cartitem->image}}" alt="" width="50px" /></a>
  </td>
  <td><a href="http://www.gibscoffee.com/shop/kenya-aa-beans-medium-roast-454gm">{{$cartitem->name}} {{$cartitem->weight}}</a></td>
  <td>{{$cartitem->weight}}</td>
  <td>
    <input class="form-control sAFixedInputWidth" min="0" name="qty[7]" type="number" value="{{array_count_values(session('cart'))[$cartitem->id]}}">
  </td>
  <td>{{$cartitem->price}}</td>
  <td>{{array_count_values(session('cart'))[$cartitem->id] * $cartitem->price}}</td>
  <td>200.00</td>
  <td><button href="{{url('cart',$cartitem->id)}}">EDIT</button></td>
</tr>
