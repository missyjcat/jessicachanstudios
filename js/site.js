jQuery(document).ready(function($) {
    
    // Go home when Jessicachanstudios in top left corner is clicked
    $('nav h1').click(function() {
       window.location = 'http://jessicachanstudios.com/'; 
    });    
	
    // Animate prev/next buttons in portfolio posts
    $('#prev').mouseover(function() {
       $('#prev').animate({
        width: '65px'
       }, 100, function() {
        //animation complete
       });
    });
    
    $('#prev').mouseout(function() {
       $('#prev').animate({
        width: '50px'    
       }, 100, function() {
        //animation complete
       });
    });
    
    $('#next').mouseover(function() {
       $(this).animate({
        width: '65px'
       }, 100, function() {
        //animation complete
       });
    });
    
    $('#next').mouseout(function() {
       $(this).animate({
        width: '50px'    
       }, 100, function() {
        //animation complete
       });
    });
    
    // Hide the Category Menu and Archives Menu on Blog Pages
    $('#category-menu').hide();
    $('#archives-menu').hide();
    
    // When user clicks on Category or Archives Menu on blog pages the menus slide down.
    $('#cats-archives .categories').click(function () {
        $('#category-menu').slideToggle('fast');
    });
    
    $('#cats-archives .archives').click(function () {
        $('#archives-menu').slideToggle('fast');
    });

	// Replace the contents of the Search, Tweet, and Contact menu items with images
	 $('#menu-item-1195').html('<a href="http://www.linkedin.com/in/jessicawchan" title="LinkedIn" target="_blank"><img src="http://www.jessicachanstudios.com/wp-content/themes/jcstudios_custom2/images/linkedin_white.png" /></a>');
	$('#menu-item-1193').html('<a href="http://www.twitter.com/missyjcat" title="Tweet" target="_blank"><img src="http://www.jessicachanstudios.com/wp-content/themes/jcstudios_custom2/images/tweet_white.png" /></a>');
	$('#menu-item-1194').html('<a href="mailto:jessicachanstudios@gmail.com" title="Contact Me"><img src="http://www.jessicachanstudios.com/wp-content/themes/jcstudios_custom2/images/bell_white.png" /></a>');

});

