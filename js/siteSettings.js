$(function(){
	//@route /site/settings
	$('#opt').submit(function(){
		$('#notify-add-a-site').slideUp('fast')
		$('img#signup-processing').fadeIn(0);
		var url = $(this).attr('action');
		var snm = $('input#siteName').val();
		var srl = $('input#siteUrl').val();
		$.post(url, {'siteName': snm, 'siteUrl': srl}, function(backpass){
			$('img#signup-processing').fadeOut(0);
			if (backpass == "ok")
			{
				$('#notify-add-a-site').toggleClass('notify').text('success, redirecting..').slideDown('fast');
					window.location.href = "/sites/settings/"+sid;
				}
				else
				{
					$('#notify-add-a-site').text(backpass).slideDown('fast');
				}
		});
		return false;
	});
	
	$('a.deleteSitePrompt').click(function(){
		var url = $(this).attr('href');
		var c   = confirm("Are you sure you want to delete this site ?");
		if (c == true)
		{
			$.post(url, {}, function(){window.location.href="/sites";});	
		}
		return false;
	});
	
	
	//tabby
	var tabContainers = $('div.tabs > div.tab');
	tabContainers.hide().filter(':first').show();                      
	$('#tab-nav a').click(function () {
		tabContainers.hide();
		tabContainers.filter(this.hash).show();
		return false;
	}).filter(':first').click();
});
