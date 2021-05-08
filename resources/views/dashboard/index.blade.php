@extends('layouts.admin')
@section('content')
<style>
  .highcharts-figure, .highcharts-data-table table {
  min-width: 320px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}


input[type="number"] {
	min-width: 50px;
}

#container {
  height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

#container3 {
  height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 320px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
  </style>


    
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="container">
<figure class="highcharts-figure">
  
    <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?php
                $total=0;
                $sumMax_st = 0;
                foreach ($dataST5s as $dataST5) {
                    if ($dataST5->status_lable == 'เครียดมากถึงมากที่สุด') {
                 $sumMax_st = $sumMax_st + $dataST5->total;
                }
                $total = $total + $dataST5->total;
                }
                echo  number_format($total);
                ?>
              </h3>

              <p>ผู้ตอบแบบประเมินทั้งหมด</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
          </div>
        </div>
    </div>

  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
            <h3>   
                <?php
                echo  number_format(($sumMax_st/$total)*100, 2, '.', '');
                ?>
             %</h3>

          <p>เครียดสูง</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer"><?php echo  number_format($sumMax_st);?></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
            <h3>
                <?php
                $sumMax_deperss = 0;
                foreach ($data9Qs as $data9Q) {
                    if ($data9Q->status_lable == 'ระดับน้อย') {
                 $sumMax_deperss = $sumMax_deperss + $data9Q->total;
                }
                }
                echo  number_format(($sumMax_deperss/$total)*100, 2, '.', '');
                ?>
                %</h3>

          <p>เสี่ยงซึมเศร้า</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer"><?php echo  number_format($sumMax_deperss);?></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
            <h3>
                <?php
                $sumMax_sui = 0;
                foreach ($data8Qs as $data8Q) {
                    if ($data8Q->status_lable == 'ระดับน้อย') {
                 $sumMax_sui = $sumMax_sui + $data8Q->total;
                }
                }
                echo  number_format(($sumMax_sui/$total)*100, 2, '.', '');
                ?>
                
                %</h3>

          <p>เสี่ยงฆ่าตัวตาย</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer"><?php echo  number_format($sumMax_sui);?></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>
            <?php
            $sumMax_burnout = 0;
            foreach ($burnOuts as $burnOut) {
                if ($burnOut->status_lable == 'มีความเสี่ยง') {
             $sumMax_burnout = $sumMax_burnout + $burnOut->total;
            }
            }
            echo  number_format(($sumMax_burnout/$total)*100, 2, '.', '');
            ?>
            
            %</h3>

          <p>มีภาวะหมดไฟ</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer"><?php echo  number_format($sumMax_burnout);?></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

  <br>
  <div id="container1"></div>
  <br>
  {{-- <div id="container2"></div>
  <br> --}}

  <p class="highcharts-description">
    จากฐานข้อมูล Mental Health Check-In
  </p>
</figure>


</div>


<script>

Highcharts.chart('container1', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'จำนวนผู้ตอบแบบประเมินรายเขตสุขภาพ'
  },
  subtitle: {
    text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Population (millions)'
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'จำนวน: <b>{point.y}</b>'
  },
  series: [{
    name: 'Population',
    data: [
        <?php 
        foreach ($regs as $reg) {
        ?>
      ['เขตสุขภาพที่ <?php echo $reg->Reg_id?>',<?php echo $reg->total?>],

      <?php }?>

    ],
    dataLabels: {
      enabled: true,
     // rotation: -90,
      //color: '#FFFFFF',
      align: 'center',
      format: '{point.y}', // one decimal
      y: 10, // 10 pixels down from the top
      style: {
        fontSize: '11.5px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});




</script>
@endsection
