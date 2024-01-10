<script>





var options = {
    series: [76, 67, 61, 90, 90],
    chart: {
    height: 270,
    type: 'radialBar',
  },
  plotOptions: {
    radialBar: {
      offsetY: 0,
      startAngle: 0,
      endAngle: 270,
      hollow: {
        margin: 5,
        size: '30%',
        background: 'transparent',
        image: undefined,
      },
      dataLabels: {
        name: {
          show: false,
        },
        value: {
          show: false,
        }
      }
    }
  },
  colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5', '#0077B5'],
  labels: ['All', 'Approved', 'Printed', 'Released', 'Rejected'],
  legend: {
    show: true,
    floating: true,
    fontSize: '12px',
    position: 'left',
    offsetX: 0,
    offsetY: 0,
    labels: {
      useSeriesColors: true,
    },
    markers: {
      size: 0
    },
    formatter: function(seriesName, opts) {
      return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
    },
    itemMargin: {
      vertical: 3
    }
  },
  responsive: [{
    breakpoint: 480,
    options: {
      legend: {
          show: false
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#AllinOne"), options);
  chart.render();

var GenderChart = {
  series: [{{$qamarcarecardsMale}}, {{$qamarcarecardsFemale}}],
  chart: {
      width: 380,
      type: 'pie',
  },
  title: {
      text: "Gender Base Classification",
      align: "left",
      style: {
          fontWeight: "500"
      }
  },
  labels: ['Male', 'Female'],
  responsive: [{
      breakpoint: 480,
      options: {
          chart: {
              width: 200
          },
          legend: {
              position: 'bottom'
          }
      }
  }]
};

var GenderChart = new ApexCharts(document.querySelector("#GenderChart"), GenderChart);
GenderChart.render();



var FamilyStatusChart = {
  chart: {
      height: 400,
      type: "donut"
  },
  title: {
      text: "Family Status Base Classification",
      align: "left",
      style: {
          fontWeight: "500"
      }
  },
  series: [{{$qamarcarecardsPoor}}, {{$qamarcarecardsLowIncome}},{{$qamarcarecardsWidow}}, {{$qamarcarecardsOrphans}},{{$qamarcarecardsDisabledIndividual}}, {{$qamarcarecardsElderlyIndividual}},{{$qamarcarecardsDisplacedFamily}}, {{$qamarcarecardsDisasterAffected}}],
  labels: ['Poor', 'Low Income',  'Widow', 'Orphans', 'Disabled Individual', 'Elderly Individual', 'Displaced Family', 'Disaster Affected'],
  colors: ["#34c38f", "#556ee6", "#f46a6a", "#50a5f1", "#f1b44c", "#f1b44c", "#f1b44c", "#f1b44c", "#f1b44c"],
  legend: {
      show: !0,
      position: "right",
      horizontalAlign: "center",
      verticalAlign: "middle",
      floating: !1,
      fontSize: "14px",
      offsetX: 0
  },
  responsive: [{
      breakpoint: 600,
      options: {
          chart: {
              height: 240
          },
          legend: {
              show: !1
          }
      }
  }]
};

var FamilyStatusChart = new ApexCharts(document.querySelector("#FamilyStatusChart"), FamilyStatusChart);
FamilyStatusChart.render();


var DataInsertionChart = {

chart: {
height: 350,
type: "bar",
toolbar: {
  show: !1
}
},
plotOptions: {
bar: {
  dataLabels: {
      position: "top"
  }
}
},
dataLabels: {
enabled: !0,
formatter: function(e) {
  return e + "%"
},
offsetY: -22,
style: {
  fontSize: "12px",
  colors: ["#304758"]
}
},
series: [{
name: "Card Inserted",
data: [2.5, 3.2, 5, 10.1, 4.2, 3.8, 3, 2.4, 4, 1.2, 3.5, .8]
}],
colors: ["#556ee6"],
grid: {
borderColor: "#f1f1f1"
},
xaxis: {
categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
position: "top",
labels: {
  offsetY: -18
},
axisBorder: {
  show: !1
},
axisTicks: {
  show: !1
},
crosshairs: {
  fill: {
      type: "gradient",
      gradient: {
          colorFrom: "#D8E3F0",
          colorTo: "#BED1E6",
          stops: [0, 100],
          opacityFrom: .4,
          opacityTo: .5
      }
  }
},
tooltip: {
  enabled: !0,
  offsetY: -35
}
},
fill: {
gradient: {
  shade: "light",
  type: "horizontal",
  shadeIntensity: .25,
  gradientToColors: void 0,
  inverseColors: !0,
  opacityFrom: 1,
  opacityTo: 1,
  stops: [50, 0, 100, 100]
}
},
yaxis: {
axisBorder: {
  show: !1
},
axisTicks: {
  show: !1
},
labels: {
  show: !1,
  formatter: function(e) {
      return e + "%"
  }
}
},
title: {
text: "Montly Data Insertion, 2002",
floating: !0,
offsetY: 330,
align: "center",
style: {
  color: "#444",
  fontWeight: "500"
}
}
};

var DataInsertionChart = new ApexCharts(document.querySelector("#DataInsertionChart"), DataInsertionChart);
DataInsertionChart.render();











(async () => {

const topology = await fetch('{{ URL::asset('/assets/libs/afghanistanmap/af-all.topo.json')}}').then(response => response.json());




const data = [
['af-kt', {{$khost}}], ['af-pk', {{$paktika}}], ['af-gz', {{$ghazni}}], ['af-bd', {{$badakhshan}}],
['af-nr', {{$nuristan}}], ['af-kr', {{$kunar}}], ['af-kz', {{$kunduz}}], ['af-ng', {{$nangarhar}}],
['af-tk', {{$takhar}}], ['af-bl', {{$baghlan}}], ['af-kb', {{$kabul}}], ['af-kp', {{$kapisa}}],
['af-2030', {{$panjshir}}], ['af-la', {{$laghman}}], ['af-lw', {{$logar}}], ['af-pv', {{$parwan}}],
['af-sm', {{$samangan}}], ['af-vr', {{$wardak}}], ['af-pt', {{$paktya}}], ['af-bg', {{$badghis}}],
['af-hr', {{$herat}}], ['af-bk', {{$balkh}}], ['af-jw', {{$jawzjan}}], ['af-bm', {{$bamyan}}],
['af-gr', {{$ghor}}], ['af-fb', {{$faryab}}], ['af-sp', {{$sar_e_pol}}], ['af-fh', {{$farah}}],
['af-hm', {{$helmand}}], ['af-nm', {{$nimroz}}], ['af-2014', {{$daykundi}}], ['af-oz', {{$uruzgan}}],
['af-kd', {{$kandahar}}], ['af-zb', {{$zabul}}]
];

// Create the chart
Highcharts.mapChart('AfghanistanChart', {
chart: {
  map: topology
},

title: {
  text: 'QCC Provincail Data',
  align: "left",
      style: {
          color: "#444",
          fontWeight: "500"
      }
},



mapNavigation: {
  enabled: true,
  buttonOptions: {
      verticalAlign: 'bottom'
  }
},

colorAxis: {
  min: 0
},

series: [{
  data: data,
  name: 'Total',
  states: {
      hover: {
          color: '#556ee6'
      }
  },
  dataLabels: {
      enabled: true,
      format: '{point.name}'
  }
}]
});

})();
</script>