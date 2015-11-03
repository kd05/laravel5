@extends('layout.master')

@section('content')

  <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Student</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                             <input type="hidden" name='_token' value="<?= csrf_token();?>" >
                                            <label for="exampleInputEmail1">Student Name</label>
                                            <input type="email" class="form-control" id="studentname" name="studentname" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">-Select Gender-</option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="email" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="button" class="btn btn-primary saverecord">Save Record</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                            
                            
                            
                            <!--Display Data-->
                            
                            <div class="box">
                                
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Student Name</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="show-data">
                                           
                                           
                                            
                                        </tbody>
                                     
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                            
                            <!--Display Data end-->
                            
                            
                            
                <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
                <script type="text/javascript">
                    $(function() {
                        
//                        Edit Record
                        $( "body" ).delegate( ".edit", "click", function() {
                          var id = $(this).data("id");
                          
                                $.ajax({
                                url: "<?= URL::to('editrow'); ?>",
                                type:"post",
                                async: false,
                                data:
                                {
                                    id:id
                                },
                                success: function(data)
                                {
                                    alert(data);
                                }                              
                            });
                          
                        });
                        


                        
//                        Add record
                        $('.saverecord').click(function(){
                            var studentname = $('#studentname').val();
                            var gender      = $('#gender').val();
                            var phone       = $('#phone').val();
                            
                            $.ajax({
                                url: "<?= URL::to('save'); ?>",
                                type:"post",
                                async: false,
                                data:
                                {
                                    studentname:studentname,
                                    gender: gender , 
                                    phone: phone,
                                },
                                success: function(data)
                                {
                                    alert(data);
                                    displaydata();
                                }
                                
                                
                            });
                        });
                        
                        displaydata();
                        
                        function displaydata()
                        {
                             $.ajax({
                                url: "<?= URL::to('displaydata'); ?>",
                                type:"post",
                                async: false,
                                
                                success: function(data)
                                {
                                    
                                    //alert(data);
                                    $('.show-data').html(data);
                                }
                                
                                
                            });
                        }
                        
                    });
                    
                </script>
                            
                            
@stop()