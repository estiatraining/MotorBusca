jQuery.easing['BounceEaseOut'] = function(p, t, b, c, d)
{
	if ((t/=d) < (1/2.75))
    {
		return c*(7.5625*t*t) + b;
	}
    else if (t < (2/2.75))
    {
		return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
	}
    else if (t < (2.5/2.75))
    {
		return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
	}
    else
    {
		return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
	}
};
jQuery(document).ready(function()
{
    jQuery('#mycarousel').jcarousel(
    {
        easing: 'BounceEaseOut',
        animation: 1000
    });
});
// Set thickbox loading image
tb_pathToImage = "framework/images/loading-thickbox.gif";
function mycarousel_itemLoadCallback(carousel, state)
{
    for (var i = carousel.first; i <= carousel.last; i++)
    {
        if (carousel.has(i))
        {
            continue;
        }
        if (i > mycarousel_itemList.length)
        {
            break;
        }
        // Create an object from HTML
        var item = jQuery(mycarousel_getItemHTML(mycarousel_itemList[i-1])).get(0);
        // Apply thickbox
        tb_init(item);
        carousel.add(i, item);
    }
};
/**
* Item html creation helper.
*/
function mycarousel_getItemHTML(item)
{
    var url_m = item.url.replace(/_s.jpg/g, '_m.jpg');
    return '<a href="' + url_m + '" title="' + item.title + '"><img src="' + item.url + '" width="75" height="75" border="0" alt="' + item.title + '" /></a>';
};
jQuery(document).ready(function()
{
    jQuery('#mycarousel').jcarousel(
    {
        visible: 5
    });
    jQuery('#mycarousel').jcarousel(
    {
        size: mycarousel_itemList.length,
        itemLoadCallback: {onBeforeAnimation: mycarousel_itemLoadCallback}
    });
});