//image
  function imageView(input){
    // console.log(input.files[0].name);
    if(input.files && input.files[0]){
        let reader = new FileReader();

        reader.onload = function (event){
            $('.image-view').attr('src', event.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }




$(document).ready(function (){
    $("#datatables").DataTable();

    const site_url = "http://localhost/ssit5-project/";


$("#create-form").on('submit', function (event){
event.preventDefault();
$(".loader").show();

console.log('test');
let formData = new FormData(this);
 formData.append('action', $(this).data('url'))

 console.log("ajax r age");
$.ajax( {

    method: 'POST',
    url: site_url + "admin/inc/action.php",
    processData: false,
    contentType: false,
    dataType:'json',
    data: formData,

   
  //  success: function(result){
  
  //       $(".loader").hide();
  //       // console.log("inside success");
    
       
  //   }
   
}).done(function(response){
  console.log('msg', response)

  var res =  JSON.parse(response);
  if(res.status){
    $(".loader").hide();
    console.log('ok')
  }
}).fail(function(error){
  console.error(error);
  console.log(error);
})
  console.log('end');
} );


$(".datepicker").datepicker({
    format : 'yyy-mm-dd',
    todayHighlight: true,
    autoclose: true,
});

});