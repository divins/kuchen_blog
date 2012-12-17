/***************************************************
	      SOCIALIZE ICON IMAGE HOVER
***************************************************/
$(function() {
$('.social-bookmarks img').animate({ opacity: 0.5}, 0) ;
$('.social-bookmarks img').each(function() {
$(this).hover(
function() {
$(this).stop().animate({ opacity: 1.0 }, 200);
},
function() {
$(this).stop().animate({ opacity: 0.5 }, 200);
})
});
});