<script type="text/javascript">
    // FAtch Sub Category =============================
   function FatchSubCategory(){
      //debugger
      var cate = $( "#categorySelect" ).val();
        $.ajax({
            url : "<?php echo base_url(); ?>Post/fatch_sub_category_with_ajax/"+cate,
            type: "POST",
            //data: {UId : UId},
            dataType: "JSON",
            success: function(data)
            {
                $('#subCategory>option').remove();
                $('#subCategory').html('<option value="">Select a sub-category</option>');
                $.each(data, function (i, data) {
                    $('#subCategory').append($('<option>', { 
                        value: data.sub_id,
                        text : data.sub_category_name 
                    }));
                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal({
                  text: "Something went wrong!",
                  icon: "error",
                  buttons: false,
                  timer: 1300,
                });                
            }
        });
    }




    // FAtch City =============================
   function FatchCity(){
      //debugger
      var country = $( "#countrySelect" ).val();
        $.ajax({
            url : "<?php echo base_url(); ?>Post/fatch_city_with_ajax/"+country,
            type: "POST",
            //data: {UId : UId},
            dataType: "JSON",
            success: function(data)
            {
                $('#citySelect>option').remove();
                $('#citySelect').html('<option value="">Select a city</option>');
                $.each(data, function (i, data) {
                    $('#citySelect').append($('<option>', { 
                        value: data.cty_id,
                        text : data.city_name 
                    }));
                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal({
                  text: "Something went wrong!",
                  icon: "error",
                  buttons: false,
                  timer: 1300,
                });                
            }
        });
    }






    // Fatch Zone =============================
   function FatchZone(){
      //debugger
      var city = $( "#citySelect" ).val();
        $.ajax({
            url : "<?php echo base_url(); ?>Post/fatch_zone_with_ajax/"+city,
            type: "POST",
            //data: {UId : UId},
            dataType: "JSON",
            success: function(data)
            {
                $('#zoneSelect>option').remove();
                $('#zoneSelect').html('<option value="">Select a zone</option>');
                $.each(data, function (i, data) {
                    $('#zoneSelect').append($('<option>', { 
                        value: data.ar_id,
                        text : data.area_name 
                    }));
                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal({
                  text: "Something went wrong!",
                  icon: "error",
                  buttons: false,
                  timer: 1300,
                });                
            }
        });
    }
</script>