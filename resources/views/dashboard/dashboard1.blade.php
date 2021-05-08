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
              <h3>150000</h3>

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
            <h3>65 %</h3>

          <p>เครียดสูง</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">12000</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
            <h3>65 %</h3>

          <p>เสี่ยงซึมเศร้า</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">12000</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
            <h3>65 %</h3>

          <p>เสี่ยงฆ่าตัวตาย</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">12000</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65 %</h3>

          <p>มีภาวะหมดไฟ</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">12000</a>
      </div>
    </div>
    <!-- ./col -->
  </div>

  <br>

  <div id="container1"></div>
  <br>
  <div id="container2"></div>
  <br>
  <div id="container3"></div>
  <br>
  <div id="container4"></div>
  <br>
  <div id="container5"></div>
  <br>
  <div id="container6"></div>
  <br>
  <div id="container7"></div>
  <br>

  <p class="highcharts-description">
    จากฐานข้อมูล Mental Health Check-In
  </p>
</figure>


</div>


<script>
Highcharts.chart('container1', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'ร้อยละของเพศ'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.y} คน</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      }
    }
  },
  series: [{
    name: 'Brands',
    colorByPoint: true,
    data: [
        <?php 
        foreach ($genders as $gender) {
        ?>
        {
      name: '<?php echo $gender->gender?>',
      y: <?php echo $gender->total?>,
    }, 
    <?php }?>
    ]
  }]
});



Highcharts.chart('container2', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'World\'s largest cities per 2017'
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
        foreach ($provinces as $province) {
        ?>
      ['<?php echo $province->name_province?>',<?php echo $province->total?>],

      <?php }?>

    ],
    dataLabels: {
      enabled: true,
     // rotation: -90,
      //color: '#FFFFFF',
      align: 'center',
      format: '{point.y:.1f}', // one decimal
      y: 12, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});


const chart = Highcharts.chart('container3', {
  title: {
    text: 'ระดับความเครียด'
  },
  subtitle: {
    text: '(ST5)'
  },
  xAxis: {
    categories: [
        <?php 
        foreach ($dataST5s as $dataST5) {
        ?>
        '<?php echo $dataST5->status_lable?>',
        <?php }?>
        ]
  },
  series: [{
    type: 'column',
    colorByPoint: true,
    data: [
        <?php 
        foreach ($dataST5s as $dataST5) {
        ?>
        <?php echo $dataST5->total?>,
        <?php }?>
    ],
  dataLabels: {
  enabled: true,
  formatter: function() {
    var pcnt = (this.y / this.series.data.map(p => p.y).reduce((a, b) => a + b, 0)) * 100;
    return Highcharts.numberFormat(pcnt) + '%';
  },
  style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
  }
},
    showInLegend: false
  }]
});




const chart4 = Highcharts.chart('container4', {
  title: {
    text: 'ระดับซึมเศร้า'
  },
  subtitle: {
    text: '(9Q)'
  },
  xAxis: {
    categories: [
        <?php 
        foreach ($data9Qs as $data9Q) {
        ?>
        '<?php echo $data9Q->status_lable?>',
        <?php }?>
        ]
  },
  series: [{
    type: 'column',
    colorByPoint: true,
    data: [
        <?php 
        foreach ($data9Qs as $data9Q) {
        ?>
        <?php echo $data9Q->total?>,
        <?php }?>
    ],
  dataLabels: {
  enabled: true,
  formatter: function() {
    var pcnt = (this.y / this.series.data.map(p => p.y).reduce((a, b) => a + b, 0)) * 100;
    return Highcharts.numberFormat(pcnt) + '%';
  },
  style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
  }
},
    showInLegend: false
  }]
});

const chart5 = Highcharts.chart('container5', {
  title: {
    text: 'ระดับความเสี่ยงฆ่าตัวตาย'
  },
  subtitle: {
    text: '(8Q)'
  },
  xAxis: {
    categories: [
        <?php 
        foreach ($data8Qs as $data8Q) {
        ?>
        '<?php echo $data8Q->status_lable?>',
        <?php }?>
        ]
  },
  series: [{
    type: 'column',
    colorByPoint: true,
    data: [
        <?php 
        foreach ($data8Qs as $data8Q) {
        ?>
        <?php echo $data8Q->total?>,
        <?php }?>
    ],
  dataLabels: {
  enabled: true,
  formatter: function() {
    var pcnt = (this.y / this.series.data.map(p => p.y).reduce((a, b) => a + b, 0)) * 100;
    return Highcharts.numberFormat(pcnt) + '%';
  },
  style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
  }
},
    showInLegend: false
  }]
});



const chart6 = Highcharts.chart('container6', {
  title: {
    text: 'ระดับความเสี่ยงซึมเศร้า 2Q'
  },
  subtitle: {
    text: '(2Q)'
  },
  xAxis: {
    categories: [
        <?php 
        foreach ($data2Qs as $data2Q) {
        ?>
        '<?php echo $data2Q->status_lable?>',
        <?php }?>
        ]
  },
  series: [{
    type: 'column',
    colorByPoint: true,
    data: [
        <?php 
        foreach ($data2Qs as $data2Q) {
        ?>
        <?php echo $data2Q->total?>,
        <?php }?>
    ],
  dataLabels: {
  enabled: true,
  formatter: function() {
    var pcnt = (this.y / this.series.data.map(p => p.y).reduce((a, b) => a + b, 0)) * 100;
    return Highcharts.numberFormat(pcnt) + '%';
  },
  style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
  }
},
    showInLegend: false
  }]
});


const chart7 = Highcharts.chart('container7', {
  title: {
    text: 'ระดับ Burnout'
  },
  subtitle: {
    text: '(Burnout)'
  },
  xAxis: {
    categories: [
        <?php 
        foreach ($burnOuts as $burnOut) {
        ?>
        '<?php echo $burnOut->status_lable?>',
        <?php }?>
        ]
  },
  series: [{
    type: 'column',
    colorByPoint: true,
    data: [
        <?php 
        foreach ($burnOuts as $burnOut) {
        ?>
        <?php echo $burnOut->total?>,
        <?php }?>
    ],
  dataLabels: {
  enabled: true,
  formatter: function() {
    var pcnt = (this.y / this.series.data.map(p => p.y).reduce((a, b) => a + b, 0)) * 100;
    return Highcharts.numberFormat(pcnt) + '%';
  },
  style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
  }
},
    showInLegend: false
  }]
});


</script>
@endsection
