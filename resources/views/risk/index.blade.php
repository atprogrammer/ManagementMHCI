@extends('layouts.admin')
@section('content')


<div class="container">
    <h2 align="center">ติดตามกลุ่มเสี่ยง</h2>
   <br>
    <div class="form-row">
      <div class="form-group col-md-4"> 
        {!! Form::label('l_book_from', 'ค้นหารายชื่อ', ['class' => 'col-sm-6 col-form-label']) !!}
      <div class="input-group mb-3"> 
        <input type="text"  class="form-control" id="search_name"  placeholder="พิมพ์เพื่อค้นหา">
        <div class="input-group-append">
          <a href="#" id="search_name_btn" class="btn btn-primary"><i class="fas fa-search"></i></a>
         </div>
      </div>
      </div>
      <div class="form-group col-md-3">
        
      </div>
      <div class="form-group col-md-3">

      </div>
      <div class="form-group col-md-2">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>
              {{$datas->total()}}
            </h3>
            <p>จำนวนผู้ที่มีความเสี่ยงทั้งหมด</p>
          </div>
          <div class="icon">
              <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4"> 
      <a href="{{route('risk.exportRisktoExcel')}}" type="button" class="btn btn-success">โหลด Excel</a>
        </div>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">สถานะ</th>
            <th scope="col">id</th>
            <th scope="col">วันที่</th>
            <th scope="col">เพศ</th>
            <th scope="col">อายุ</th>
            <th scope="col">ชื่อ</th>
            <th scope="col">สกุล</th> 
            <th scope="col">ระดับ Burnout</th>
            <th scope="col">ระดับ ST5</th>
            <th scope="col">ระดับ 9Q</th>
            <th scope="col">ระดับ 8Q</th>
            <th scope="col">เบอร์โทร</th>
            <th scope="col">ตำบล</th>
            <th scope="col">อำเภอ</th>
            <th scope="col">จังหวัด</th>
          </tr>
        </thead>
        <tbody>
            <?php $i=$datas->perPage()*($datas->currentPage()-1);?>
            @foreach($datas as $data)
          <tr>
            <tr><th scope="row"><?php $i++;?>{{$i}}</th>
              <?php 
              //  $risk_name='';
              //  $risk_surname='';
              if($data->risk_name==null){
                $risk_name='-';
              }else{
                $risk_name=$data->risk_name;
                $risk_name = preg_replace('|/|',' ', $risk_name);
              }
              if($data->risk_surname==null){
                $risk_surname='-';
              }else{
                $risk_surname=$data->risk_surname;
                $risk_surname = preg_replace('|/|',' ', $risk_surname);
              }
              if($data->name_district==null){
                $name_district='-';
              }else{
                $name_district=$data->name_district;
                $name_district = preg_replace('|/|',' ', $name_district);
              }
              if($data->name_amphure==null){
                $name_amphure='-';
              }else{
                $name_amphure=$data->name_amphure;
                $name_amphure = preg_replace('|/|',' ', $name_amphure);
              }
              if($data->name_province==null){
                $name_province='-';
              }else{
                $name_province=$data->name_province;
                $name_province = preg_replace('|/|',' ', $name_province);
              }
              if($data->risk_tel==null){
                $risk_tel='-';
              }else{
                $risk_tel=$data->risk_tel;
                $risk_tel = preg_replace('|/|',' ', $risk_tel);
              }
              if($data->address==null){
                $address='-';
              }else{
                $address=$data->address;
                $address = preg_replace('|/|',' ', $address);
              }
              if($data->data_create==null){
                $data_create='-';
              }else{
                $data_create=date('Y-m-d', strtotime($data->data_create));
                $data_create = preg_replace('|/|',' ', $data_create);
              }
              if($data->age==null){
                $age='-';
              }else{
                $age=$data->age;
                $age = preg_replace('|/|',' ', $age);
              }
              if($data->gender==null){
                $gender='-';
              }else{
                $gender=$data->gender;
                $gender = preg_replace('|/|',' ', $gender);
              }
              ?>
            <td><a href="{{route('risk.get',[$data->id,$risk_name,$risk_surname
            ,$name_district,$name_amphure,$name_province,$risk_tel,$address,$data_create,$age,$gender])}}">
                <?php if($data->data_id<=0){?>
                <img src="{{asset('images/FALSE.png')}}" width="50px" height="50px">
                <?php }else if($data->trace=='1'){?>
                <img src="{{asset('images/WAIT.png')}}" width="50px" height="50px">
                <?php }else if($data->c_trace=='1'){?>
                <img src="{{asset('images/MISS.png')}}" width="50px" height="50px">
                <?php }else{?>
                <img src="{{asset('images/TRUE.png')}}" width="50px" height="50px">
                <?php }?>
              </a>
            </td>
            <td>{{$data->id}}</td>
            <td>{{date('d/m/Y', strtotime($data->data_create))}}</td>
            <td>{{$data->gender}}</td>
            <td>{{$data->age}}</td>
            <td>{{$data->risk_name}}</td>
            <td>{{$data->risk_surname}}</td>
            <td><?php if($data->q1>=3)
            {
                echo "เสี่ยง";
            }else{
                echo "ปกติ";
            }
            
            ?></td>
            <td><?php if($data->sumST5>=10)
              {
                  echo "เครียดมากที่สุด";
              }else if($data->sumST5>=8){
                  echo "เครียดมาก";
              }else if($data->sumST5>=5){
                  echo "เครียดปานกลาง";
              }else if($data->sumST5>=0){
                  echo "เครียดน้อย";
              }
                         
              ?>
            </td>
            <td>
              <?php if($data->sum9Q>=19)
              {
                  echo "ระดับรุนแรง";
              }else if($data->sum9Q>=13){
                  echo "ระดับปานกลาง";
              }else if($data->sum9Q>=7){
                  echo "ระดับน้อย";
              }else if($data->sum9Q>=0){
                  echo "ไม่มีอาการ";
              }
              
              ?>

            </td>
            <td>
              <?php if($data->sum8Q>=17)
              {
                  echo "ระดับรุนแรง";
              }else if($data->sum8Q>=9){
                  echo "ระดับปานกลาง";
              }else if($data->sum8Q>=1){
                  echo "ระดับน้อย";
              }else if($data->sum8Q<=0){
                  echo "ไม่มีแนวโน้ม";
              } 
              ?>

            </td>
            <td>
                {{$data->risk_tel}}

            </td>
            <td>
                {{$data->name_district}}
            </td>
            <td>
                {{$data->name_amphure}}
            </td>
            <td>
                {{$data->name_province}}
            </td>
            </tr>
           @endforeach
        </tbody>
      </table>
      ทั้งหมด : {{$datas->total()}} / หน้าที่ {{$datas->currentPage()}}
      <?php 
      $datas->setPath(route('risk.index'));
      ?>
      {{$datas->links('pagination::bootstrap-4')}}
  
      
</div>

@if(session()->has('status'))
<script>
    swal("<?php echo session()->get('status');?>","","success");
</script>
@endif



@endsection



