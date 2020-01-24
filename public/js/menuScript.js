function fetchSourceArticle(param)
{

	$.ajax({
		type:'GET',
		url:'fetchchoosenSourceArticles',
		data:{'source':param},
		headers: { '_token' : $("input[name='_token']").val() },
        dataType: "json",
        beforeSend:function()
        {
            $('#app-container').css('visibility','hidden');
            document.getElementById('app-loader').style.display = 'inline-block';
            $('#app-loader').css('visibility','visible');
        },
        success:function(data)
        {
            $('#app-loader').css('visibility','hidden');
            $('#app-container').css('visibility','visible');
        	console.log(data.data);
        	var article_data = '';
        	document.getElementById('app-container').innerHTML = '';

        	// article_data+='<div class="img-container">';
        	// for(var key of data['data'])
        	// {
         //        article_data += '<div class=\"p-2 bd-highlight holder\">'+
         //                        '<div class=\"card img-container\" id=\"img-holder\">'+
         //                        '<div class=\"article-hover\">'+
         //                        '<a href=\"'+key.article_url+'\" target=\"_blank\">'+
         //                        '<img src=\"'+key.top_image+'\">';
         //                        if(key.title.length >= 45)
         //                        {
         //                            var article_title = key.title.substr(0,45)+ ' ...';
         //                        }
         //                        else
         //                        {
         //                            var article_title = key.title;
         //                        }
         //        article_data += '<span class=\"article-title\">'+article_title+'</span>'+
         //                        '</a>'+ 
         //                        '</div>'+
         //                        '</div>'+
         //                        '</div>';
        	// }
        	// article_data+='<div class="pagination-tab">\'{{$data->links()}}\'</div>';
            // document.getElementById('app-container').innerHTML = article_data;
            $('#app-container').html(data);

        }
	});

}