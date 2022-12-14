<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 PDF File Download using JQuery Ajax Request Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    @include('pdf.pdf')
    <div class="text-center pdf-btn">
        <button type="button" class="btn btn-info download-pdf">Download Pdf</button>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(".download-pdf").click(function() {
        $.ajax({
                        url: "generate",
                        type: "GET",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        data: { ids: 1 },
                        xhrFields: {
                            responseType: 'blob'
                        },
                        success: function(response ,s, xhr){
                            console.log(response);
                                 var blob = new Blob([response], {
                                    type: 'application/pdf'
                                })
                                var url = URL.createObjectURL(blob);
                                location.assign(url);
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = 'test.pdf';
                            link.click();
                        },
                        error: function(data) {
                            console.log('something wrong');
                        },
                    });
    });
</script>

</html>
