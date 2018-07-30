//Base URL
//var baseUrl = window.location.origin;
var baseUrl = window.location.origin;

//Tender Status Change
$(document).on('click','.TenderStatus',function (event) {
    event.preventDefault();
    var button = $(this);
    var id = $(this).attr('data-id');
    var value = $(this).attr('data-value');
    console.log(value);
    var url = baseUrl+"/back/StatusUpdateById";
    $.ajax({
        url: url,
        type: 'POST',
        data: {id:id, value:value},
        success: function(data){
            if(data=='yes'){
                console.log('Status updated Successfully');
                if (button.text() == 'Published'){
                    button.text('Unpublished');
                    button.attr('data-value','A');
                    button.addClass('btn-danger');
                    button.removeClass('btn-success');
                }else{
                    button.text('Published');
                    button.attr('data-value','B');
                    button.addClass('btn-success');
                    button.removeClass('btn-danger');
                }
            }
        },
        error:function () {
            console.log('Error: Status not updated');
        }
    });
});

//Tender Update with Image
    //Tender Update Modal
    $(document).on('click','.tenderUpdate',function (event) {
        event.preventDefault();
        var button = $(this);
        var id = $(this).attr('data-id');
        var url = baseUrl+"/back/TenderUpdateForm";

        console.log(url);
        $.ajax({
            type:'post',
            url:url,
            data:{id:id},
            success:function(data){
                $('.TenderUpdatedForm').html(data);
                //$('#tenderUpdateDialog').trigger('click');
            },
            error:function(){
                //alert('Error updating');
            }
        });
    });
    //End Tender Update Modal

    //Tender Updated Form Data
    $(document).on('submit', '#TenderUpdateForm', function(event){
        event.preventDefault();
        event.stopPropagation();
        var TenderUpdateFormData = new FormData(this);
        //var TenderUpdateFormData = $('#publicityUpdateForm').serialize();
        var url =  baseUrl+"/back/TenderUpdate";
        var date = $("#tender_date").val();
        console.log(date);
        $.ajax({
            type:'POST',
            url: url,
            data: TenderUpdateFormData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                //$("#publicityUpdateForm")[0].reset();
                console.log(data);
                alert("Success! Updated successfully");
                $('.modal').modal('hide');
                window.location = baseUrl+"/back/TenderList#TenderListView";
                window.location.reload(true);
            },

            error: function(data){
                console.log("Error: "+data);
                alert("Failure! Not Updated successfully");
                $('.modal').modal('hide');
                window.location = baseUrl+"/back/TenderList#TenderListView";
            }
        });

    });
    //End Tender Updated Form Data
//End Tender Update with Image

//Photo Category update
//Update Modal
$(document).on('click','.pGalleryUpdateBtn',function (event) {
    event.preventDefault();

    var id = $(this).attr('data-id');
    var url = baseUrl+"/back/galleryCategoryUpdateAjaxForm";

    $.ajax({
        type:'post',
        url:url,
        data:{id:id},
        success:function(data){
            $('.galleryCatUpdateForm').html(data);
        },
        error:function(){
            alert('Try again');
        }
    });
});
//End Update Modal

//Tender Updated Form Data
$(document).on('submit', '#galleryCategoryUpdateForm', function(event){
    event.preventDefault();
    event.stopPropagation();
    var galleryUpdateFormData = new FormData(this);
    //var TenderUpdateFormData = $('#publicityUpdateForm').serialize();
    var url =  baseUrl+"/back/galleryCategoryUpdate";
    $.ajax({
        type:'POST',
        url: url,
        data: galleryUpdateFormData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
            //$("#publicityUpdateForm")[0].reset();
            console.log(data);
            alert("Success! Updated successfully");
            $('.modal').modal('hide');
            window.location = baseUrl+"/back/galleryCategoryCreate";
            window.location.reload(true);
        },

        error: function(data){
            console.log("Error: "+data);
            alert("Failure! Not Updated successfully");
            $('.modal').modal('hide');
            window.location = baseUrl+"/back/galleryCategoryCreate";
        }
    });

});

//End Photo Category update

//News & Events update
//Update Modal
$(document).on('click','.tbl_newsandeventsUpdateBtn',function (event) {
    event.preventDefault();

    var id = $(this).attr('data-id');
    var url = baseUrl+"/back/newsAndEventsUpdateAjaxForm";

    $.ajax({
        type:'post',
        url:url,
        data:{id:id},
        success:function(data){
            $('.newsAndEventsUpdateForm').html(data);
        },
        error:function(){
            alert('Try again');
        }
    });
});
//End Modal

//Form Data
$(document).on('submit', '#newsAndEventsUpdateForm', function(event){
    event.preventDefault();
    event.stopPropagation();
    var newsAndEventsUpdateFormData = new FormData(this);
    //var TenderUpdateFormData = $('#publicityUpdateForm').serialize();
    var url =  baseUrl+"/back/newsAndEventsUpdate";
    $.ajax({
        type:'POST',
        url: url,
        data: newsAndEventsUpdateFormData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
            //$("#publicityUpdateForm")[0].reset();
            console.log(data);
            alert("Success! Updated successfully");
            $('.modal').modal('hide');
            window.location = baseUrl+"/back/newsAndEventsCreate";
            window.location.reload(true);
        },

        error: function(data){
            console.log("Error: "+data);
            alert("Failure! Not Updated successfully");
            $('.modal').modal('hide');
            window.location = baseUrl+"/back/newsAndEventsCreate";
        }
    });

});

//Delete
$(document).on('click','.tbl_newsandeventsDeleteBtn',function (event) {
    event.preventDefault();

    var id = $(this).attr('data-id');
    var url = baseUrl+"/back/newsAndEventsDelete";
    if(confirm("Want to delete?")){
        $.ajax({
            type:'post',
            url:url,
            data:{id:id},
            success:function(data){
                alert("Deleted Successfully");
                window.location = baseUrl+"/back/newsAndEventsCreate";
            },
            error:function(){
                alert('Try again');
                window.location = baseUrl+"/back/newsAndEventsCreate";
            }
        });
    }
});
//End News & Events update

