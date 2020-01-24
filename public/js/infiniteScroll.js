
$('ul.pagination').hide();
$(function(){
	$('.infinite-scroll').jscroll({
		autoTrigger: true,
		padding: 0,
		loadingHtml: '<div class="infinity-scroll-loading"><div></div><div></div><div></div><div></div></div>',
		nextSelector: '.pagination li.active + li a',
		contentSelector: 'div.infinite-scroll',
		callback: function(){
			$('ul.pagination').remove();
		}
	});
});
