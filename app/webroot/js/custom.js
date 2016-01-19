//####################################################
// jQuery Handle
//####################################################
(function($)
{
	$(document).ready(function()
	{
		// Uniform
		//$('.uniform').find('select, input:checkbox, input:radio, input:file').uniform();
				
		// Tips
		//$('.tipN').tipsy({gravity:'n', fade:false, html:true});
		//$('.tipS').tipsy({gravity:'s', fade:false, html:true});
		//$('.tipW').tipsy({gravity:'w', fade:false, html:true});
		//$('.tipE').tipsy({gravity:'e', fade:false, html:true});
		
		// Hide it
		$(".hideit").click(function()
		{
			$(this).fadeOut();
		});
                
                // Ckeditor
		$('.editor').each(function()
		{
			var id = $(this).attr('id');
			
			var config = $(this).attr('_config');
			config = (config) ? JSON.parse(config) : {};
			
			CKEDITOR.replace(id, config).on("change", function()
			{
				CKEDITOR.instances[id].updateElement();
			});
		});
		// Lightbox
		$('.lightbox').nstUI({
			method:	'lightbox'
		});
		
		// Form handle
		$('.form_action').each(function()
		{
			$(this).nstUI({
				method:	'formAction',
				formAction:	{
					field_load: $(this).attr('_field_load')
				}
			});
		});
		
		// Verify action
		$('.verify_action').nstUI({
			method:	'verifyAction'
		});
		
		// Tooltip
		$('[_tooltip]').nstUI({
			method:	'tooltip'
		});
		
		// Drop Down
		$('[_dropdown]').nstUI({
			method:	'dropdown'
		});
		
		// Placeholder
		$('input.placeholder').nstUI({
			method:	'placeholder'
		});
		
		// Accordion
		$('.accordion').each(function()
		{
			var _t = $(this);
			_t.nstUI({
				method:	'accordion',
				accordion: {type: _t.attr('_accordion_type')}
			});
		});
		
		// Auto check pages
		$('.auto_check_pages').each(function()
		{
			auto_check_pages($(this));
		});
		
		// Date picker
		$('.datepicker').each(function()
		{
			var config_default = { 
					defaultDate: +7,
					autoSize: true,
					dateFormat: 'dd-mm-yy',
					changeMonth: true,
					changeYear: true,
					yearRange: "1975"
			};
			
			var config_cur = $(this).attr('_config');
			config_cur = (config_cur) ? JSON.parse(config_cur) : {};
			
			var config = $.extend({}, config_default, config_cur);
			$(this).datepicker(config);
		});
                
                // Sort col table
		$('table td.sortCol').each(function()
		{
			var _t = $(this);
			var html = '<div>'+_t.html()+'<span></span></div>';
			_t.html(html);
		});
                
                
		// Number format
		//$('.format_number').number(true);
                
		/* Currency format
		$('.format_currency').formatCurrency({
			roundToDecimalPlace: 0,
			symbol: ''
		});
		$('.format_currency').blur(function()
		{
			$(this).formatCurrency({
				roundToDecimalPlace: 0,
				symbol: ''
			});
		});
		*/
		// Autocomplete
		var cache = {}, lastXhr;
		$('.autocomplete').each(function()
		{
			var url_search = $(this).attr('_url');
			
			$(this).autocomplete(
			{
				minLength: 2,
				source: function(request, response)
				{
					var term = request.term;
					
					if (term in cache)
					{
						response(cache[term]);
						return;
					}
		
					lastXhr = $.getJSON(url_search, request, function(data, status, xhr)
					{
						cache[term] = data;
						if (xhr === lastXhr)
						{
							response(data);
						}
					});
				}
			});
		});
		
		// Change lang currency
		$('.change_lang, .change_currency, .change_agent').click(function()
		{
			$(this).nstUI({
				method:	"loadAjax",
				loadAjax: {
					url: $(this).attr('_url'),
					field: {load:'', show:''},
					event_complete: function()
					{
						window.location.reload();
					}
				}
			});
			
			return false;
		});
                
                //===== Tabs =====//
                $.fn.contentTabs = function(){ 
                $(this).find(".tab_content").hide(); //Hide all content
		$(this).find("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(this).find(".tab_content:first").show(); //Show first tab content
                $("ul.tabs li").click(function() {
			$(this).parent().parent().find("ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(this).parent().parent().find(".tab_content").hide(); //Hide all tab content
			var activeTab = $(this).find("a").attr("_href"); //Find the rel attribute value to identify the active tab + content
			$(activeTab).show(); //Fade in the active content
			return false;
		});
                };
                //$("div[class^='widget']").contentTabs(); //Run function on any div with class name of "Content Tabs"
		
	});
})(jQuery);


//####################################################
// Main function
//####################################################
/**
 * Load ajax
 */
function load_ajax(_t)
{
	var field = jQuery(_t).attr('_field');
	var url = jQuery(_t).attr('_url');
	
	jQuery(_t).nstUI(
	{
		method:	"loadAjax",
		loadAjax:{
			url: url,
			field: {load: field+'_load', show: field+'_show'}
		}
	});
	
	return false;
}

/**
 * Gan gia tri cua cac bien vao html
 */
function temp_set_value(html, params)
{
	jQuery.each(params, function(param, value)
	{
		var regex = new RegExp('{'+param+'}', "igm");
		html = html.replace(regex, value);
	});

	return html;
}

/**
 * Copy gia tri giua 2 field
 */
function copy_value(from, to)
{
	jQuery(this).nstUI({
		method:	'copyValue',
		copyValue: {
			from: from,
			to: to
		}
	});
}

/**
 * Hien thi lightbox
 */
function lightbox(t)
{
	jQuery(t).nstUI({
		method:	'lightbox'
	});
}

/**
 * An pages khi ko co chia trang
 */
function auto_check_pages(t)
{
	if (t.find('a')[0] == undefined)
	{
		t.remove();
	}
}


/**
 * Hien thi panel cua account
 */
function load_account_panel()
{
	jQuery(this).nstUI(
	{
		method:	"loadAjax",
		loadAjax:{
			url: site_url+'user/account_panel',
			field: {load: '_', show: 'account_panel'}
		}
	});
}

/**
 * Thay doi captcha
 */
function change_captcha(field)
{
	var t = jQuery('#'+field);
	var url = t.attr('_captcha')+'?id='+Math.random();
	t.attr('src', url);
	
	return false;
}


//####################################################
// Custom function
//####################################################
/**
 * Call widget
 */
function widget_call(widget, scroll)
{
	scroll = (scroll == undefined) ? true : scroll;
	
	jQuery('#widget_'+widget+' .widget_load a').click(function()
	{
		var url = jQuery(this).attr('href');
		widget_load(widget, url, scroll);
		
		return false;
	});
}

/**
 * Load widget
 */
function widget_load(widget, url, scroll)
{
	jQuery(this).nstUI({
		method:	"loadAjax",
		loadAjax:{
			url: url,
			field: {load: '', show: 'widget_'+widget},
			event_complete: function(data, setting)
			{
				if (scroll)
				{
					jQuery.scrollTo('#'+setting.field.show, 800);
				}
			}
		}
	});
}