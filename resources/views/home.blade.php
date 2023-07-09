<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kangaroo Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body>
  
  <!-- Modal -->
  <div class="modal fade ajaxModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="ajax-modal">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-title"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" id="name" class="form-control inputForm">
                <small class="spanMsg text-danger" id="nameMsg"></small>
            </div>

            <div class="form-group mb-2">
                <label for="">Nickname</label>
                <input type="text" id="nickname" class="form-control inputForm">
                <small class="spanMsg text-danger" id="nicknameMsg"></small>
            </div>

            <div class="form-group mb-2">
                <label for="">Weight</label>
                <input type="text" id="weight" class="form-control inputForm">
                <small class="spanMsg text-danger" id="weightMsg"></small>
            </div>

            <div class="form-group mb-2">
                <label for="">Height</label>
                <input type="text" id="height" class="form-control inputForm">
                <small class="spanMsg text-danger" id="heightMsg"></small>
            </div>

            <div class="form-group mb-2">
                <label for="">Gender</label>
                <select id="gender" class="form-control inputForm">
                    <option disabled selected value=""> Choose Gender </option>
                    <option value="male"> Male </option>
                    <option value="female"> Female </option>
                </select>
                <small class="spanMsg text-danger" id="genderMsg"></small>
            </div>
            
            <div class="form-group mb-2">
                <label for="">Color</label>
                <input type="text" id="color" class="form-control inputForm">
                <small class="spanMsg text-danger" id="colorMsg"></small>
            </div>

            <div class="form-group mb-2">
                <label for="">Friendliness</label>
                <select id="friendliness" class="form-control inputForm">
                    <option disabled selected value=""> Choose Friendliness </option>
                    <option value="friendly"> Friendly </option>
                    <option value="not friendly"> Not Friendly </option>
                </select>
                <small class="spanMsg text-danger" id="friendlinessMsg"></small>
            </div>

            <div class="form-group required mb-2">
                <label for="bday">Birthday</label>
                <input id="birthday" class="form-control inputForm" type="date" />
                <small class="spanMsg text-danger" id="birthdayMsg"></small>
            </div>
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveBtn">save</button>
        </div>
    </div>
    </div>

  </div>


    <div class="row">
        <div class="col-md-6 offset-3" style="margin-top: 100px">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add kangaroo</a>
            <a class="btn btn-info" href="/data-grid">View DataGrid</a>
        </div>
        <div class="col-md-6 offset-3" style="margin-top: 20px">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Height</th>
                        <th scope="col">Friendliness</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="kangarooTable">
                    
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            

            function buildTable() {
                $.ajax({
                    url: '/api/kangaroo-info',
                    method: 'GET',
                    success: function(res){
                        let table = $('#kangarooTable');
                        let data = res.data;

                        for (let i = 0; i < data.length; i++) {
                            let row = `<tr id=${data[i].id}>
                                            <td>${data[i].id}</td>
                                            <td>${data[i].name}</td>
                                            <td>${data[i].birthday}</td>
                                            <td>${data[i].weight}</td>
                                            <td>${data[i].height}</td>
                                            <td>${data[i].friendliness ?? ""}</td>
                                            <td>
                                                <a href="#" class="btn btn-success editKangaroo" data-id=${data[i].id}>edit</a>
                                                <a href="#" class="btn btn-danger deleteKangaroo" data-id=${data[i].id}>delete</a>
                                            </td>
                                        </tr>`;

                            table.append(row);
                        }
                    },
                    error: function(res){
                        alert('something went wrong');
                        console.log(res.responseJSON);
                    }
                });
            }
            buildTable();

            $('body').on('click', '.deleteKangaroo', function(e) {
                e.preventDefault();
                let btn = $(this);
                let id = btn.data('id');
                
                $.ajax({
                    url: '/api/kangaroo-info/' + id,
                    method: 'DELETE',
                    
                    success: function(res){
                        if (res) {
                            alert(res.message);
                            btn.closest("tr").remove();
                        }
                    },
                    error: function(res){
                        alert('something went wrong');
                        console.log(res.responseJSON);
                    }
                });
            })

            function deleteKangaroo(data) {
                console.log(data.attr('data-id'));
            }

            $('#modal-title').text('Create Kangaroo');
            $('#saveBtn').text('Save Kangaroo');
            $('#saveBtn').click(function() {
                $('.spanMsg').text('');

                let data = {
                    name : $('#name').val(),
                    nickname : $('#nickname').val(),
                    weight : $('#weight').val(),
                    height : $('#height').val(),
                    gender : $('#gender').val(),
                    color : $('#color').val(),
                    friendliness : $('#friendliness').val(),
                    birthday : $('#birthday').val()
                };

                $.ajax({
                    url: '/api/kangaroo-info',
                    method: 'POST',
                    data: data,
                    success: function(res){
                        alert(res.message);
                        let table = $('#kangarooTable');
                        let row = `<tr id=${res.id}>
                                        <td>${res.id}</td>
                                        <td>${data.name}</td>
                                        <td>${data.birthday}</td>
                                        <td>${data.weight}</td>
                                        <td>${data.height}</td>
                                        <td>${data.friendliness ?? ""}</td>
                                        <td>
                                            <a href="#" class="btn btn-success editKangaroo" data-id=${res.id}>edit</a>
                                            <a href="#" class="btn btn-danger deleteKangaroo" data-id=${res.id}>delete</a>
                                        </td>
                                    </tr>`;

                        table.append(row);
                        $('.inputForm').val('');
                        $('.ajaxModal').modal('toggle');
                    },
                    error: function(res){
                        if (res.status === 422) {
                            Object.keys(res.responseJSON.errors).forEach(function(key) {
                                $('#' + key + 'Msg').text(res.responseJSON.errors[key]);
                            });
                        }
                        alert('something went wrong');
                        console.log(res.responseJSON);
                    }
                });
            });
       
        });
    </script>
</body>
</html>