<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="    https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
       
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        #myTable_info,
        .paginate_button,
        .dataTables_length {
            visibility: hidden;
        }
    </style>

    <title>TIMES OF INDIA Document</title>
</head>

<body>
    <div>
        <!-- Header for the table of TOI -->
        <div class="header">
            <h1 style='text-align:center; line-height: 180%;'>THE TIMES OF INDIA</h1>
            <span style='margin-left:94%'>lang:<a href=""> {{$channelInfo['language']}}</span></a>
            <h1>{{$channelInfo['title']}}</h1>
            <br>
        </div>
        <h3>{{$channelInfo['description']}}</h3><br>
        <p>For updates on the latest News <a href="{{$channelInfo['link']}}">Visit</a> our Offical page.</p>
    </div>
    <!-- Foreach loop to display json data in table format -->
    <!-- Foreach loop to display json data in table format -->
    <table border='2' id="myTable" class="display">
        <thead style="background:grey">
            <tr>
                <th>Articals</th>
                <th>Links</th>
                <th>Last Added Articals</th>
                <th>Publised By</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>
                    {{$item['title']}}
                </td>
                <td>
                    <a href="{{$item['link']}}">Link to Article</a>
                </td>
                <td>
                    {{$item['pubDate']}}
                </td>
                <td>
                    @if(isset($item['dc:creator']['#text']))
                    {{ $item['dc:creator']['#text'] }}
                    @else
                    N/A
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $data->links('pagination::bootstrap-5')}}
    </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>