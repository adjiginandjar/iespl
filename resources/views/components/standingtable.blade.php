<table class="points_table table-responsive">
  <thead>
    <tr>
      <th class="col-1">Rank</th>
      <th class="col">Team</th>
      <th class="col-1 d-none d-sm-block">PLAY</th>
      <th class="col-1">WIN</th>
      <th class="col-1">DRAW</th>
                <th class="col-1">LOSE</th>
                <th class="col-1">Pts</th>
    </tr>
  </thead>

  <tbody class="points_table_scrollbar">
           @foreach (isset($game->leagues)?$game->leagues->first()->getStanding($game->nick):[] as $team)
                <tr class="{{ $loop->index%2 == 0 ? 'odd' : 'even'}}">
                    <td class="col-1">{{ $team['info']['pos'][0] }}<small>{{ $team['info']['pos'][1] }}</small></td>
                    <td class="col"> <img class=""  src="{{ $team['team']['image']  }}"><a href="{{ $team['team']['link'] }}" class="link_white" data-track="ga" track-cat="{{ $game->nick?'League_'. $game->nick .'_Page':'Home_page' }}" track-action="Standing_Section" track-label="team_{{ $team['team']['nick'] }}">{{ $team['team']['nick'] }}</a></td>
                    <td class="col-1 d-none d-sm-block">{{ $team['info']['play'] }}</td>
                    <td class="col-1">{{ $team['info']['win'] }}</td>
                    <td class="col-1">{{ $team['info']['draw'] }}</td>
                    <td class="col-1">{{ $team['info']['lose'] }}</td>
                    <td class="col-1">{{ $team['info']['point'] }}p</td>
                </tr>
            @endforeach
  </tbody>
</table>
