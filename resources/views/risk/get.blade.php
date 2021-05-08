@extends('layouts.admin')
@section('content')

<title>ข้อมูลการติดตามช่วยเหลือ </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


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



<form action="action_form.php" method="post" onsubmit="return validateForm()">



<div class="alert alert-success" role="alert">

<h4 class="alert-heading"> ข้อมูลการติดตามช่วยเหลือ ID : {{$id}}</h4> 
<h4>ชื่อ - สกุล : <font color="red"> {{$name}} {{$surname}}</font></h4>
<h4>ตำบล {{$district}} อำเภอ {{$amphure}} จังหวัด {{$province}} เบอร์โทร {{$tel}}</h4>
<p></p>
<hr>

</div>

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
</form>
</div>
</body>


@endsection
