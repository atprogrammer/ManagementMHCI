@extends('layouts.admin')
@section('content')

<style>

    .checkbox-lg .custom-control-label::before, 
    .checkbox-lg .custom-control-label::after {
      top: .8rem;
      width: 1.55rem;
      height: 1.55rem;
    }
    
    .checkbox-lg .custom-control-label {
      padding-top: 13px;
      padding-left: 6px;
    }
    
    
    .checkbox-xl .custom-control-label::before, 
    .checkbox-xl .custom-control-label::after {
      top: 1.2rem;
      width: 1.85rem;
      height: 1.85rem;
    }
    
    .checkbox-xl .custom-control-label {
      padding-top: 23px;
      padding-left: 10px;
    }
    </style>
    
    <script>
    function validateForm() {
       var checkBox12 = document.getElementById("checkbox-12");
       var checkBox13 = document.getElementById("checkbox-13");
       var checkBox14 = document.getElementById("checkbox-14");
      if (checkBox12.checked == false && checkBox13.checked == false && checkBox14.checked == false) {
        alert("กรุณาเลือกข้อมูลสถานะการติดตาม !");
        return false;
      }
    }
    function myFunction10() {
      var checkBox10 = document.getElementById("checkbox-10");
    
      if (checkBox10.checked == true){
        document.getElementById("checkbox-11").checked = false; 
      } 
    }
    function myFunction11() {
      var checkBox11 = document.getElementById("checkbox-11");
    
      if (checkBox11.checked == true){
        document.getElementById("checkbox-10").checked = false; 
      } 
    }
    
    
    function myFunction12() {
      var checkBox12 = document.getElementById("checkbox-12");
    
      if (checkBox12.checked == true){
        document.getElementById("checkbox-13").checked = false; 
        document.getElementById("checkbox-14").checked = false; 
      } 
    }
    function myFunction13() {
      var checkBox13 = document.getElementById("checkbox-13");
    
      if (checkBox13.checked == true){
        document.getElementById("checkbox-12").checked = false; 
        document.getElementById("checkbox-14").checked = false; 
      } 
    }
    function myFunction14() {
      var checkBox14 = document.getElementById("checkbox-14");
    
      if (checkBox14.checked == true){
        document.getElementById("checkbox-12").checked = false; 
        document.getElementById("checkbox-13").checked = false; 
      } 
    }
    </script>
    </head>
    <div class="container">
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
    
    
    
{!! Form::open(['route' => 'risk.store','method'=>'POST','enctype'=>'multipart/form-data','onsubmit'=>'return validateForm()']) !!}
    
    
    <input type="hidden" id="id" name="id" value="">
    
    <div class="alert alert-success" role="alert">
    
      <h4 class="alert-heading"> ข้อมูลการติดตามช่วยเหลือ ID : {{$id}}</h4>
      <h4>ชื่อ - สกุล : <font color="red">{{$name}} {{$surname}}</font></h4>
      <h4>ตำบล {{$district}} อำเภอ {{$amphure}} จังหวัด {{$province}} เบอร์โทร {{$tel}}</h4>
      <p></p>
      <hr>
      <p class="mb-0">ที่อยู่ : {{$address}}</p>
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
     <!-- Or let Bootstrap automatically handle the layout -->
     <div class="row">
          <div class="col-sm">
          <div class="card text-white bg-success mb-3">
      <h5 class="card-header">ปฐมพยาบาลทางใจ</h5>
      <div class="card-body">
                <!-- Default checked -->
                <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" class="custom-control-input" id="checkbox-3" name="pfa" value="1" >
              <label class="custom-control-label" for="checkbox-3">ปฐมพยาบาลทางใจ</label>
            </div>
      </div>
    </div>
    
          </div>
          <div class="col-sm" >
          <div class="card text-white bg-primary mb-3">
      <h5 class="card-header" >ติดต่อกลับเพื่อให้การปรึกษา</h5>
      <div class="card-body">
          <!-- Default checked -->
          <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" class="custom-control-input" id="checkbox-5" name="contact" value="1" >
              <label class="custom-control-label" for="checkbox-5"> ติดต่อกลับเพื่อให้การปรึกษา</label>
            </div> 
      </div>
    </div>
    
          </div>
          <div class="col-sm" >
          <div class="card text-white bg-info mb-3">
      <h5 class="card-header">ส่งต่อ</h5>
      <div class="card-body">
          <!-- Default checked -->
          <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" class="custom-control-input" id="checkbox-10" name="doctor" value="1" onclick="myFunction10()">
              <label class="custom-control-label" for="checkbox-10"> ส่งต่อพบแพทย์</label>
            </div>
    
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" class="custom-control-input" id="checkbox-11" name="other" value="1" onclick="myFunction11()">
              <label class="custom-control-label" for="checkbox-11"> ส่งต่อหน่วยงานอื่นๆ ตามสภาพปัญหา</label>
            </div>
      </div>
    </div>
    
     </div>
          <div class="col-sm" >
          <div class="card text-white card bg-danger text-white mb-3">  
      <h5 class="card-header">สถานะการติดตาม</h5>
      <div class="card-body">
          <!-- Default checked -->
          <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" class="custom-control-input" id="checkbox-12" name="c_trace" value="1" onclick="myFunction12()">
              <label class="custom-control-label" for="checkbox-12"> ไม่สามารถติดตามได้</label>
            </div>
                 <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" class="custom-control-input" id="checkbox-13" name="trace" value="1" onclick="myFunction13()">
              <label class="custom-control-label" for="checkbox-13"> ติดตามต่อ</label>
            </div>
             <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" class="custom-control-input" id="checkbox-14" name="ok" value="1" onclick="myFunction14()">
              <label class="custom-control-label" for="checkbox-14">สิ้นสุดการติดตามเนื่องจากหมดความเสี่ยง</label>
            </div>
    
      </div>
    </div>
        
          </div>
        </div>
        <div class="row">
        <div class="col">
        <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text bg-warning text-dark">แผนติดตาม/ปัญหาอุปสรรค</span>
      </div>
      <textarea class="form-control" aria-label="With textarea" name="plan" placeholder="กรอกแผนติดตาม/ปัญหาอุปสรรค"></textarea>
    </div>
        </div>
    
      </div>
        <br>
        <input class="btn btn-primary" type="submit" value="บันทึกข้อมูล">
    <p>
    <?php
    // echo $_POST['id'] . '<br>';
    // echo $_POST['date_data'] . '<br>';
    // echo $_POST['risk_name'] . '<br>';
    // echo $_POST['risk_surname'] . '<br>';
    // echo $_POST['dis_name_th'] . '<br>';
    // echo $_POST['amp_name'] . '<br>';
    // echo $_POST['province'] . '<br>';
    // echo $_POST['age'] . '<br>';
    // echo $_POST['risk_group'] . '<br>';
    // echo $_POST['address'] . '<br>';
    ?>
    </p>
    {!! Form::close() !!}
    </div>
    </body>


    @endsection
