

    
    <h3>{{{ $user['first_name'] }}}, Here is Your Weekly Summary</h3>

    <div class="row">
        <div class="col s12 center-align">
            <p class="flow-text"><a href="{{{'ProjectsController@showOverdue'}}}">Projects Overdue: {{{$overdueProjects}}}</a></p>
        </div>
    </div>
    <div>
        <h4>Your Upcoming Project Due Dates</h4>
        <table class="striped centered responsive-table">
            <thead>
                <tr>
                    <th data-field="project">Project</th>
                    <th data-field="dueDates">Project Due Date</th>
                    <th data-field="description" class="truncate">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td><a href="{{{action('ProjectsController@show', $project['id'])}}}">{{{$project['name']}}}</a></td>
                        <td>{{{ $project['due_date']}}}</td>
                        <td>{{{$project['description']}}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
