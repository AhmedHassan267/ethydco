@extends('layouts.admin')


@section('title')
    {{ $user->name }} {{"'s"}} Radar Chart for {{ $role_specific->name }}
@endsection



@section('content')
    <div style="width: 500px;height:500px;background: rgb(181, 216, 202)">
        <canvas id="myChart" height="100px" width="100px"></canvas>
    </div>
@endsection

@push('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">

    const data = {
        labels: [
          'level 1',
          'level 2',
          'level 3',
          'level 4'
        ],
        datasets: [{
          label: 'User Marks',
          data: [{{ App\Models\UserTest::where('user_id',Auth::user()->id)->where('level','1')->where('role_specific_id',$role_specific->id)->pluck('mark')->toArray()[0] ?? 0}},
          {{ App\Models\UserTest::where('user_id',Auth::user()->id)->where('level','2')->where('role_specific_id',$role_specific->id)->pluck('mark')->toArray()[0] ?? 0}},
          {{ App\Models\UserTest::where('user_id',Auth::user()->id)->where('level','3')->where('role_specific_id',$role_specific->id)->pluck('mark')->toArray()[0] ?? 0}},
          {{ App\Models\UserTest::where('user_id',Auth::user()->id)->where('level','4')->where('role_specific_id',$role_specific->id)->pluck('mark')->toArray()[0] ?? 0}}],
          fill: true,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgb(255, 99, 132)',
          pointBackgroundColor: 'rgb(255, 99, 132)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgb(255, 99, 132)'
        }, {
          label: 'Full Marks',
          data: [
            {{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','1')->count()}}
          ,
          {{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','2')->count()}}
          ,
          {{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','3')->count()}}
          ,
          {{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','4')->count()}}
          ],
          fill: true,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgb(54, 162, 235)',
          pointBackgroundColor: 'rgb(54, 162, 235)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgb(54, 162, 235)'
        }]
      };

      const config = {
        type: 'radar',
        data: data,
        options: {}
      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

</script>
@endpush




