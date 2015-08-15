var tmp;

jQuery(document).ready(function()
{
	quickAds_Scroll(quickAds_frameL, 'left');
	quickAds_Scroll(quickAds_frameR, 'right');
	quickAds_Scroll(quickAds_frameT, 'top');
	quickAds_Scroll(quickAds_frameB, 'bottom');
	quickAds_SetPos();
	quickAds_Scroll_Marquee(quickAds_frameTS + ' > div > table');
	quickAds_Scroll_Marquee(quickAds_frameBS + ' > div > table');
});

function quickAds_Scroll_Marquee(el)
{
	if (jQuery(el).length > 0)
	{
		tmp = jQuery(el).width() - jQuery(el).parent().width();
		if (tmp > 0)
		{
				jQuery(el).animate({left:-tmp+10+'px'}, tmp*25, function(){
							jQuery(el).animate({left:'0px'}, tmp*25, quickAds_Scroll_Marquee(el));
				});
			
		}
	}
}

function quickAds_SetPos()
{
	var marginT = 0, marginB = 0;
	tmp = jQuery(window).width();
	
	if (jQuery(quickAds_frameL).length > 0)
	{
		tmp = tmp - jQuery(quickAds_frameL).width();
	}
	if (jQuery(quickAds_frameR).length > 0)
	{
		tmp = tmp - jQuery(quickAds_frameR).width();
	}
	
	tmp = tmp - 20;
	
	if (jQuery(quickAds_frameT).length > 0)
	{
		jQuery(quickAds_frameT).css({'max-width':tmp + 'px'});
		marginT = Math.round((tmp - jQuery(quickAds_frameT).width()) / 2);
	}
	if (jQuery(quickAds_frameB).length > 0)
	{
		jQuery(quickAds_frameB).css({'max-width':tmp + 'px'});
		marginB = Math.round((tmp - jQuery(quickAds_frameB).width()) / 2);
	}
	
	if (jQuery(quickAds_frameL).length > 0)
	{
		tmp = jQuery(quickAds_frameL).width() + jQuery(window).scrollLeft() + 10;
	}
	else
	{
		tmp = jQuery(window).scrollLeft() + 10;
	}
	
	if (jQuery(quickAds_frameT).length > 0)
	{
		jQuery(quickAds_frameT).css({'left':tmp + marginT + 'px'});
	}
	if (jQuery(quickAds_frameB).length > 0)
	{
		jQuery(quickAds_frameB).css({'left':tmp + marginB + 'px'});
	}
}

function quickAds_Scroll(el, pos)
{
	if (jQuery(el).length > 0)
	{
		var selfHeight, windowHeight, scrollTop, scrollLeft;
		
		jQuery(el).css({'display':'block'});
		
		jQuery(window).scroll(function()
		{
			if (jQuery(el).width() != 0)
			{
				selfHeight = jQuery(el).height();
				windowHeight = jQuery(window).height();
				scrollTop = jQuery(window).scrollTop();
				scrollLeft = jQuery(window).scrollLeft();
				if (pos == 'left' || pos == 'right')
				{
					if (selfHeight <= windowHeight)
					{
						jQuery(el).animate({top:scrollTop+5}, {duration:800,queue:false});
					}
					else
					{
						if (selfHeight <= windowHeight + scrollTop)
						{
							tmp = windowHeight - selfHeight + scrollTop;
							jQuery(el).animate({top:tmp}, {duration:800,queue:false});
						}
						else
						{
							jQuery(el).animate({top:5}, {duration:800,queue:false});
						}
					}
					if (pos == 'left')
					{
						jQuery(el).css({'left':5+scrollLeft});
					}
					else
					{
						jQuery(el).css({'right':5-scrollLeft});
					}
				}
				else if (pos == 'top' || pos == 'bottom')
				{
					quickAds_SetPos();
					
					if (pos == 'top')
					{
						jQuery(el).animate({top:scrollTop+5}, {duration:800,queue:false});
					}
					else
					{
						jQuery(el).animate({bottom:5-scrollTop}, {duration:800,queue:false});
					}
				}
			}
		});
	
		jQuery(window).resize(function()
		{
			scrollLeft = jQuery(window).scrollLeft();
			
			if (pos == 'left' || pos == 'right')
			{
				if (pos == 'left')
				{
					jQuery(el).css({'left':5+scrollLeft});
				}
				else
				{
					jQuery(el).css({'right':5-scrollLeft});
				}
			}
			else if (pos == 'top' || pos == 'bottom')
			{
				quickAds_SetPos();
			}
		});
	}
	else
	{
		jQuery(el).css({'display':'none'});
	}
}
		
function quickAds_Close(id, el, time)
{
	if (jQuery(el).length > 0)
	{
		if (time > 0)
		{
			var exdate = new Date();
			exdate.setMinutes(exdate.getMinutes() + time);
			var c_value = escape(id) + ((time == null) ? "" : "; expires=" + exdate.toUTCString());
			document.cookie = id + "=" + c_value;
		}
		jQuery(el).remove();
		quickAds_SetPos();
	}
	else
	{
		// alert("Error!");
	}
}

function quickAds_CheckDimension(el, wmin, hmin)
{
	if (jQuery(el).length > 0)
	{
		if (jQuery(window).width() < wmin || jQuery(window).height() < hmin)
		{
			jQuery(el).css({'display':'none'});
		}
		else
		{
			jQuery(el).css({'display':'block'});
		}
	
		jQuery(window).resize(function()
		{
			if (jQuery(window).width() < wmin || jQuery(window).height() < hmin)
			{
				jQuery(el).css({'display':'none'});
			}
			else
			{
				jQuery(el).css({'display':'block'});
			}
		});
	}
	else
	{
		jQuery(el).css({'display':'none'});
	}
}

function quickAds_CheckCookie(id, el)
{
	var i, x, y, ARRcookies = document.cookie.split(";");
	for (i=0; i<ARRcookies.length; i++)
	{
		x = ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y = ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		x = x.replace(/^\s+|\s+$/g,"");
		
		if (x == id && jQuery(el).length > 0)
		{
			jQuery(el).remove();
		}
	}
}