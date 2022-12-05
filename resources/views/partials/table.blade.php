<div class="card">
    <div class="card-header">
        <h5 class="card-title">Basic</h5>
    </div>
    <div class="card-body">
        <table id="datatable1" class="display" style="width: 100%">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        @foreach ($row as $cell)
                            <td>{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    @foreach ($columns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    </div>
</div>
