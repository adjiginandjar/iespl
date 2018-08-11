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
            @foreach ($teams as $team)
            {% if (loop.index%2) == 0 %}
            <tr class="{{ $loop->index%2 == 0 ? even : odd}}">
                <td class="col-1">{{ team['info']['pos'][0] }}<small>{{ team['info']['pos'][1] }}</small></td>
                <td class="col"> <img class=""  src="{{ $team.image  }}"><a href="{{ $team.url }}" class="link_white" data-track="ga" track-cat="{{ active_game_nick?'League_'~ active_game_nick ~'_Page':'Home_page' }}" track-action="Standing_Section" track-label="team_{{ $team.nick }}">{{ $team.nick }}</a></td>
                <td class="col-1 d-none d-sm-block">{{ team['info']['play'] }}</td>
                <td class="col-1">{{ $team.win }}</td>
                <td class="col-1">{{ $team.draw }}</td>
                <td class="col-1">{{ $team.lose }}</td>
                <td class="col-1">{{ $team.point }}p</td>
            </tr>
            @endforeach
  </tbody>
</table>
