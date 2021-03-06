<!DOCTYPE html>
<html>
<head>
        <title>Laravel Vue JS Item CRUD</title>
        <meta id="token" name="token" value="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css')}}" type="text/css">
</head>

    <body>

    <nav class="navbar navbar-default navbar-fixed-top">
       <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Thavoo</a>
    </div>
    
    
        <div class="container" id="manage-vue">
        
            <div class="row">
                <div class="col-lg-12 margin-tb">
                   
                    <div class="pull-left">
                        <h2>Laravel Vue JS Item CRUD by Thavoo</h2>

                    </div>
                   
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                            Create Item
                        </button>
                    </div>

                </div>
            </div>
<table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th width="200px">Action</th>
        </tr>

        <tr v-for="item in items">
            <td>@{{ item.title }}</td>
            <td>@{{ item.description }}</td>
            <td>
                <button class="btn btn-primary" @click.prevent="editItem(item)">Edit</button>
                <button class="btn btn-danger" @click.prevent="deleteItem(item)">Delete</button>
            </td>
        
        </tr>

</table>

<!-- Pagination -->
<nav>
    <ul class="pagination">
        <li v-if="pagination.current_page > 1">
            <a href="#" aria-label="Previous"
                @click.prevent="changePage(pagination.current_page -1)">
                <span aria-hidden="true">«</span>
            </a>
        </li>
        <li v-for="page in pagesNumber"
            v-bind:class="[ page == isActived ? 'active' : '']">
            <a href="#" 
            @click.prevent="changePage(page)">@{{ page }}</a>
        
        </li>

        <li v-if="pagination.current_page < pagination.last_page">
            <a href="#" aria-label="Next"
            @click.prevent="changePage(pagination.current_page + 1)">
            <span aria-hidden="true">»</span>
            </a>
        </li>


    </ul>
</nav>

<!--Create item modal -->

<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                
            </div>

            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" v-model="newItem.title" />
                        <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['title'] }}</span>
                    </div>

                    <div class="form-group">
                        <label for="title">Description:</label>
                        <textarea name="description" class="form-control" v-model="newItem.description"></textarea>
                        <span v-if="formErrors['description']" class="error text-danger">@{{ formErrors['description'] }}</span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit item modal -->
<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="myModaLabel">Edit Item</h4>
            </div>

            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control" v-model="fillItem.title" />
                    <span v-if="formErrorUpdate['title']" class="error text-danger">@{{ formErrorUpdate['title'] }}</span>
                </div>

                <div class="form-group">
                    <label for="title">Description:</label>
                    <textarea name="description" class="form-control" v-model="fillItem.description"></textarea>
                    <span v-if="formErrorsUpdate['description']" class="error text-danger">@{{ formErrorUpdate['description'] }}</span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>


        </div>
        </nav>


<script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>

<link href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css')}}" rel="stylesheet">


<script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js') }}"></script>


<script type="text/javascript" src="{{ asset('/js/item.js') }}"></script>
    </body>

    </html>