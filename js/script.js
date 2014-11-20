
$(function(){

 		$("#display").load("getPosts.php", 
			 			{'page':1}, 
			 			function() {
			 						$("#1-page").addClass('active');
									setPagination();
			 					}
			 			);  //initial page number to load

    //$(".paginate_click").on( "click",function (e) {
   
   


    	$(".admin").click(function(event){
    									event.preventDefault();
							    		$(".container").load("login.php", {}, function(){} );   	
    								 }
    				);




});


function setPagination() {

   	  $("a").on("click", function (e) {
       
       // $("#display").prepend('<div class="loading-indication"><img src="images/ajax-loader.gif" /> Loading...</div>');
        var linkClicked = $(this).attr("id");
        var clicked_id = $(this).attr("id").split("-"); //ID of clicked element, split() to get page number.
        var page_num = parseInt(clicked_id[0]); //clicked_id[0] holds the page number we need 
        
        $('.paginate_click').removeClass('active'); //remove any active class
        
        

        $("#display").load("getPosts.php", {'page': (page_num-1)}, function(){
        	setPagination();
        	$("#"+linkClicked).addClass('active'); //add active class to currently clicked element
        });

        
        
        return false; //prevent going to herf link
    	}); 

   }




/*
	var bouton = $("#ajout");
    bouton.click(function(event){
						    	event.preventDefault();
						    	addTown();    	
    							});

   $("#showAdd").click(function(event){

    	  $(".addForm").css("visibility", "visible");
    	  $(".addForm").fadeIn( "slow","");
    	  $(".addForm").css("height", "50px");
    	  $(".searchForm").css("height", "0px");
    	  $(".searchForm").css("visibility", "hidden");
    	
    });
});

	function getPosts(event)
    {
      var th = "<thead>	<tr class='info' id='trHead'><th>Nom ville</th><th>Population</th><th>surface</th></tr></thead>";
      var text = $("#nom");	    	

	    $.ajax({
	          
	          url      : "JSONgetPosts.php",
	          // Passage des données au fichier externe 
	          data     : {pattern: text.val()},
	          cache    : false,
	          dataType : "json",
	          type: "GET",
	          error    : function(request, error) { // Info Debuggage si erreur         
	                       alert("Erreur : responseText: "+request.responseText);
	                     },
	          success  : function(data) {  
	          			   var sectionDisplay= $("#display");   
	                          // console.log(data)  ;                 
	                       for (var key in data){
   									sectionDisplay.append("<article><h4 class='title'>"+data[key].title+
   										"</h2><p class='content'>"+data[key].content+"</p><p class='created'>"+data[key].created+"</p></article>");
									
							}

	                     }       
	     });     

    	
    }

    


    function addTown()
    {
         
      var nom = $("#nomAdd");	
      var population = $("#population");
      var surface = $("#surface");	    	

	    $.ajax({
	          
	          url      : "add.php",
	          // Passage des données au fichier externe 
	          data     : {nom: nom.val(),population:population.val(),surface:surface.val()},
	          cache    : false,
	          dataType : "json",
	          type: "GET"
	     });     

    	$(".addForm").css("visibility", "hidden");
    	$(".addForm").css("height", "0px");
    	$(".searchForm").css("height", "50px");
    	$(".searchForm").css("visibility", "visible");

    	$("#nom").val(nom.val());
    	searchTown();

    	$("#nomAdd").val('');	
        $("#population").val('');
        $("#surface").val('');	    	

    	//alert("la ville "+ nom.val()+" a été ajoutée à la base")
    }
*/