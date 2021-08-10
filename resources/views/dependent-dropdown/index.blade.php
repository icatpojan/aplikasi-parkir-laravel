<!DOCTYPE html>
<html>

<head>
    <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <form>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Province</label>
            <div class="col-md-6">
                <select name="province" id="province" class="form-control">
                    <option value="">== Select Province ==</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">City</label>
            <div class="col-md-6">
                <select name="city" id="city" class="form-control">
                    <option value="">== Select City ==</option>
                </select>
            </div>
        </div>
    </form>
</body>

</html>

<script src="{{ asset('js/app.js') }}" defer></script>
<script>
    $(function() {
        $('#province').on('change', function() {
            axios.post('{{ route('dependent-dropdown.store') }}', {
                    id: $(this).val()
                })
                .then(function(response) {
                    $('#city').empty();

                    $.each(response.data, function(id, name) {
                        $('#city').append(new Option(name, id))
                    })
                });
        });
    });
</script>
