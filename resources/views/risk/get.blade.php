@extends('layouts.admin')
@section('content')

<title>ข้อมูลการติดตามช่วยเหลือ </title>

</head>

<script>
function validateForm() {
var st_ok = document.getElementById("ok").value;
if (st_ok == 1) {
alert("กรุณาแก้ไขข้อมูลเดิมก่อน เนื่องจากยังเป็นสถานะสิ้นสุดการคติดตามช่วยเหลืออยู่");
return false;
}
}
</script>
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
  </li>
</ul>
</div>
</nav>
<body>




{!! Form::open(['route' => 'risk.create','method'=>'POST','enctype'=>'multipart/form-data','onsubmit'=>'return validateForm()']) !!}


<div class="alert alert-success" role="alert">

<h4 class="alert-heading"> ข้อมูลการติดตามช่วยเหลือ ID : {{$id}}</h4> 
<h4>ชื่อ - สกุล : <font color="red"> {{$name}} {{$surname}}</font></h4>
<h4>ตำบล {{$district}} อำเภอ {{$amphure}} จังหวัด {{$province}} เบอร์โทร {{$tel}}</h4>
<p>ที่อยู่ : {{$address}}</p>
<hr>

</div>

<input type="hidden" id="id" name="id" value="{{$id}}">
<input type="hidden" id="name" name="name" value="{{$name}}">
<input type="hidden" id="surname" name="surname" value="{{$surname}}">
<input type="hidden" id="district" name="district" value="{{$district}}">
<input type="hidden" id="amphure" name="amphure" value="{{$amphure}}">
<input type="hidden" id="province" name="province" value="{{$province}}">
<input type="hidden" id="tel" name="tel" value="{{$tel}}">
<input type="hidden" id="address" name="address" value="{{$address}}">
<input type="hidden" id="date_in" name="date_in" value="{{$date_in}}">
<input type="hidden" id="age" name="age" value="{{$age}}">
<input type="hidden" id="gender" name="gender" value="{{$gender}}">


<input class="btn btn-primary" type="submit" value="เพิ่มข้อมูลการติดตามช่วยเหลือ">
<p>
<table class="table">
<thead class="thead-dark">
<tr>
  <th scope="col">การติดตาม</th>
  <th scope="col">วันที่ติดตาม</th>
  <th scope="col">ให้การปฐมพยาบาลทางใจ</th>
  <th scope="col">ติดต่อกลับเพื่อให้การปรึกษา</th>
  <th scope="col">ส่งต่อ</th>
  <th scope="col">แผนติดตาม/ปัญหาอุปสรรค</th>
  <th scope="col">สถานะการติดตาม</th>
  <th scope="col">แก้ไข</th>
  <th scope="col">ลบ</th>
</tr>
</thead>
<tbody>
    <?php $i=$datas->perPage()*($datas->currentPage()-1);?>
    <?php 
     $stat_ok = 0;
    if($datas->count()>0){ 
    ?>
    @foreach($datas as $data)
  
<tr>
  <th scope="row">ครั้งที่ <?php $i++;?>{{$i}}</th>
  
  <td>{{date('d/m/Y', strtotime($data->date_create))}}</td>
  <td><center><?php if($data->pfa==1){ ?>&check; <?php }?></center></td>
  <td><center><?php if($data->contact==1){ ?>&check; <?php }?></center></td>
  <td>
  <?php 
   $re_txt="";
  if($data->doctor==1){
    $re_txt = $re_txt.'ส่งต่อพบแพทย์';
  }
  if($data->other==1){
    $re_txt= $re_txt.',ส่งต่อหน่วยงานอื่น';
  }

  echo $re_txt;
  ?>
  
  </td>
  <td>{{$data->plan}}</td>
     <td>
  <?php 
  $re_txt="";
  if($data->c_trace==1){
    $re_txt = $re_txt.'ไม่สามารถติดตามได้';
  }else if($data->trace==1){
      $re_txt = $re_txt.'ยังคงติดตามต่อ';
  }else if($data->ok==1){
      $re_txt = $re_txt.'สิ้นสุดการติดตาม';
  }
  echo $re_txt;
  $re_txt="";
  
  ?>
  
  </td>

    
     
  <?php 
  if($data->ok==1||$data->c_trace==1){
      $stat_ok = 1;
  }
  ?>
  

  
  <td><a class="btn btn-warning" href="" role="button">แก้ไข</a></td>
  <td><a class="btn btn-danger" href="" role="button">ลบ</a></td>
</tr>
@endforeach

<?php
//}
}else{ ?>
<td>ไม่มีข้อมูลการติดตามช่วยเหลือ</td>
<?php
}

?>
<?php if($stat_ok==1){ ?>
    <td style="background-color:#00FF00">สิ้นสุดการติดตามช่วยเหลือ</td>
<?php } ?>

</tbody>
</table>
<input type="hidden" id="ok" name="ok" value="<?php echo $stat_ok;?>">

{!! Form::close() !!}
</div>
</body>

@if(session()->has('status'))
<script>
    swal("<?php echo session()->get('status');?>","","success");
</script>
@endif
@endsection
