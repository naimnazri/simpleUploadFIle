<?php

include('db.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        a.btn.btn-primary.open-AddBookDialog {color: white }
    </style>
    <title>Form Upload and View Image</title>
  </head>
  <body>
    <div class="container">
        <br>
        <h1 class="text-center ">Form Upload and View Image</h1>
        <br>
        <div class="card m-auto" style="width: 40%;">
            <div class="card-header text-center">Form Field</div>
            <div class="card-body">
                <form action="process.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Nama">Nama: </label>
                        <input class="form-control" type="text" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="File">File</label>
                        <input class="form-control-file" type="file" name="namaFile" id="fileToUpload">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="Submit" name="submit">
                    </div>
                </form>
            </div>
        </div>

        <br>
        <hr>
        <br>

        <div class="card m-auto" style="width: 60%;">
            <div class="card-header text-center">List of Users</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $show = "SELECT * FROM users";
                        $i = 1;
                        $query =  mysqli_query($conn,$show);
                        while($row = mysqli_fetch_array($query)){
                            $nama = $row['nama'];
                            $email = $row['email'];
                            $fileName = $row['namaFile'];
                        ?>
                        <tr>
                        <td><?= $i; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $email; ?></td>
                        <td><img src="images/<?= $fileName; ?>" alt="" width="100px;"></td>
                        </tr>
                        <?php
                        } $i++;
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    
        <br>
        <hr>
        <br>

        <div class="card m-auto" style="width: 60%;">
            <div class="card-header text-center">List of Users With Modal</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $show = "SELECT * FROM users";
                        $i = 1;
                        $query =  mysqli_query($conn,$show);
                        while($row = mysqli_fetch_array($query)){
                            $nama = $row['nama'];
                            $email = $row['email'];
                            $fileName = $row['namaFile'];
                        ?>
                        <tr>
                        <td><?= $i; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $email; ?></td>
                        <td><img src="images/<?= $fileName; ?>" alt="" width="100px;"></td>
                        <td></td>
                        </tr>
                        <?php
                        } $i++;
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <a 
        class="btn btn-primary open-AddBookDialog" 
        data-toggle="modal" 
        data-target="#exampleModal" 
        data-bookid="@book.Id" 
        title="Add this item"
        >Open</a>


        <!-- MODAL -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            
            <div class="modal-body">
                <input type="text" name="bookId" id="bookId" value=""/>
                <input type="text" class="form-control" id="recipient-name">    
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
        </div>
        

        <script type="text/javascript">
            $('#exampleModal').on('show.bs.modal', function (event) {
                let bookId = $(event.relatedTarget).data('bookid') 
                $(this).find('.modal-body input').val(bookId)
            })
        </script>


        <br>
        <hr>
    
    </div>
    

    <!-- Optional JavaScript -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>





    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
 
 
 </body>
</html>