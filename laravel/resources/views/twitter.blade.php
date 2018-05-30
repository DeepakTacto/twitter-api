<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - Twitter API</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
    <h4>Post Tweet</h4>


    <form method="POST" action="{{ route('post.tweet') }}" enctype="multipart/form-data">


        {{ csrf_field() }}


        @if(count($errors))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <br/>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="form-group">
            <label>Add Tweet Text:</label>
            <textarea class="form-control" name="tweet"></textarea>
        </div>
        <div class="form-group">
            <label>Add Multiple Images:</label>
            <input type="file" name="images[]" multiple class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Add New Tweet</button>
        </div>
    </form>

	<h4>Trending 50 tweets with hashtag</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Name</th>
                <th>Promoted Content</th>
                <th>Url</th>
                <th>Query</th>
                <th>Tweet Volume</th>
            </tr>
        </thead>
        <tbody><?php //echo "<pre>"; print_r((array)$data[0]->trends);die;?>
            @if(!empty($data))
                @foreach($data[0]->trends as $key => $value)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->promoted_content }}</td>
                        <td>
                            @if(!empty($value->url))
                                    <a href="{{ $value->url }}" style="width:100px;">Click Here</a>
                            @endif
                        </td>
                        <td>{{ $value->query }}</td>
                        <td>{{ $value->tweet_volume }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>


</body>
</html>
