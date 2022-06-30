<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Commandes', 'Hours per Day'],
      ['Accepté',     {!! $accepte !!}],
      ['Refusé',     {!! $refuse !!}],
      ['En cours',  {!! $encours !!}],

    ]);

    var options = {
      title: 'Commandes',
      is3D: true,
      backgroundColor: { fill:'transparent' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script>

<div id="piechart_3d" style="width: 700px; height: 400px; position:absolute;left: 247px;
top: 225px;"></div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Accepté',     {!! $reclamationa !!}],
      ['Refusé',     {!! $reclamationr !!}],
      ['En cours',  {!! $reclamationen !!}],

    ]);

    var options = {
      title: 'Reclamations',
      pieHole: 0.4,
      backgroundColor: { fill:'transparent' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>
<div id="donutchart" style="width: 700px; height: 400px; position:absolute;left: 800px;
top: 225px;"></div>
