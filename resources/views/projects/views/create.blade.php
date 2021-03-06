
    

    <div id='result-message'></div>
     
    <div class="input-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class' => 'form-control']) !!}
    </div>
    <div class="clearfix">&nbsp;</div>

    <div class="input-group">
        {!! Form::label('description','Description:') !!}
        {!! Form::textarea('description',null,['class' => 'form-control']) !!}
    </div>
    
    <div class="clearfix">&nbsp;</div>
    {!! Form::button('Create', array('class' => 'btn btn-primary','id' => 'create-btn')) !!}
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>




<script>
        $("#create-btn").click(function(){
 
            var url =  "{{ route('projectsstore') }}",
                data = {},
                title = $("#title"),
                description = $("#description"),
                message = "";

                data['title'] = title.val();
                data['description'] = description.val();

                $.post(url, data, function(result){
                    
                        message += "<div class='alert alert-success'>"+result+"</div>";
                         $("#result-message").html(message);
                         $.each( data, function( key, value ) {
                            $("#"+key).val("");
                        });
                        
                        result_projects();
                        
                }).error(function(result){
                     result = JSON.parse(result.responseText);
                     message += "<div class='alert alert-danger'>";
                      $.each( result, function( key, value ) {
                          message += value+"</br>";
                      });
                      message += "</div>";
                       $("#result-message").html(message);
                      
                });
                
                
        });
</script> 