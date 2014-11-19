
$(function(){

	var text = $("#nom");	
	searchTown();
	// text.keyup(function()
	// 	{
			
	// 		mytimeout = setTimeout( "", 1000);
	// 		searchTown();
 //            clearTimeout(mytimeout);

	// 	});

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

	function searchTown(event)
    {
      var th = "<thead>	<tr class='info' id='trHead'><th>Nom ville</th><th>Population</th><th>surface</th></tr></thead>";
      var text = $("#nom");	    	

	    $.ajax({
	          
	          url      : "search.php",
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
	                                              
	                       for (var key in data){
   									sectionDisplay.append("<article><h4 class='title'>"+data[key].title+
   										"</h2><p class='content'>"+data[key].content+"</p><p class='created'>"+data[key].created+"</p></article>");
									
							}

	                     }       
	     });     

    	
    }

    function searchSimple()
    {
      var text = $("#name");	    	

	    $.ajax({ url      : "search.php?pattern="+text.val()}).done(function(data){

	    					var sectionDisplay= $("#display");                                         
	                        var article = $("#trHead");
	                       
	                       for (var key in data){
   									tabDisplay.append("<tr><td>"+data[key].name+"</td><td>"+data[key].population+"</td><td>"+data[key].surface+"</td></tr>");
									
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
