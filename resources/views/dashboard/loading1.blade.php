@extends('layouts.admin')
@section('content')
<style>
  #overlay {   
        position: absolute;  
        top: 0px;   
        left: 0px;  
        background: #ccc;   
        width: 100%;   
        height: 100%;   
        opacity: .75;   
        filter: alpha(opacity=75);   
        -moz-opacity: .75;  
        z-index: 999;  
        background: #fff url({{asset('images/load.gif')}}) 50% 50% no-repeat;
    }   
    .main-contain{
        position: absolute;  
        top: 0px;   
        left: 0px;  
        width: 100%;   
        height: 100%;   
        overflow: hidden;
    }

  .highcharts-figure, .highcharts-data-table table {
  min-width: 320px; 
  max-width: 800px;
  margin: 1em auto;
}

  </style>


<div class="container">
  <div id="overlay"></div>

</div>


<script>
$(function(){
	$("#overlay").fadeOut();
    $(".main-contain").removeClass("main-contain");
});
window.location.href = '{{ route('dashboard.index') }}'+'/1';
</script>






@endsection
