<!-- products of company -->
<div class="wrapper dairy">
<aside id="sticky-posts-2" class="dairyliving widget widget_ultimate_posts">
  <h1 class="widget-title">Dairy Living</h1>
  <ul>
    @php($i=0)
    @foreach($products as $product)
      @include('partials.site-home-product')
      @php($i++)
      @if($i==3)
      @break
      @endif
    @endforeach
  </ul>
</aside>
</div>
<!-- accept/reject  -->
<!--  price-->
