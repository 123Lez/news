//user searching for an article or story

function article_search()
{
	var user_input = document.getElementById('search-text').value;
	$.ajax({
			type:'GET',
			url:'fetchArticle',
			data:{'search_input':user_input},
			beforeSend:function()
			{
				// setInterval(function(){
				// 	document.getElementById('app-loader').style.display = 'inline-block';
				// 	document.getElementById('app-container').style.display = 'none';
				// 												},300);
				document.getElementById('app-loader').style.display = 'inline-block';
				$('#app-loader').css('visibility','visible');
				$('#app-container').css('visibility','hidden');
				
			},
			success:function(data)
			{
				// alert(data);
				$('#app-loader').css('visibility','hidden');
				$('#app-container').css('visibility','visible');
				var message = "";
				document.getElementById('app-loader').style.display = 'none';
				document.getElementById('app-container').style.display = 'block';
				// document.getElementById('app-container').innerHTML = data;
				if(data.length === 0)
				{
					message +=  "<div class=\"p-2 bd-highlight holder\">"+
								"No data found"+
								"</div>"+
								"</div>";
					document.getElementById('app-container').innerHTML = message;
				}
				data.forEach(function(article_data)
				{
					message +=  "<div class=\"p-2 bd-highlight holder\">"+
								"<div class=\"card img-container\" id=\"img-holder\">"+
						    	"<div class=\"article-hover\">"+
								"<a href=\"articleview/"+article_data['id']+"\">"+
								"<img src=\""+article_data['top_image']+"\">"+
								"<span class=\"article-title\">"+article_data['title']+"</span>"+
								"</a>"+
								"</div>"+
								"</div>"+
								"</div>";
							   
					document.getElementById('app-container').innerHTML = message;		    
				});
			},
			error:function()
			{
				var message =  "<div class=\"p-2 bd-highlight holder\">"+
							   "<div class=\"card img-container\" id=\"img-holder\">"+
							   "No data found"+
							   "</div>"+
							   "</div>";
				document.getElementById('app-container').innerHTML = message;
					
			}
			
	});
}