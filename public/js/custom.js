$(document).ready(function() {
});

$elementList = ['input','select','textarea'];
$errorMessage = [];


/**
 * @description
 * @param Id parent element
 * @return array of object of filters
 */
var FilterData = function($parentElement){
    var filterData = {};
    for(var i in $elementList){
        $($parentElement).find($elementList[i]).each(function(){
            filterData[$(this).attr('name')] = $(this).val();
        })
    }
    return filterData;
};


function addNewUser($parentDiv){

    var requestData = {};
    var filterData = FilterData($parentDiv);

    requestData = {
        'requestFor' : 'add-new-user',
        'filter-data' : filterData
    };


    $.post('request', requestData, function(result){
        if(result == 'Email ID already exist.'){
            swal(
                'Oops...',
                result,
                'error'
            )
        }else{
            $('#myModal').modal('hide');
            swal(
                'congratulations!',
                'You have successfully added new user',
                'success'
            )
        }

    });

}
function uploadImage(e,$id){
    e.preventDefault();
    var requestData = {};
    var filterData = FilterData($id);
    // $("#message").empty();
    // $('#loading').show();

    requestData = {
        'requestFor' : 'upload-image',
        'data' : filterData
    };


    $.post('request', requestData, function(result){
        alert('ytgvb');

    });

}