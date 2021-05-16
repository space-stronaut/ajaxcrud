<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>PHP AJAX</title>
  </head>
  <body>
    <div class="container">

        <div class="card p-4">
            <form action="simpan.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <input type="text" name="jurusan" id="jurusan" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="text" name="nis" id="nis" class="form-control">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                </div>
            </form>
        </div>


        <table class="table mt-5" border="2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <script>

    $(document).ready(function() {
        ajax_load();
    
        $('form').submit(function (e) { 
            e.preventDefault();

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function () {
                    ajax_load();

                    $('#nama').val('')
                    $('#nis').val('')
                    $('#jurusan').val('')         
                }
            });
            
        });
    
    })

        function ajax_load() {
            $.get("config.php",
            function (data) {
                $('tbody').html(data)      
                $('.update').click(function (e) { 
                    e.preventDefault();
                    $('[name=nama]').val($(this).attr('nama'));
                    $('[name=jurusan]').val($(this).attr('jurusan'));
                    $('[name=nis]').val($(this).attr('nis'));

                    $('form').attr('action',$(this).attr('href'));
                });
                $('.delete').click(function (e) { 
                    e.preventDefault();
                    $.ajax({
                        type: 'get',
                        url: $(this).attr('href'),
                        success: function () {
                            ajax_load();
                        }
                    });
                });
            },
            ); 
        }

    </script>
  </body>
</html>