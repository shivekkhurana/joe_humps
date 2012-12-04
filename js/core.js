$(function(){
	
	//set cookie for js enablement
	if (!(cookie.get('_jok_')))
		cookie.set('_jok_','****');
		
	//@route /signup
	$('form#signup').submit(function(){
		//$('input[type="submit"]').fadeOut(0);
		$('div.notify').slideUp('fast');
		$('img#signup-processing').fadeIn(0);
		var url      = $(this).attr('action');
		var email    = $('input#email').val();
		var password = $('input#password').val();
		var repass  = $('input#re-password').val();
		if (password == repass)
		{
			$.post(url,{'email': email, 'password': password}, function(backpass){
				//$('input[type="submit"]').fadeIn('fast');
				if (backpass == "ok")
					window.location.href = '/sites';
				else
				{
					$('img#signup-processing').fadeOut(0);
					$('div.notify').text(backpass).slideDown('fast');
				}
			});
		}
		else
		{
			//$('input[type="submit"]').fadeIn('fast');
			$('img#signup-processing').fadeOut(0);
			$('div.notify').text('passwords don\'t match.').slideDown('fast');
		}
		return false;
	});
	
	//@route /signin
	$('form#signin').submit(function(){
		$('div.notify').slideUp('fast');
		$('img#signup-processing').fadeIn(0);
		var url      = $(this).attr('action');
		var email    = $('input#email').val();
		var password = $('input#password').val();
		$.post(url,{'email': email, 'password': password}, function(backpass){
				$('img#signup-processing').fadeOut(0);
				if (backpass == "ok")
					window.location.href = '/sites';
					else
					$('div.notify').text(backpass).slideDown('fast');
		});
		return false;
	});
		
	//@route /sites
	
	$('a.add-a-site-link').facebox();			

	$('a#add-a-site-link').click(function(){
		$(this).fadeOut(200);
		$('#add-a-site').delay(250).slideDown('fast');
		return false;
	});
		
	$('a#close').click(function(){
		$('#add-a-site').slideUp(200);
		$('a#add-a-site-link').delay(250).fadeIn('fast');
		return false;
	});
	
			
	$('#add-a-site form').submit(function(){
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
				window.location.href = '/sites';
			}
			else
				$('#notify-add-a-site').text(backpass).slideDown('fast');
		});
		return false;
	});
	
	// @route account
	$('#first').submit(function(){
		$('#first .notify').slideUp('fast')
		$('#first img#signup-processing').fadeIn(0);
		var url = $(this).attr('action');
		var realName = $('input#realName').val();
		var email = $('input#email').val();
		$.post(url, {'realName':realName, 'email': email}, function(backpass){
			$('#first img#signup-processing').fadeOut(0);
			if (backpass == "ok")
			{	
					backpass = "account credentials updated.";
					$('.notify').css('color','#467');
			}
			$('#first .notify').text(backpass).slideDown('fast');
		});
		return false;
	});
			
	$('#second').submit(function(){
		$('#second .notify').slideUp('fast')
		$('#second img#signup-processing').fadeIn(0);
		var url = $(this).attr('action');
		var currPass = $('input#currPass').val();
		var password = $('input#password').val();
		$.post(url, {'currPass':currPass, 'password': password}, function(backpass){
			$('#second img#signup-processing').fadeOut(0);
			if (backpass == "ok")
			{	
				backpass = "password updated.";
				$('.notify').css('color','#467');
			}
			$('#second .notify').text(backpass).slideDown('fast');
		});
		return false;
	});
	
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
