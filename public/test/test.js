 $.ajax({
   url: '../api/user/info',
   dataType: 'json',
   headers: {
	          'Accept':'application/json',
              'Authorization':'Bearer '+$.cookie('token')
          },
   method: 'GET',
   success: function(res){
	   console.log(res);

   }
});