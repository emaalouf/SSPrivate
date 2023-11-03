<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Chart</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://unpkg.com/singledivui/dist/singledivui.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/singledivui/dist/singledivui.min.js"></script>
    <style>
        body {
            padding: 10px;
            font-family: Verdana, Arial, sans-serif;
        }

        .filter-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        #historyTable {
            width: 100%;
            margin-top: 20px;
            font-size: 16px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .cell {
            width: 100%;
            padding: 0px 10px;
        }
    </style>
</head>
<body>

@extends('backend.admin.layouts.app')

@section('content')

<h1>Headcount history - Room no. <span class="badge badge-info">1</span></h1>

<canvas id="myChart"></canvas>

<h1>History</h1>
<h4>Filter</h4>
<div class="filter-container">
    <div>
        <label for="startTime">Start Time:</label>
        <select id="startTime">
            @foreach($dataCollection as $entry)
            <option value="{{ $entry['time'] }}">{{ $entry['time'] }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="endTime">End Time:</label>
        <select id="endTime">
            @foreach($dataCollection as $entry)
            <option value="{{ $entry['time'] }}">{{ $entry['time'] }}</option>
            @endforeach
        </select>
    </div>
</div>
<table id="historyTable">
    <thead>
        <tr>
            <th>Time</th>
            <th>Head Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataCollection as $entry)
        <tr>
            <td>{{ $entry['time'] }}</td>
            <td>{{ $entry['head_count'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<script>
    $(document).ready(function () {
        // Get the data for the chart from your PHP variables
        var labels = {!! json_encode(array_column($dataCollection, 'time')) !!};
        var data = {!! json_encode(array_column($dataCollection, 'head_count')) !!};

        // Create a new Chart instance
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Head Count',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Update the chart when the filters change
        $('#startTime, #endTime').change(function () {
            // Get the selected start and end times
            var startTime = $('#startTime').val();
            var endTime = $('#endTime').val();

            // Update the chart data based on the selected range
            // You may need to fetch updated data from the server using AJAX

            // For example:
            // $.ajax({
            //     url: '/api/getChartData',
            //     method: 'GET',
            //     data: {startTime: startTime, endTime: endTime},
            //     success: function (response) {
            //         // Update the chart data and labels
            //         myChart.data.labels = response.labels;
            //         myChart.data.datasets[0].data = response.data;
            //
            //         // Update the chart
            //         myChart.update();
            //     }
            // });
        });
    });
</script>


<style>
    body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  padding: 10px 20px;
}

/* Bar Graph Vertical */
.bar-graph .year {
  -webkit-animation: fade-in-text 2.2s 0.1s forwards;
  -moz-animation: fade-in-text 2.2s 0.1s forwards;
  animation: fade-in-text 2.2s 0.1s forwards;
}

.bar-graph-vertical {
  margin-top: 80px;
  max-width: 680px;
}

.bar-graph-vertical .bar-container {
  float: left;
  height: 150px;
  margin-right: 8px;
  position: relative;
  text-align: center;
  width: 40px;
}

.bar-graph-vertical .bar {
  border-radius: 3px;
  bottom: 40px;
  position: absolute;
  width: 40px;
}

.bar-graph-vertical .year {
  bottom: 0;
  left: 0;
  margin: 0 auto;
  position: absolute;
  right: 0;
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  transform: rotate(90deg);
}

.bar-graph-two .bar::after {
  -webkit-animation: fade-in-text 2.2s 0.1s forwards;
  -moz-animation: fade-in-text 2.2s 0.1s forwards;
  animation: fade-in-text 2.2s 0.1s forwards;
  color: #fff;
  content: attr(data-percentage);
  font-weight: 700;
  left: 0;
  margin: 0 auto;
  position: absolute;
  right: 0;
  text-align: left;
  top: 24px;
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  transform: rotate(90deg);
}

.bar-graph-two .bar-one .bar {
  background-color: #64b2d1;
  -webkit-animation: show-bar-one-vertical 1.2s 0.1s forwards;
  -moz-animation: show-bar-one-vertical 1.2s 0.1s forwards;
  animation: show-bar-one-vertical 1.2s 0.1s forwards;
}

.bar-graph-two .bar-two .bar {
  background-color: #5292ac;
  -webkit-animation: show-bar-two-vertical 1.2s 0.2s forwards;
  -moz-animation: show-bar-two-vertical 1.2s 0.2s forwards;
  animation: show-bar-two-vertical 1.2s 0.2s forwards;
}

.bar-graph-two .bar-three .bar {
  background-color: #407286;
  -webkit-animation: show-bar-three-vertical 1.2s 0.3s forwards;
  -moz-animation: show-bar-three-vertical 1.2s 0.3s forwards;
  animation: show-bar-three-vertical 1.2s 0.3s forwards;
}

.bar-graph-two .bar-four .bar {
  background-color: #2e515f;
  -webkit-animation: show-bar-four-vertical 1.2s 0.4s forwards;
  -moz-animation: show-bar-four-vertical 1.2s 0.4s forwards;
  animation: show-bar-four-vertical 1.2s 0.4s forwards;
}

/* Bar Graph Vertical Animations */
@-webkit-keyframes show-bar-one-vertical {
  0% {
    height: 0;
  }
  100% {
    height: 40%;
  }
}

@-webkit-keyframes show-bar-two-vertical {
  0% {
    height: 0;
  }
  100% {
    height: 55%;
  }
}

@-webkit-keyframes show-bar-three-vertical {
  0% {
    height: 0;
  }
  100% {
    height: 68%;
  }
}

@-webkit-keyframes show-bar-four-vertical {
  0% {
    height: 0;
  }
  100% {
    height: 82%;
  }
}

@-webkit-keyframes fade-in-text {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

</style>

@endsection

</body>
</html>
