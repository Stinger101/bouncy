<!-- carousel/slider -->
 <div class="cycloneslider cycloneslider-template-default cycloneslider-width-full" id="cycloneslider-homebanner-1" >
    <div class="cycloneslider-slides cycle-slideshow"
    data-cycle-allow-wrap="true" data-cycle-dynamic-height="off" data-cycle-auto-height="1366:480"
    data-cycle-auto-height-easing="null" data-cycle-auto-height-speed="250" data-cycle-delay="0"
    data-cycle-easing="" data-cycle-fx="fade" data-cycle-hide-non-active="true" data-cycle-log="false"
    data-cycle-next="#cycloneslider-homebanner-1 .cycloneslider-next"
    data-cycle-pager="#cycloneslider-homebanner-1 .cycloneslider-pager" data-cycle-pause-on-hover="true"
    data-cycle-prev="#cycloneslider-homebanner-1 .cycloneslider-prev" data-cycle-slides="&gt; div"
    data-cycle-speed="1000" data-cycle-swipe="false" data-cycle-tile-count="7"
    data-cycle-tile-delay="100" data-cycle-tile-vertical="true" data-cycle-timeout="4000" >
    @php($i=0)
    @foreach($carousels as $carousel)
      @include('partials.site-home-carousel-content')
      @php($i++)
      @if($i==5)
      @break
      @endif
    @endforeach

      <!-- carousel side-to-side buttons  -->
      <a href="#" class="cycloneslider-prev"></a>
      <a href="#" class="cycloneslider-next"></a>
    </div>


  <!-- quote below slider   -->
<aside id="black-studio-tinymce-4" class="widget widget_black_studio_tinymce"><div class="textwidget"><div class="slogan">
<h3>Life's goodness everyday!</h3>
<h4>New KCC is the largest business entity in the dairy industry in East Africa</h4>
</div>
</div></aside>
