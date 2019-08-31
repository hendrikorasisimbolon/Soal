<!DOCTYPE html>
<html>

    <style>
    td{
        text-align: center;   
    }
    </style>
    <head>
        <title>ARKADEMY BOOTCAMP</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
        <script src="js/ajax.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <img src='https://www.arkademy.com/img/logo%20arkademy-01.9c1222ba.png' class="col-sm-2" style="margin-right: 40px;"/>
                <h1 class="font-weight-bold">ARKADEMY BOOTCAMP</h1>
            </div>
            <hr class="style1">

            <div class="panel" style="margin-top: 100px;">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#create-user" style="float: right; margin-bottom:20px; margin-right:15px;">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ADD
                </button>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Work</th>
                                <th style="text-align: center;">Salary</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <ul id="pagination" class="pagination-sm"></ul>
                </div>
            </div>

            <!-- Modal untuk tambah user -->
            <div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Data</h4>
                        </div>

                        <div class="modal-body">
                            <form data-toggle="validator" action="api/create.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name..." required />
                                </div>
                                <div class="form-group">
                                    <select name="work" class="form-control" required>
                                        <option value="" disabled selected>Work ...</option>
                                        <option value="1"> Frontend Dev </option>
                                        <option value="2"> Backend Dev </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="salary" class="form-control" required>
                                        <option value="" disabled selected>Salary ...</option>
                                        <option value="1"> Rp. 10.000.000 ,- </option>
                                        <option value="2"> Rp. 12.000.000 ,- </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn crud-submit btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal untuk edit user -->
            <div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                        </div>
                        <div class="modal-body">
                            <form data-toggle="validator" action="api/update.php" method="put">
                                <input type="hidden" name="id" class="id">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name..." required />
                                </div>
                                <div class="form-group">
                                    <select name="work" class="form-control" required>
                                        <option value="" disabled selected>Work ...</option>
                                        <option value="1"> Frontend Dev </option>
                                        <option value="2"> Backend Dev </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="salary" class="form-control" required>
                                        <option value="" disabled selected>Salary ...</option>
                                        <option value="1"> Rp. 10.000.000 ,- </option>
                                        <option value="2"> Rp. 12.000.000 ,- </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success crud-edit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>